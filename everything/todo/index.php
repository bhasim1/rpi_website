<!DOCTYPE html>
<html>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../../style.css" />
<title>todo</title>
<style>
    * {
        box-sizing: border-box;
        padding: 0;
        margin: 0;
        /* outline: 3px solid red; */
    }

    p {
        max-width: 100%;
    }

    .grid {
        display: grid;
        height: fit-content;
        justify-content: space-evenly;
        grid-template-columns: repeat(2, 1fr);
        width: 100vw;
    }

    .grid>div>* {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    h3{
        text-align: left;
        font-size: 3rem;
        width: 33vw;
        padding: 0.25rem;
    }
    
</style>

<body>
    <div></div>
    <div class="grid">
        <div>
            <h2>what to add</h2>
            <form action="./" method="post" enctype="multipart/form-data">
                <input type="text" name="new" placeholder="new todo">
                <input type="submit" value="uplaod todo" name="submitnew">
            </form>
        </div>
        <?php

        if (isset($_POST["submitnew"])) {
            $newcont = $_POST["new"];
            $original = json_decode(file_get_contents("./todo.json"));
            # var_dump($original);
            array_push($original, $newcont);
            # var_dump($original);
            # var_dump(json_encode($original));
            file_put_contents("./todo.json", json_encode($original));
            if (is_null(error_get_last())) {
                echo "<h2>succesfully added " . $newcont . "</h2>";
            } else {
                # var_dump(error_get_last());
            }
        }
        ?>
        <div>
            <h2>what to delete</h2>
            <form action="./" method="post" enctype="multipart/form-data">
                <input type="text" name="index" placeholder="index">
                <input type="text" name="index2" placeholder="repeat pls">
                <input type="submit" value="Upload Image" name="submitdel">
            </form>
        </div>
        <?php

        if (isset($_POST["submitdel"])) {
            $delindex = $_POST["index"];
            $original = json_decode(file_get_contents("./todo.json"));
            # var_dump($original);
            array_slice($original, $delindex, 1);
            # var_dump($original);
            if ($delindex == $_POST["index2"]) {
                file_put_contents("./todo.json", json_encode($original));
            } else {
                throw new Exception("Error Processing Request: index wrong", 1);
            }

            if (is_null(error_get_last())) {
                echo "<h2>succesfully deleted " . $newcont . "</h2>";
            } else {
                # var_dump(error_get_last());
            }
        }
        ?>
    </div>


    <div class="todo">
        <h1>all todos:</h1>
        <?php
        $file = file_get_contents("./todo.json");
        # var_dump($file);
        $json = json_decode($file);
        # var_dump($json);
        foreach ($json as $key => $value) {
            echo "<h3>$key: $value</h3>";
        };
        ?>
    </div>
</body>

</html>