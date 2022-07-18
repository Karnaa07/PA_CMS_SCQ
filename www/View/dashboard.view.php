
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/map.js"></script>
<script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
<link rel="stylesheet" type="text/css" href="../css/dashboard.css">

<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>


<script src="https://cdn.amcharts.com/lib/5/radar.js"></script>

<script> 
    var dataStats = []
</script>
<?php
    for ($i=0; $i < count($registeredStats) ; $i++) 
    { 
        // echo(print_r($registeredStats[$i]).'<br>');
        echo('
                <script> dataStats.push(
                {
                    month:"'.$registeredStats[$i]["month"].'",
                    value:'.$registeredStats[$i]["value"].'
                }) 
                </script>'
            );
    }
?>
<script> 
   console.log(dataStats)
</script>
<div class = "dashboard--statswrapper">
    <div id="chartdiv" class=""><h1>Utilisateurs en ligne </h1></div>  
    <div class ="dashboard--vertical"> 
        <div id="chartStats" class=""><h1 style="margin-left: 10px;">Statistiques d'utilisation</h1></div>
        <div id="horloge" class=""></div>
    </div>
</div>
<!-- <script src="../js/chart.js"></script> d-->
<script src="../js/charts.js"></script>




