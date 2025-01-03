<?php
header("X-Powered-By: RIM");
header("X-APPWORLD-MIN: 1.1.0.0");
header("X-APPWORLD-VER: 2.0.0.10");
header("X-APPWORLD-SIG: Test");

if (isset($_GET['format']) && $_GET['format'] == "png") {
    header("Content-Type: image/png;charset=UTF-8");
    die(readfile("../image.png"));
} else {
    header("Content-Type: image/jpeg;charset=UTF-8");
    die(readfile("../image.jpg"));
}
