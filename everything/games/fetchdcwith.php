<?php 
header('Access-Control-Allow-Origin: *'); header('Access-Control-Allow-Credentials: true'); header("Access-Control-Allow-Headers: *");
?>
<!DOCTYPE html>
<html>

<head>
    <title>cool</title>
      <!-- CSS only -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
      <!-- JavaScript Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
</head>
<style>
    table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 30%;
  display: block;
  margin-left: auto;
  margin-right: auto;
}

td, th {
  text-align: left;
  padding: 8px;
  border: black solid 3px;
  font-size: 2rem;
  width: 10ch !important;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
 </style>
<body>

<table id="table"></table>
</body>
<script defer>
const table = document.querySelector("table")

var cellimage
var cellname
var cellgame
var indexofdc

var row = table.insertRow(0)
tht = row.insertCell(0)
thi = row.insertCell(1)
thn = row.insertCell(2)
thg = row.insertCell(3)

tht.innerHTML = null
thi.innerHTML = "avatar"
thn.innerHTML = "Name"
thg.innerHTML = "game"

function display(){
row = table.insertRow(-1)
celli = row.insertCell(0)
celln = row.insertCell(1)
cellg = row.insertCell(2)
celli.innerHTML = `<img src="${cellimage}">`
celln.innerHTML = cellname
cellg.innerHTML = cellgame
row.insertCell(0)
}

</script>
<?php
/*$open = fopen("https://discord.com/api/guilds/756117989379538965/widget.json", "r");
$read = stream_get_contents($open);
var_dump($read);
fclose($open);*/
var_dump(file_get_contents('https://discord.com/api/guilds/756117989379538965/widget.json'));
print_r(error_get_last());
?>
</html>