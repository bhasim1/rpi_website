<!DOCTYPE html>
<html>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../../style.css" />
<title>upload</title>
<style>
    .display {
        display: flex;
        flex-direction: row;
        width: 100vw;
        margin: 0;
        flex-wrap: wrap;
        justify-content: flex-start;
    }

    .display>div {
        width: 20vw;
        max-height: 25vw;
        height: inherit;
        padding: 0.25rem;
        border: 3px solid black;
        border-radius: 1rem;
        text-align: center;
    }

    .display>div>img {
        width: 100%;
        padding: 0.25rem;
    }

    .display div p {
        overflow: scroll;
        font-size: 3rem;
        padding: 0.5rem;
        background-color: white;
        text-align: left;
        border: 3px solid black;
        width: 100%;
        max-width: 100%;
        max-height: 15vw;
    }
</style>

<body>
    <?php
    function makehtmllinebreak($input)
    {
        return preg_replace("/\R/i", "<br>", $input);
    }
    function display($type, $file)
    {
        $y = explode("/", $type)[0];
        $x = explode("/", $type)[1];
        if ($y == "image") {
            $src = $file;
            return ("<img src='$src'>");
        };
        if ($y == "audio") {
            $src = $file;
            return ("<audio src='$src' controls></audio>");
        };
        if ($y == "video") {
            $src = $file;
            return ("<video src='$src' controls></video>");
        };
        if ($x == "text") {

            $content = makehtmllinebreak(htmlspecialchars(file_get_contents($file)));
            return ("<p>$content</p>");
        };
        if ($x == "plain" || $x == "x-python") {
            $content = makehtmllinebreak(htmlspecialchars(file_get_contents($file)));
            return ("<p>$content</p>");
        };
        if ($x == "octet-stream") {
            $content = makehtmllinebreak(htmlspecialchars(file_get_contents($file)));
            return ("<textarea  style=''>$content</textarea>");
        };
        if ($x == "html" || $x == "xml") {
            $content = makehtmllinebreak(htmlspecialchars(file_get_contents($file)));
            return ("<textarea  style=''>$content</textarea>");
        }
    }


    ?>
    <h1>all files:</h1>
    <div class="display">
        <?php
        $target_dir = "uploads/";
        $folders = array_values(array_diff(scandir("./uploads"), array(".", "..")));
        for ($i = 0; $i < count($folders); $i++) {

            $foldername = $folders[$i];


            $target_file = $target_dir . $foldername;
            $mime = mime_content_type($target_file);
            $htmlel = display($mime, $target_file);
            echo "<div>";
            echo "<a class='big' href='$target_file' download='$foldername'>$foldername</a>";
            echo $htmlel;
            echo "</div>";
        }
        ?>
    </div>
</body>

</html>