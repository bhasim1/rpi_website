<?php
$filetempgarten = file_get_contents("/sys/devices/w1_bus_master1/28-38db0d1e64ff/temperature") or die("Unable to open file slave!");
$filetemplennox = file_get_contents("/sys/devices/w1_bus_master1/10-000802d784f9/temperature") or die("Unable to open file slave!");
$url = 'http://85.214.159.247/PRIVAT112358/tempreciever.php';
$data = array('token' => '9edf891593197957cc73349baba3d50e', 'tempgarten' => (string)$filetempgarten, 'templennox' => (string)$filetemplennox);


$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { /* Handle error */
    die("could not upload");
}

var_dump($result);
