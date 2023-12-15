<?php
if (isset($_POST["submit"])) {
    try {
        $data = base64_decode(explode(',', $_POST["uploadcanvasbase64"])[1]);
        file_put_contents("./imgs/" . $_POST["uploadcanvasname"] . ".png", $data);

        echo "Succesfully uploaded: " . $_POST["uploadcanvasname"];
        echo '<script>setTimeout(()=>{window.location.assign("./viewgallary.php")}, 3000)</script>';
    } catch (Exception $e) {
        echo "ERROR: " + $e;
    }
} else {
    echo "fill out the form correctly";
}
