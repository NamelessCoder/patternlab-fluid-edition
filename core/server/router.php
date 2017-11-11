<?php
/*!
 * Router for the PHP Server
 *
 * Copyright (c) 2014 Dave Olsen
 * Licensed under the MIT license
 *
 */
use \PatternLab\Config;

$baseDir = __DIR__ . '/../../';
$autoload = $baseDir . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';

if (file_exists($autoload)) {
    require $autoload;
} else {
    echo 'Package must be installed with "composer install" before you can use it' . PHP_EOL;
    exit;
}
// load the options and be quiet about it
Config::init($baseDir, false);
if (($_SERVER["SCRIPT_NAME"] == "") || ($_SERVER["SCRIPT_NAME"] == "/")) {

    require("index.html");

} else if (file_exists(Config::getOption("publicDir").$_SERVER["SCRIPT_NAME"])) {

    return false;

} else {

    header("HTTP/1.0 404 Not Found");
    print "file doesn't exist.";

}
