<!DOCTYPE html>
<html>

<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <title>Bhasim</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <style>
        .center {
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }

        p {
            max-width: 100vw;
        }

        svg {
            display: block;
            margin-left: auto;
            margin-right: auto;
            max-width: 4rem;
        }

        #temp {

            font-size: 4rem;
        }

        #temp * {
            display: block;
        }
    </style>
    <div class="container center">
        <?php
        date_default_timezone_set('CET');
        $time =  date('r');
        echo "<p>" . $time . "</p>";
        ?>
        <h1>Temperatuer im Garten</h1>
        <?php
        $tempgarten = ((float)file_get_contents("http://" + $_SERVER["SERVER_ADDR"] + ":42069/api/temp/garten")) / 1000;

        ?>
        <div id="temp"> <?php echo $tempgarten;
                        if ($tempgarten >= 25) {
                            echo '<svg xmlns="http://www.w3.org/2000/svg" id="svgtemp" fill="currentColor" class="bi bi-thermometer-high" viewBox="0 0 16 16">
          <path d="M9.5 12.5a1.5 1.5 0 1 1-2-1.415V2.5a.5.5 0 0 1 1 0v8.585a1.5 1.5 0 0 1 1 1.415z"/>
          <path d="M5.5 2.5a2.5 2.5 0 0 1 5 0v7.55a3.5 3.5 0 1 1-5 0V2.5zM8 1a1.5 1.5 0 0 0-1.5 1.5v7.987l-.167.15a2.5 2.5 0 1 0 3.333 0l-.166-.15V2.5A1.5 1.5 0 0 0 8 1z"/>
        </svg>';
                        } elseif ($tempgarten <= 5) {
                            echo '<svg xmlns="http://www.w3.org/2000/svg" id="svgtemp" fill="currentColor" class="bi bi-thermometer-low" viewBox="0 0 16 16">
          <path d="M9.5 12.5a1.5 1.5 0 1 1-2-1.415V9.5a.5.5 0 0 1 1 0v1.585a1.5 1.5 0 0 1 1 1.415z"/>
          <path d="M5.5 2.5a2.5 2.5 0 0 1 5 0v7.55a3.5 3.5 0 1 1-5 0V2.5zM8 1a1.5 1.5 0 0 0-1.5 1.5v7.987l-.167.15a2.5 2.5 0 1 0 3.333 0l-.166-.15V2.5A1.5 1.5 0 0 0 8 1z"/>
        </svg>';
                        } else {
                            echo '<svg xmlns="http://www.w3.org/2000/svg" id="svgtemp" fill="currentColor" class="bi bi-thermometer-half" viewBox="0 0 16 16">
          <path d="M9.5 12.5a1.5 1.5 0 1 1-2-1.415V6.5a.5.5 0 0 1 1 0v4.585a1.5 1.5 0 0 1 1 1.415z"/>
          <path d="M5.5 2.5a2.5 2.5 0 0 1 5 0v7.55a3.5 3.5 0 1 1-5 0V2.5zM8 1a1.5 1.5 0 0 0-1.5 1.5v7.987l-.167.15a2.5 2.5 0 1 0 3.333 0l-.166-.15V2.5A1.5 1.5 0 0 0 8 1z"/>
        </svg>';
                        };
                        echo "</div>";
                        ?>
            <br>

            <h1>Temperatuer in Lennox Zimmer</h1>
            <?php
            $templennox = ((float)file_get_contents("http://" + $_SERVER["SERVER_ADDR"] + ":42069/api/temp/lennox")) / 1000;
            ?>
            <div id="temp"> <?php echo $templennox;
                            if ($templennox >= 25) {
                                echo '<svg xmlns="http://www.w3.org/2000/svg" id="svgtemp" fill="currentColor" class="bi bi-thermometer-high" viewBox="0 0 16 16">
          <path d="M9.5 12.5a1.5 1.5 0 1 1-2-1.415V2.5a.5.5 0 0 1 1 0v8.585a1.5 1.5 0 0 1 1 1.415z"/>
          <path d="M5.5 2.5a2.5 2.5 0 0 1 5 0v7.55a3.5 3.5 0 1 1-5 0V2.5zM8 1a1.5 1.5 0 0 0-1.5 1.5v7.987l-.167.15a2.5 2.5 0 1 0 3.333 0l-.166-.15V2.5A1.5 1.5 0 0 0 8 1z"/>
        </svg>';
                            } elseif ($templennox <= 5) {
                                echo '<svg xmlns="http://www.w3.org/2000/svg" id="svgtemp" fill="currentColor" class="bi bi-thermometer-low" viewBox="0 0 16 16">
          <path d="M9.5 12.5a1.5 1.5 0 1 1-2-1.415V9.5a.5.5 0 0 1 1 0v1.585a1.5 1.5 0 0 1 1 1.415z"/>
          <path d="M5.5 2.5a2.5 2.5 0 0 1 5 0v7.55a3.5 3.5 0 1 1-5 0V2.5zM8 1a1.5 1.5 0 0 0-1.5 1.5v7.987l-.167.15a2.5 2.5 0 1 0 3.333 0l-.166-.15V2.5A1.5 1.5 0 0 0 8 1z"/>
        </svg>';
                            } else {
                                echo '<svg xmlns="http://www.w3.org/2000/svg" id="svgtemp" fill="currentColor" class="bi bi-thermometer-half" viewBox="0 0 16 16">
          <path d="M9.5 12.5a1.5 1.5 0 1 1-2-1.415V6.5a.5.5 0 0 1 1 0v4.585a1.5 1.5 0 0 1 1 1.415z"/>
          <path d="M5.5 2.5a2.5 2.5 0 0 1 5 0v7.55a3.5 3.5 0 1 1-5 0V2.5zM8 1a1.5 1.5 0 0 0-1.5 1.5v7.987l-.167.15a2.5 2.5 0 1 0 3.333 0l-.166-.15V2.5A1.5 1.5 0 0 0 8 1z"/>
        </svg>';
                            };
                            echo "</div>";
                            ?>
                <br>

            </div>

</body>

</html>