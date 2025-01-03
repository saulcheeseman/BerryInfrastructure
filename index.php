<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>BerryInfrastructure</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #121212;
            margin: 0;
            padding: 0;
            text-align: center;
            color: #e0e0e0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #1e1e1e;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            border-radius: 10px;
        }
        .header {
            background: url('/bbid/img/images/banner.jpg') no-repeat center center;
            background-size: cover;
            color: #fff;
            padding: 40px 0;
            border-radius: 10px 10px 0 0;
        }
        .header h1 {
            margin: 0;
            font-size: 2.5em;
        }
        .header img {
            width: 150px;
            height: auto;
            display: block;
            margin: 0 auto 10px;
        }
        .content {
            margin: 20px 0;
        }
        .content p {
            font-size: 1.2em;
            line-height: 1.6;
        }
        .button {
            display: inline-block;
            padding: 15px 30px;
            margin: 10px;
            background-color: #333;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #555;
        }

        .container, .header, .button {
            border-radius: 0;
        }
        .button {
            padding: 10px 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="/bbid/img/images/blackberryLogo.png" alt="BlackBerry Logo">
            <h1>BerryInfrastructure</h1>
        </div>
        <div class="content">
            <p>Welcome to BerryInfrastructure, a recreation of the BlackBerry Infrastructure.</p>
            <!--
            <a href="/webstore/AppWorld45.jad" class="button">App World for BBOS 4.5</a>
            <a href="/webstore/AppWorld46.jad" class="button">App World for BBOS 4.6</a>
            <a href="/webstore/AppWorld47.jad" class="button">App World for BBOS 4.7</a>
            -->
            <a href="/webstore/AppWorld5/AppWorld.jad" class="button">App World for BBOS 5.0</a>
        </div>
    </div>
</body>
</html>
