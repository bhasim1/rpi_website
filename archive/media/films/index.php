<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>films</title>
    <link rel="icon" href="http://85.214.159.247/favicon.ico">
    <link rel="stylesheet" href="http://85.214.159.247/PRIVAT112358/styles/style.css">
    <style>
    </style>
</head>

<body>
    <div class="wrapper">
        <h1>our films:</h1>
        <?php
        $folders = array_diff(scandir("./"), array(".", "..", "index.php"));
        // var_dump(scandir("./"));
        for ($i = 0; $i < count($folders) + 3; $i++) {
            echo '<a href="./' . $folders[$i] . '" class="big">' . $folders[$i] . '</a>';
        }
        ?>
    </div>

    <script>

    </script>

</body>

</html>