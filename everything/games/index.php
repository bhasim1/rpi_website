<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h2>everything we have:</h2>
  <?php
  $dir = array_values(array_diff(scandir("./"), array(".", "..")));
  for ($i = 0; $i < count($dir); $i++) {
    echo "<a class='big' href=\"" . $dir[$i] . "\">" . $dir[$i] . "</a><br>";
  }
  ?>
</body>

</html>