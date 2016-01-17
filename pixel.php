<?php

$file = 'trackfile.txt';

require_once('BrowserDetection.php');
$browser = new BrowserDetection();
$userBrowserName = $browser->getBrowser();
$userBrowserVer = $browser->getVersion();
$userPlatform = $browser->getPlatform();
$device="Desktop";if ($browser->isMobile()) {$device="Mobile";}
$userAgent = $string = str_replace(',', ';', $_SERVER['HTTP_USER_AGENT']);

/*
if ($userBrowserName == BrowserDetection::BROWSER_FIREFOX && $browser->compareVersions($userBrowserVer, '5.0.1') !== 1) {
    echo 'You have FireFox version 5.0.1 or greater. ';
}
echo 'You are using ', $userBrowserName, ' ', $userBrowserVer, '.';
*/

//http://www.geoplugin.net/
require_once('ip_info.php');
$country=ip_info($_SERVER['HTTP_X_FORWARDED_FOR'], "Country");
$state=ip_info($_SERVER['HTTP_X_FORWARDED_FOR'], "State");
$town=ip_info($_SERVER['HTTP_X_FORWARDED_FOR'], "City");

// Prints date, month, year, time, AM or PM
//Use 45 bytes in DB to keep IPv6 with notation v4
$person = date("d-M-Y h:i:sA").",".$_SERVER['HTTP_CLIENT_IP'].",".$_SERVER['HTTP_X_FORWARDED_FOR'].",".$_SERVER['REMOTE_ADDR'].",".$userBrowserName.",".$userBrowserVer.",".$userPlatform.",".$device.",".$userAgent.",".$country.",".$state.",".$town."\n";
file_put_contents($file, $person, FILE_APPEND | LOCK_EX);

//header('Content-Type: image/gif');
//die("\x47\x49\x46\x38\x39\x61\x01\x00\x01\x00\x90\x00\x00\xff\x00\x00\x00\x00\x00\x21\xf9\x04\x05\x10\x00\x00\x00\x2c\x00\x00\x00\x00\x01\x00\x01\x00\x00\x02\x02\x04\x01\x00\x3b");

header('Content-Type: image/png');
die("\x89\x50\x4e\x47\x0d\x0a\x1a\x0a\x00\x00\x00\x0d\x49\x48\x44\x52\x00\x00\x00\x01\x00\x00\x00\x01\x01\x03\x00\x00\x00\x25\xdb\x56\xca\x00\x00\x00\x03\x50\x4c\x54\x45\x00\x00\x00\xa7\x7a\x3d\xda\x00\x00\x00\x01\x74\x52\x4e\x53\x00\x40\xe6\xd8\x66\x00\x00\x00\x0a\x49\x44\x41\x54\x08\xd7\x63\x60\x00\x00\x00\x02\x00\x01\xe2\x21\xbc\x33\x00\x00\x00\x00\x49\x45\x4e\x44\xae\x42\x60\x82");