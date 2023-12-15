<html>
<head>
    
</head>


<script>
setTimeout(function(){
    window.history.back()
         }, 2000);
</script> 

<body onload="redirect()">
<?php
        $myfile = fopen("todo.json", "r") or die("Unable to open file!");
        $json = fread($myfile,filesize("todo.json"));
        $obj = json_decode($json);
        $jsonend = (array)$obj;
       // var_dump($jsonend);
        fclose($myfile);




    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $what = count($jsonend);
    $changeto = htmlspecialchars($_POST['wantedtochangeto']);

echo "You changed " . $jsonend[$what] . " to " . $changeto;

    if (empty($what or $changeto)) {
        exit();
    } else {

    }
    
    $filewrite = fopen("todo.json", "w");
    //print_r(error_get_last());
    //var_dump(json_encode($jsonend));
    $jsonend[$what] = $changeto;
    $jsonendwrite = json_encode($jsonend);
    fwrite($filewrite, $jsonendwrite);
    fclose($filewrite);
}
    
    ?>
    </body>
    </html>