<?php

error_reporting(E_ERROR | E_PARSE | E_WARNING);

// whoever made that playbook update server, i fucking love you this would have been painful to figure out without it

function createXMLResponse($rootElement, $attributes = [], $children = [])
{
    $xml = new SimpleXMLElement("<?xml version=\"1.0\" encoding=\"utf-8\"?><$rootElement></$rootElement>");
    foreach ($attributes as $key => $value) {
        $xml->addAttribute($key, $value);
    }
    appendChildren($xml, $children);
    return $xml->asXML();
}

function appendChildren(&$xml, $children)
{
    foreach ($children as $key => $value) {
        if (is_array($value)) {
            if (isset($value["@attributes"])) {
                $child = $xml->addChild($key);
                foreach ($value["@attributes"] as $attrKey => $attrValue) {
                    $child->addAttribute($attrKey, $attrValue);
                }
                if (!empty($value)) {
                    appendChildren($child, array_filter($value, fn($k) => $k !== "@attributes", ARRAY_FILTER_USE_KEY));
                }
            } elseif (isset($value[0])) {
                foreach ($value as $subValue) {
                    appendChildren($xml->addChild($key), $subValue);
                }
            } else {
                $child = $xml->addChild($key);
                appendChildren($child, $value);
            }
        } else {
            $xml->addChild($key, htmlspecialchars((string)$value));
        }
    }
}

$postdata = file_get_contents("php://input");

// parse xml
libxml_use_internal_errors(true);
$requestXML = simplexml_load_string($postdata);

if (!$requestXML) {
    http_response_code(400);
    echo "Invalid XML request";
    exit;
}

$version = "5.0.0.1168";
$versionplatform = "5.2.0.67";

$requestType = $requestXML->getName();
switch ($requestType) {
    case "bundleVersionRequest":

        $iscurrent = (string) $requestXML["platform-ver"] == $version ? "true" : "false";

        echo createXMLResponse(
            "bundleVersionResponse",
            ["version" => "3.1", "hwid" => "0x8c000f03", "vendorid" => "301", "supportedDevice" => "true"],
            [
                "bundle" => [
                    "@attributes" => [
                        "platform-ver" => $versionplatform,
                        "apps-ver" => $version,
                        "current" => $iscurrent,
                        "preferred" => "true",
                        "id" => $version,
                        "bundleType" => "PRODUCTION"
                    ],
                    "name" => "BlackBerry OS " . $version,
                    "description" => "This is the last release for this BlackBerry device."
                ]
            ]
        );

        break;

    case "notificationCheckRequest":
        echo createXMLResponse(
            "notificationCheckResponse",
            ["version" => $version, "supportedDevice" => "true"],
            ["status" => "no"]
        );
        break;

    case "apploaderCheckRequest":
        echo createXMLResponse(
            "apploaderCheckResponse",
            ["version" => $version],
            ["apploader" => ["status" => "current"]]
        );
        break;

    case "bundleUpgradeRequest":
        // wip
        echo createXMLResponse(
            "packagedb",
            [
                "hwid" => "0x8c000f03",
                "vendorid" => "0x12d",
                "bundleid" => "2ae57108-4895-4e0b-b225-65c555b0263e",
                "bundle-ver" => $version,
                "platform-ver" => $versionplatform,
                "apps-ver" => $version,
                "installer" => "English",
                "url" => "http://cdn.fs.sl.blackberry.com/fs/qnx/production/bbos/5.0.0.1168/8520/",
            ],
            [
                "package" => [
                    [
                        "@attributes" => [
                            "id" => "ABgIZqzH82EmqghgYp0iCQBABCK",
                            "system" => "1",
                            "self-upgrade" => "0",
                        ],
                        "aliases" => null,
                        "verbiage" => [
                            "langid" => "en",
                            "name" => "com.qnx.coreos.qcfm.os.factory",
                            "version" => $version,
                            "vendor" => "Research In Motion Limited",
                            "copyright" => "Copyright 1998-2010 Research In Motion"
                        ],
                        "modules" => [
                            "module" => [
                                "@attributes" => [
                                    "name" => "qcfm.os.factory.89493.460849.4985.80544.bwrap.signed",
                                    "version" => $version,
                                    "size" => "268706036",
                                    "system" => "0",
                                    "hwid" => "0x8c000f03",
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        );
        break;

    default:
        // fallback
        http_response_code(400);
        echo "Unrecognized request type";
        break;
}
