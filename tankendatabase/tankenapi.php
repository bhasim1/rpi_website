<?php

$pdo = new PDO("sqlite:database.db");

#print_r($_REQUEST["month"]);
$ryear = $_REQUEST["year"];
$rmonth = $_REQUEST["month"];
$rday = $_REQUEST["day"];


$search = "select * from tempmain WHERE month = $rmonth AND year = $ryear";

if($rday == "NaN"){#tag
    $searchtime = (string)$ryear . sprintf("%02d", (string)$rmonth) . "__" . "__";
    $search = "select * from tanken WHERE timestamp LIKE '$searchtime'";
}else{
    $searchtime = (string)$ryear . sprintf("%02d", (string)$rmonth) . sprintf("%02d", (string)$rday) . "__";
    $search = "select * from tanken WHERE timestamp LIKE '$searchtime'";
}

if($rday == "NaN" & $rmonth == "NaN"){#jahr
    $searchtime = (string)$ryear . "__" . "__" . "__";
    $search = "select * from tanken WHERE timestamp LIKE '$searchtime'";
}

$formatedarray = [];

$statement = $pdo->query($search);
$rows = $statement->fetchAll();
for ($i=0; $i < count($rows); $i++) { 
        $array = array((int)$rows[$i][0],(int)$rows[$i][1],(int)$rows[$i][2],(int)$rows[$i][3],(int)$rows[$i][4],(int)$rows[$i][5],(int)$rows[$i][6],(int)$rows[$i][7],(int)$rows[$i][8],(int)$rows[$i][9],(int)$rows[$i][10]);

        array_push($formatedarray,$array);
};

$rows = json_encode($formatedarray);

print_r($rows);

$pdo = null; 