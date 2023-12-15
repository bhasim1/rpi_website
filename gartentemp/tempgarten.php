#!/usr/local/bin/php –q
<?php
date_default_timezone_set('CET');
$time =  date('H');
$filetemp = fopen("/sys/devices/w1_bus_master1/28-38db0d1e64ff/w1_slave", "r") or die("Unable to open file slave!");
$temp1 = fread($filetemp,filesize("/sys/devices/w1_bus_master1/28-38db0d1e64ff/w1_slave"));
$temp2 = explode("=", $temp1);
$temp3 = (int) $temp2[2] / 1000;
fclose($filetemp);

$myfile = fopen("/var/www/html/gartentemp/tempsave.json", "r") or die("Unable to open file jsonr!");
$json = fread($myfile,filesize("/var/www/html/gartentemp/tempsave.json"));
$jsonend = json_decode($json, true);
fclose($myfile);

$filewrite = fopen("/var/www/html/gartentemp/tempsave.json", "w") or die("Unable to open file jsonw!");
$jsonend[$time] = $temp3;
$jsonendwrite = json_encode($jsonend);
fwrite($filewrite, $jsonendwrite);
fclose($filewrite);

var_dump($jsonendwrite);
var_dump($temp3);




var_dump(error_get_last());