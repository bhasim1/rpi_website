<!DOCTYPE html>
<html>

<head>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script> -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <title>Bhasim</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
    <!-- <script>
//         google.charts.load('current', {
//             'packages': ['line']
//         });
//         google.charts.setOnLoadCallback(drawChart);

//         function drawChart() {

//             var data = new google.visualization.DataTable();
//             data.addColumn('number', 'time');
//             data.addColumn('number', 'temp');

//             data.addRows([
//                 <?php
                    // $myfiletemp = fopen("tempsave.json", "r") or die("Unable to open tempsave.json!");
                    //       $jsontemp = fread($myfiletemp, filesize("tempsave.json"));
                    //       $jsonendtemp = json_decode($jsontemp, true);
                    //       $range = range(0 ,23);
                    // foreach($range as $key){
                    // if ($key < 10){
                    //     $key = sprintf("%02d", $key);
                    // };
                    // $outval = floor($jsonendtemp[$key] * 10) / 10;
                    // echo "[" . $key . ", " . $outval . "], ";
                    // };

                    // print_r(error_get_last());
                    // fclose($myfiletemp);
                    // 
                    ?>
//             ]);

//             var options = {};

//             var chart = new google.charts.Line(document.getElementById('chart_div'));

//             chart.draw(data, google.charts.Line.convertOptions(options));

//         }
    </script> -->
    <?php
    $filetemp = fopen("/sys/devices/w1_bus_master1/28-38db0d1e64ff/w1_slave", "r") or die("Unable to open file slave!");
    $temp1 = fread($filetemp, filesize("/sys/devices/w1_bus_master1/28-38db0d1e64ff/w1_slave"));
    $temp2 = explode("=", $temp1);
    $temp3 = floor($temp2[2] / 10) / 100;
    ?>
    <style>
        .center {
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }
    </style>
    <div class="container center">
        <h1>Temperatuer im Garten</h1>

        <div id="temp"> <?php echo $temp3;
                        if ($temp3 >= 25) {
                            echo '<svg xmlns="http://www.w3.org/2000/svg" id="svgtemp" fill="currentColor" class="bi bi-thermometer-high" viewBox="0 0 16 16">
          <path d="M9.5 12.5a1.5 1.5 0 1 1-2-1.415V2.5a.5.5 0 0 1 1 0v8.585a1.5 1.5 0 0 1 1 1.415z"/>
          <path d="M5.5 2.5a2.5 2.5 0 0 1 5 0v7.55a3.5 3.5 0 1 1-5 0V2.5zM8 1a1.5 1.5 0 0 0-1.5 1.5v7.987l-.167.15a2.5 2.5 0 1 0 3.333 0l-.166-.15V2.5A1.5 1.5 0 0 0 8 1z"/>
        </svg>';
                        } elseif ($temp3 <= 5) {
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

            <!-- <div id="chart_div"></div>
        <p>Durchschnitts Temperatur:
            <?php //$average = array_sum($jsonendtemp)/count($jsonendtemp); echo floor($average * 10) / 10;
            ?>°C
        </p> -->

        </div>

</body>

</html>