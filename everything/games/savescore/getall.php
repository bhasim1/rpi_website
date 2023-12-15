<?php

$db = new PDO('sqlite:database.db');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$fetchstatement = $db->query("SELECT * FROM highscore");
$rows =  $fetchstatement->fetchAll(PDO::FETCH_NUM);
print_r(json_encode(array_values($rows)));
