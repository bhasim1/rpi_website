<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Gallary</title>
    <link rel="stylesheet" href="http://85.214.159.247/style.css" />
</head>
<style>
    html {
        overflow-y: scroll;
    }

    .container {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        justify-content: flex-start;
        gap: 10px;
    }

    img {
        width: 20vw;
        border: 3px solid black;
        border-radius: 5px;
        background-color: white;
    }
</style>

<body>
    <h1>all imgs</h1>
    <div class="container">
        <?php
        $dir = array_values(array_diff(scandir("./imgs/"), array(".", "..")));
        for ($i = 0; $i < count($dir); $i++) {
            echo "<div class='item'><img src='" . "./imgs/" . $dir[$i] . "'><h1>" . $dir[$i] . "</h1></div>";
        }
        ?></div>

</body>

</html>