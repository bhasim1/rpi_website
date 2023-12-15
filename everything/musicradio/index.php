<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>audio</title>
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="../../style.css">
    <style>
        p {
            margin: 0.25rem;
            font-family: monospace;
            display: inline-block;
        }

        ul {
            word-wrap: break-word;
            width: 100vw;
        }

        li {
            margin: 0.25rem;
            border: 3px solid black;
            border-radius: 5px;
        }

        #play-icon {
            margin-right: 3rem;
        }


        input[type=range] {
            width: 200px;
        }

        .audio-player-container {
            display: block;
            margin-left: auto;
            margin-right: auto;
            background-color: grey;
            border: 3px solid black;
            border-radius: 5px;
            max-width: 50vw;
            min-width: 50vw;
        }
    </style>
</head>

<body>
    <div class="wrapper">

        <h1>Music</h1>
        <div class="audio-player-container">
            <h2>Currently not playing anything</h2>
            <audio src="" preload="metadata"></audio>
            <div class="grid-container">
                <div>
                    <button id="play-icon" class="btn btn-primary">Start/Stop</button>
                    <button id="play-icon" class="btn" onclick="r = Math.floor(Math.random() * document.querySelectorAll('li').length + 1); changesrc(r)">random</button>
                </div>

                <div>
                    <p id="durationstart">0:00</p>
                </div>
                <div>
                    <input type="range" max="100" min="0" id="duration" value="0"><br>
                </div>
                <div>
                    <p id="durationend">0:00</p>
                </div>
            </div>
            <p><b>Volume:</b></p>
            <input type="range" max="100" min="0" id="volume" value="5"><br>
        </div>
        <h3>all folders:</h3>
        <?php
        $id = 0;
        $folders = array_diff(scandir("./"), array(".", "..", "index.php", "update.sh"));

        if (isset($_REQUEST["folder"])) {
            $selectedfolder = $_REQUEST["folder"];
            $specificfolder = array_diff(scandir($selectedfolder), array(".", ".."));
            for ($i = 3; $i < count($folders) + 3; $i++) {
                $cfolder =  $folders[$i];
                echo "<button class='btn' style='float:none;' onclick='window.location.assign(`index.php?folder=$cfolder`)' >" . $cfolder . "</button>";
            }
            echo ' <br>       <h3>all current songs:</h3>
            <input type="text" id="search">';
            for ($in = 0; $in < count($specificfolder); $in++) {
                if (!empty($specificfolder[$in])) {
                    $id++;
                    echo "<ul>";
                    echo "<li>" . $specificfolder[$in] . '<button onclick="changesrc(' . $id . ')" class="btn">PLAY<svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-play-fill" viewBox="0 0 16 16"><path d="m11.596 8.697-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z"/></svg></button>' . "</li>";
                    echo "</ul>";
                }
            }
        } else {
            for ($i = 3; $i < count($folders) + 3; $i++) {
                $cfolder =  $folders[$i];
                echo "<button class='btn' onclick='window.location.assign(`index.php?folder=$cfolder`)' >" . $cfolder . "</button>";
            }
            $selectedfolder = "error";
        }
        ?>
    </div>

    <script>
        //--rm-cache-di
        const audio = document.querySelector("audio")

        let mode = "pause"
        let time = 0
        let id = null

        let timeout

        $("#play-icon").click(() => {
            if (mode === "pause") {
                audio.play()
                mode = "play"
            } else {
                mode = "pause"
                audio.pause()
            }
        })

        function formattime(duration) {
            min = Math.floor(duration / 60)
            sec = duration % 60
            if (sec < 10) {
                sec = "0" + sec
            }
            return `${min}:${sec}`
        }

        function changesrc(ids) {
            document.querySelector("#duration").value = 0
            id = ids - 1
            name = document.querySelectorAll("li")[id].textContent.replace("PLAY", "")
            audio.src = "<?php echo "$selectedfolder"; ?>" + "/" + name
            audio.addEventListener("loadedmetadata", () => {
                audio.addEventListener('canplay', () => {
                    start()
                });
            })
        }

        function update() {
            document.querySelector("#duration").value = Math.floor(audio.currentTime)
            document.querySelector("#durationstart").textContent = formattime(Math.floor(Math.floor(audio.currentTime)))
        }


        function start() {
            document.querySelector("#duration").max = Math.floor(audio.duration)

            document.getElementById("durationend").textContent = formattime(Math.floor(Math.floor(audio.duration)))


            document.querySelector("#duration").addEventListener("input", (e) => {

                audio.currentTime = document.querySelector("#duration").value

            })

            document.querySelector("#volume").addEventListener("input", (e) => {
                audio.volume = parseInt(document.querySelector("#volume").value) / 100
            })

            audio.volume = parseInt(document.querySelector("#volume").value) / 100
            mode = "play"
            audio.play()

            document.querySelector("audio").addEventListener("timeupdate", (e)=>{
                update()
            })
            document.querySelector("audio").addEventListener("ended", ()=>{
                r = Math.floor(Math.random() * document.querySelectorAll('li').length + 1);
                changesrc(r)
            })

            document.querySelector("h2").textContent = "Currently playing: " + decodeURI((audio.src).split("/")[(audio.src)
                .split("/").length - 1])
        }



        document.querySelector("#search").addEventListener("keyup", () => {
            var regex = document.querySelector("#search").value.toLocaleLowerCase().replace(/play/i, "");
            rregex = new RegExp(regex, "gi")
            for (let index = 0; index < document.querySelectorAll("li").length; index++) {
                const element = document.querySelectorAll("li")[index];
                if (element.textContent.toLocaleLowerCase().search(rregex) === -1) {
                    element.style.display = "none"
                } else {
                    element.style.display = ""
                }
            }
        })
    </script>

</body>

</html>