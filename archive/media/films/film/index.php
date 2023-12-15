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
        .wrapper {
            width: 100vw;
            display: flex;
            align-items: center;
            flex-wrap: wrap;
        }

        .btn {
            font-size: 1.5rem !important;
        }

        p, h1 {
            width: 100%;
            max-width: 100%;
        }

        video {
            width: 90vw;
            margin: 0;
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <h1>FILMS</h1>
        <div class="player">
            <video controls></video>
            <p>current playing: </p>
        </div>
        <h1>all:</h1>
        <?php
        $folders = array_diff(scandir("./"), array(".", "..", "index.php", ""));
        for ($i = 0; $i < count($folders) + 3; $i++) {
            if (preg_match("/.webp/i", $folders[$i])) {
                $folders[$i] = "";
            } elseif (preg_match("/.jpg/i", $folders[$i])) {
                $folders[$i] = "";
            } elseif (preg_match("/.png/i", $folders[$i])) {
                $folders[$i] = "";
            }
        }
        sort($folders);
        for ($i = 0; $i < count($folders) + 3; $i++) {
            if ($folders[$i] != "") {
                echo '<button class="btn select" data="' . $folders[$i] . '" class="big">' . $folders[$i] . '</button>';
            }
        }
        ?>
    </div>

    <script>
        function test(x) {
            console.log(x);
        }

        document.querySelectorAll("button.btn.select").forEach(element => {
            element.addEventListener("click", (e) => {
                console.log(e.target.textContent);
                document.querySelector(".player p").textContent = "current playing: " + e.target.textContent
                document.querySelector(".player video").src = e.target.textContent

            })
        });
    </script>

</body>

</html>