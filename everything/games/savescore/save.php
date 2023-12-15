<?php

if (isset($_POST["submit"])) {
    $db = new PDO('sqlite:database.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $error;


    try {
        $sqlstatement = "INSERT INTO highscore (user, cettime, score) VALUES ('"  . $_POST["username"] . "', 'datetime()', '" . $_POST["score"] . "')";
        $db->query($sqlstatement);
    } catch (Exception $e) {
        var_dump($e);
        $error = $e;
    }
    if ($error === null) {
        echo "<script>setTimeout(()=>{location.replace('./')}, 3000)</script>";
        print("succesfully uploaded: '" . $_POST["username"] . "," . $_POST["score"] . "'");
    }
}
