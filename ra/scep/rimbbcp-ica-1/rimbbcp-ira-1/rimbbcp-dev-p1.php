<?php
header('Content-Type: application/x-pki-message');

try {
    $certData = file_get_contents('php://input');

    if (!$certData) {
        throw new Exception("No certificate data received.");
    }

    // save to a temporary file for processing
    $tmpFile = tempnam(sys_get_temp_dir(), 'p7b');
    file_put_contents($tmpFile, $certData);

    $output = [];
    $returnVar = 0;

    // convert PKCS#7 to X.509 format for easier processing
    exec("openssl pkcs7 -print_certs -inform DER -in $tmpFile", $output, $returnVar);

    if ($returnVar !== 0 || empty($output)) {
        throw new Exception("Failed to parse PKCS#7 file. Ensure OpenSSL is installed and in your path.");
    }

    // extract and parse the X.509 certificate
    $certDataString = implode("\n", $output);
    preg_match('/-----BEGIN CERTIFICATE-----(.*)-----END CERTIFICATE-----/s', $certDataString, $matches);

    if (empty($matches[1])) {
        throw new Exception("No valid certificate found in the PKCS#7 file.");
    }

    $parsedCert = openssl_x509_parse($matches[0]);

    if (!$parsedCert || !isset($parsedCert['subject']['CN'])) {
        throw new Exception("Failed to extract subject CN for the device PIN.");
    }

    // bb pin (from the certificate's subject CN field, why is it like this? i dont have a fucking clue)
    $BBDevicePIN = $parsedCert['subject']['CN'];

    // bullshit random cert request id and shoot me
    $randomCertRequestID = mt_rand(1000000000, 9999999999);
    $finalResponse = base64_encode(file_get_contents('certificate.pem'));

    $response = <<<XML
<SCEPResponse>
  <Status>Success</Status>
  <PKIStatus>0</PKIStatus>
  <Message>Request successful</Message>
  <CertData>
        {$finalResponse}
  </CertData>
  <CertRequestID>{$randomCertRequestID}</CertRequestID>
  <IssuerName>CN={$BBDevicePIN}, OU=BlackBerry O=Research In Motion Limited, C=CA</IssuerName>
</SCEPResponse>
XML;

    header('Content-Length: ' . strlen($response));
    unlink($tmpFile); // kill
    die($response);

} catch (Exception $e) {
    // Handle errors gracefully
    $errorResponse = <<<XML
<SCEPResponse>
  <Status>Failure</Status>
  <Message>{$e->getMessage()}</Message>
</SCEPResponse>
XML;
    header('Content-Length: ' . strlen($errorResponse));
    die($errorResponse);
}
?>
