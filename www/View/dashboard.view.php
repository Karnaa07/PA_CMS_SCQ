
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<link rel="stylesheet" type="text/css" href="../css/dashboard.css">

<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>


<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>

<script> 
    var data = []
    var dataStats = []
</script>
<?php
    //print_r($datas);
    for ($i=0; $i < count($datas[1] ) ; $i++) 
    { 
        //var_dump($datas[1][$i]);
        // echo(print_r($registeredStats[$i]).'<br>');
        echo('
                <script> data.push(
                {
                    id:"'.strtoupper(substr($datas[1][$i]["contry"], 0, 2)).'",
                    name:"'.$datas[1][$i]["contry"].'",
                    value:'.$datas[1][$i]["value"].',
                    polygonTemplate: {fill:am5.color(0xFF0000) } 
                })
                </script>'
            );
    }

    // dataStats
    for ($i=0; $i < count($datas[0]) ; $i++) 
    { 
        // echo(print_r($registeredStats[$i]).'<br>');
        echo('
                <script> dataStats.push(
                {
                    month:"'.$datas[0][$i]["month"].'",
                    value:'.$datas[0][$i]["value"].'
                }) 
                </script>'
            );
    }
?>

<div class = "dashboard--statswrapper">
    <div id="chartdiv" class=""><h1>Utilisateurs en ligne </h1></div>  
    <div class ="dashboard--vertical"> 
        <div id="chartStats" class=""><h1 style="margin-left: 10px;">Statistiques d'utilisation</h1></div>
        <div id="horloge" class=""></div>
    </div>
</div>
<!-- <script src="../js/chart.js"></script> d-->
<script src="../js/charts.js"></script>




