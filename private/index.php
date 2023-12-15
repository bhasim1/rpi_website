<!DOCTYPE html>
<html>

<head>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <title>Bhasim</title>
    <link rel="stylesheet" href="../private.css">
    <!-- <link rel="stylesheet" href="../style.css"> -->
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
    <meta charset="UTF-8">
    <meta name="description" content="testingstuff">
    <meta name="keywords" content="php">
    <meta name="author" content="Lennox Krämer">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../jquery-3.7.0.js" defer></script>
    <script type="text/javascript" src="script.js" defer></script>
</head>

<body>
    <div id="navbar" class="sticky">
        <a href="" class="display-3">Propage</a>
        <a href="../temp.php">Garten & Lennox ╮(╯▽╰)╭</a>
        <div id="icon">
            <img src="../favicon.png" />
        </div>
    </div>

    <div class="" style="padding-top: 90px;">
        <div class="mascot">
            <div class="overlap">
                <img id="baseface" src="../assets/imgs/baseface.svg" />
                <img id="eye" src="../assets/imgs/eye.svg" style="position: relative; top: 25%; left: 20%" />
                <img id="eye" src="../assets/imgs/eye.svg" style="position: relative; top: 25%; left: 55%" />
            </div>
        </div>
        <style>
            .mascot {
                position: absolute;
                top: 55px;
            }

            .overlap {
                width: 20px;
                display: grid;
                justify-items: start;
                align-items: start;
                transform: rotate(180deg);
                margin-left: 800%;
            }

            .overlap>* {
                grid-column-start: 1;
                grid-row-start: 1;
            }

            .overlap img {
                width: 10vw;
            }

            .overlap #eye {
                width: 25%;
                height: 25%;
            }
        </style>
               <script defer>
            const isMobile = navigator.userAgentData?.mobile;
            const eyes = document.querySelectorAll(".overlap #eye");
            if (!isMobile)

            {
                window.addEventListener("mousemove", (e) => {
                    eyes.forEach((el) => {
                        const angle = Math.atan2(
                            -(e.clientY - el.getBoundingClientRect().y),
                            -(e.clientX - el.getBoundingClientRect().x)
                        );
                        el.style.transform = "rotate(" + angle + "rad)";

                        if (((Math.hypot(
                                el.getBoundingClientRect().y - e.clientY,
                                el.getBoundingClientRect().x - e.clientX
                            ))) < 200) {
                            document.querySelector(".mascot").style.top = "" +
                                ((Math.hypot(
                                    el.getBoundingClientRect().y - e.clientY,
                                    el.getBoundingClientRect().x - e.clientX
                                )) / 10) + "px"
                        } else {
                            document.querySelector(".mascot").style.top = "55px"
                        }
                    });
                });
            }
        </script>
        <div class="flex-container">
            <div class="left-align">
                <h1 id="h13" class="">Todolist</h1>
                <ul class="val" id="out">
                    <li class='list-group-item firsttodolist'>items in json</li>
                    <?php
                    $myfile = fopen("todo.json", "r") or die("Unable to open file!");
                    $json = fread($myfile, filesize("todo.json"));
                    $obj = json_decode($json);
                    $jsonend = (array)$obj;
                    // var_dump($jsonend, $obj);
                    foreach ($jsonend as $key => $value) {
                        echo "<li class='list-group-item'><b>" . $key . ":</b> " . $value . "</li>";
                    };
                    fclose($myfile);
                    ?>
                </ul>
            </div>
            <div class="changetodolist">
                <h1 id="h13">Change Todolist</h1>
                <div class="place">
                    <form method="post" action="./fchange.php" enctype="multipart/form-data">

                        <p>Add</p>
                        <input type="text" name="wantedtochangeto" id="wantedtochangeto" required><br>
                        <input type="submit" value="change" class="submit btn-primary">
                    </form>
                </div>

            </div>
        </div>




        <div class="specialstuffasdf">


            <div class="timeset" id="canvas6toggle">
                <button class="btn btn-primary btn-outline-dark btn-lg" onclick="settime()">Zeit einsetzen(wird immer
                    wiederholt)</button><br><input class="" type="text" id="wanttime" placeholder="Stunde-Minute">
                <p id="countdown"></p>
                <!-- <p>F5 damit alles richtig ist!</p> -->
                <br>
            </div>

        </div>
</body>

</html>