<!DOCTYPE html>
<html>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<title>Bhasim</title>
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
<meta charset="UTF-8">
<meta name="description" content="testingstuff">
<meta name="keywords" content="php">
<meta name="author" content="Lennox Krämer">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
     :root {
        --blue: #1e90ff;
        --grey: rgb(204, 204, 204);
    }
    
    body {
        background-color: var(--grey);
        font-family: dosis;
    }
    
    * {
        box-sizing: border-box;
    }
    
    .place form {
        margin-left: auto;
        margin-right: auto;
    }
</style>

<body>
    <div class="container center">
        <div class="input-group place">
            <form action="<?=$_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                <h1>Guess my keepasspw</h1>
                <input class="form-control" type="text" name="guess" multiple>
                <input class="form-control" type="submit" value="guess" name="submit">
            </form>
        </div>
    <div>

</body>
<?php

$salt = 'salt6942088663369420886633187';
$hash = password_hash("Bha$1m08123AbC123$", PASSWORD_BCRYPT,['cost' => 12, 'salt' => $salt]);
$yguess = $_POST["guess"];
if($_SERVER['REQUEST_METHOD'] === 'POST'){

if($yguess === ""){
    exit();
}
elseif(password_verify($yguess, $hash)){
    echo"Good job you guessed my keepass Password";
}else{
    echo"Here you have a noob hacker. I haven't even added the salt. Kapp";
}
};
?>
</html>