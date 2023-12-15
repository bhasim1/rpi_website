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
        .container {
            width: 100vw;
            height: calc(fit-content + 10vh);
            display: grid;
            grid-template-areas:
                'time time'
                'temp1 temp2'
                'lumen aquarium';
            gap: 1rem;
            border: 3px solid black;
            padding: 1rem;
            text-align: center;
            font-size: 4rem;
        }

        .container>div {
            margin-top: 1rem;
            margin-bottom: 1rem;
            border: 3px solid black;
            box-shadow: 2px 2px 2px 2px gray;
        }

        .center {
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }

        @media only screen and (max-width: 750px) {
            .container {
                display: block;
                padding: 0.25rem;
            }
        }

        p {
            font-size: 2rem;
            max-width: 100vw;
        }

        svg {
            display: block;
            margin-left: auto;
            margin-right: auto;
            max-width: 4rem;
        }

        #time {
            grid-area: time;
        }

        #temp1 {
            grid-area: temp1;
        }

        #temp2 {
            grid-area: temp2;
        }

        #lumen {
            grid-area: lumen;
        }

        #aquarium {
            grid-area: aquarium;
        }
    </style>
    <div class="container center">
        <?php
        date_default_timezone_set('CET');
        $time =  date('r');
        echo "<p id='time'>" . $time . "</p>";
        ?>

        <?php
        $tempgarten = (int)file_get_contents("/sys/devices/w1_bus_master1/28-38db0d1e64ff/temperature") / 1000;

        ?>
        <div id="temp1">
            <h1>Temperatuer im Garten</h1>
            <?php echo "<p>" . $tempgarten . "</p>";
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
            <?php
            $templennox = (int)file_get_contents("/sys/devices/w1_bus_master1/10-000802d784f9/temperature") / 1000;
            ?>
            <div id="temp2">
                <h1>Temperatuer in Lennox Zimmer</h1>
                <?php echo "<p>" .  $templennox . "</p>";
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
                <div id="lumen">
                    <h1>Lumen im Garten</h1>
                    <?php
                    $lumen = (float)shell_exec("python3 getlumen.py");
                    echo "<p> im Garten sind gerade " . $lumen . " lumen</p>";
                    ?>
                </div>
                <div id="aquarium">
                    <h1>Ist das Aquarium an?</h1>
                    <?php
                    $lumen = (bool)file_get_contents("/home/pi/aquariumstate.txt");
                    if ($lumen) {
                        echo "<p> Ja</p>";
                    } else {
                        echo "<p> Nein</p>";
                    }
                    ?>
                </div>
            </div>


</body>

</html>