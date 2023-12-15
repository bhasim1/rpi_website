<!DOCTYPE html>
<html>
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../../style.css" />
<title>upload</title>
<style>
    * {
        box-sizing: border-box;
    }

    p {
        max-width: 100%;
    }
</style>

<body>

    <form action="./" method="post" enctype="multipart/form-data">
        <p>Select image to upload:</p>
        <input type="file" name="fileToUpload[]" id="fileToUpload" multiple>
        <label for="password">password</label>
        <input type="password" name="password">
        <input type="submit" value="Upload Image" name="submit">
    </form>
    <?php
    if (isset($_POST["submit"])) {
        # var_dump($_FILES);
        $times = 1;
        if (is_array($_FILES["fileToUpload"]["name"])) {
            $times = count($_FILES["fileToUpload"]["name"]);
        }
        for ($i = 0; $i < $times; $i++) {

            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"][$i]);
            $uploadOk = 1;

            // Check if file already exists
            if (file_exists($target_file)) {
                echo "<p>Sorry, file already exists.</p>";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["fileToUpload"]["size"][$i] > 2097152) {
                echo "<p>Sorry, your file: " . basename($_FILES["fileToUpload"]["name"][$i]) . " is too large.</p>";
                $uploadOk = 0;
            }

            //check password
            if ($_POST["password"] != "start123") {
                echo "<p>Sorry, you have the wrong password</p>";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "<p>Sorry, your file: " . basename($_FILES["fileToUpload"]["name"][$i]) . " was not uploaded.</p>";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"][$i], $target_file)) {
                    //sanitize file
                    try {
                        $data = file_get_contents($target_file);
                        $data = preg_replace("/^<\?php/", "<?php /*", $data);
                        $data = preg_replace("/\?>$/", "*/ \?>", $data);
                    } catch (\Throwable $th) {
                        echo $th;
                    }
                    echo "<p>The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"][$i])) . " has been uploaded.</p>";
                } else {
                    echo "<p>Sorry, there was an error uploading your file: " . basename($_FILES["fileToUpload"]["name"][$i]) . "</p>";
                }
            }
        }
    }


    ?>
    <h1>view all files:</h1>
    <a href="./viewall.php" class="big">Link</a>
</body>

</html>