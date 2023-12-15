<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/style.css" />
    <script src="./js/index.js"></script>
    <title>Main</title>
</head>

<body>
    <div id="navbar" class="sticky">
        <a href="" class="display-3">Propage</a>
        <a href="./temp.php">Garten & Lennox ╮(╯▽╰)╭</a>
        <div id="icon">
            <img src="./favicon.png" />
        </div>
    </div>

    <div class="" style="padding-top: 90px;">
        <div class="mascot">
            <div class="overlap">
                <img id="baseface" src="./assets/imgs/baseface.svg" />
                <img id="eye" src="./assets/imgs/eye.svg" style="position: relative; top: 25%; left: 20%" />
                <img id="eye" src="./assets/imgs/eye.svg" style="position: relative; top: 25%; left: 55%" />
            </div>
        </div>
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
        <div id="dirscan">
            <h2>everything we have:</h2>
            <?php
            $dir = array_values(array_diff(scandir("./everything/"), array(".", "..")));
            for ($i = 0; $i < count($dir); $i++) {
                echo "<a class='big' href=\"./everything/" . $dir[$i] . "\">" . $dir[$i] . "</a>";
            }
            ?>
        </div>
        <div id="ip_addr">
            <h2>Your remote ip:</h2>
            <?php
            echo "<p style='max-width: 100vw;'>" . $_SERVER['REMOTE_ADDR'] . "</p>";
            ?>
        </div>
    </div>




</body>

</html>