

    /**
 * ---------------------------------------
 * This demo was created using amCharts 5.
 * 
 * For more information visit:
 * https://www.amcharts.com/
 * 
 * Documentation is available at:
 * https://www.amcharts.com/docs/v5/
 * ---------------------------------------
 */

    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var map = am5.Root.new("chartdiv");
    var stickStats = am5.Root.new("chartStats");
    var horloge = am5.Root.new("horloge");



    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    map.setThemes([
    am5themes_Animated.new(map)
    ]);


    // Create the map chart
    // https://www.amcharts.com/docs/v5/charts/map-chart/
    var chart = map.container.children.push(am5map.MapChart.new(map, {
    panX: "rotateX",
    panY: "rotateY",
    projection: am5map.geoOrthographic()
    }));


    // Create series for background fill
    // https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/#Background_polygon
    var backgroundSeries = chart.series.push(
    am5map.MapPolygonSeries.new(map, {})
    );
    backgroundSeries.mapPolygons.template.setAll({ // Mer
    fill:am5.color(0x3498DB), // 
    fillOpacity: 1,
    strokeOpacity: 0
    });
    backgroundSeries.data.push({
    geometry:
        am5map.getGeoRectangle(90, 180, -90, -180)
    });


    // Create main polygon series for countries
    // https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/
    var polygonSeries = chart.series.push(am5map.MapPolygonSeries.new(map, {
    geoJSON: am5geodata_worldLow 
    }));
    polygonSeries.mapPolygons.template.setAll({ // Continents
    fill: am5.color(0x1EA84E),
    fillOpacity: 0.9,
    strokeWidth: 0.5,
    stroke: am5.color(0x000000)
    });


    // Create polygon series for projected circles
    var circleSeries = chart.series.push(am5map.MapPolygonSeries.new(map, {}));
    circleSeries.mapPolygons.template.setAll({
    templateField: "polygonTemplate",
    tooltipText: "{name}:{value}"
    });

    // Define data
    var colors = am5.ColorSet.new(map, {});



    var valueLow = Infinity;
    var valueHigh = -Infinity;

    for (var i = 0; i < data.length; i++) {
    var value = data[i].value;
    if (value < valueLow) {
        valueLow = value;
    }
    if (value > valueHigh) {
        valueHigh = value;
    }
    }

    // radius in degrees
    var minRadius = 0.5;
    var maxRadius = 1.5;

    // Create circles when data for countries is fully loaded.
    polygonSeries.events.on("datavalidated", function () {
    circleSeries.data.clear();

    for (var i = 0; i < data.length; i++) {
        var dataContext = data[i];
        var monthDataItem = polygonSeries.getDataItemById(dataContext.id);
        var monthPolygon = monthDataItem.get("mapPolygon");

        var value = dataContext.value;

        var radius = minRadius + maxRadius * (value - valueLow) / (valueHigh - valueLow);

        if (monthPolygon) {
        var geometry = am5map.getGeoCircle(monthPolygon.visualCentroid(), radius);
        circleSeries.data.push({
            name: dataContext.name,
            value: dataContext.value,
            polygonTemplate: dataContext.polygonTemplate,
            geometry: geometry
        });
        }
    }
    })


   // var stickStats = am5.root.new("chartStats");


// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
stickStats.setThemes([
  am5themes_Animated.new(stickStats)
]);


// Create chart
// https://www.amcharts.com/docs/v5/charts/xy-chart/
var chart = stickStats.container.children.push(am5xy.XYChart.new(stickStats, {
  panX: true,
  panY: true,
  wheelX: "panX",
  wheelY: "zoomX",
  pinchZoomX:true
}));

// Add cursor
// https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
var cursor = chart.set("cursor", am5xy.XYCursor.new(stickStats, {}));
cursor.lineY.set("visible", false);


// Create axes
// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
var xRenderer = am5xy.AxisRendererX.new(stickStats, { minGridDistance: 30 });
xRenderer.labels.template.setAll({
  rotation: -90,
  centerY: am5.p50,
  centerX: am5.p100,
  paddingRight: 15
});

var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(stickStats, {
  maxDeviation: 0.3,
  categoryField: "month",
  renderer: xRenderer,
  tooltip: am5.Tooltip.new(stickStats, {})
}));

var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(stickStats, {
  maxDeviation: 0.3,
  renderer: am5xy.AxisRendererY.new(stickStats, {})
}));


// Create series
// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
var series = chart.series.push(am5xy.ColumnSeries.new(stickStats, {
  name: "Series 1",
  xAxis: xAxis,
  yAxis: yAxis,
  valueYField: "value",
  sequencedInterpolation: true,
  categoryXField: "month",
  tooltip: am5.Tooltip.new(stickStats, {
    labelText:"{valueY}"
  })
}));

series.columns.template.setAll({ cornerRadiusTL: 5, cornerRadiusTR: 5 });
series.columns.template.adapters.add("fill", function(fill, target) {
  return chart.get("colors").getIndex(series.columns.indexOf(target));
});

series.columns.template.adapters.add("stroke", function(stroke, target) {
  return chart.get("colors").getIndex(series.columns.indexOf(target));
});


xAxis.data.setAll(dataStats);
series.data.setAll(dataStats);


    // Make stuff animate on load

// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
horloge.setThemes([
  am5themes_Animated.new(horloge)
]);


// Create chart
// https://www.amcharts.com/docs/v5/charts/radar-chart/
var chart = horloge.container.children.push(am5radar.RadarChart.new(horloge, {
  panX: false,
  panY: false
}));


// Create axis and its renderer
// https://www.amcharts.com/docs/v5/charts/radar-chart/gauge-charts/#Axes
var axisRenderer = am5radar.AxisRendererCircular.new(horloge, {
  innerRadius: -10,
  strokeOpacity: 1,
  strokeWidth: 8,
  minGridDistance: 10
});

var xAxis = chart.xAxes.push(am5xy.ValueAxis.new(horloge, {
  maxDeviation: 0,
  min: 0,
  max: 12,
  strictMinMax: true,
  renderer: axisRenderer,
  maxPrecision: 0
}));

// second axis
// https://www.amcharts.com/docs/v5/charts/radar-chart/gauge-charts/#Axes
var secondAxisRenderer = am5radar.AxisRendererCircular.new(horloge, {
  innerRadius: -10,
  radius: am5.percent(40),
  strokeOpacity: 0,
  minGridDistance: 1
});

var secondXAxis = chart.xAxes.push(am5xy.ValueAxis.new(horloge, {
  maxDeviation: 0,
  min: 0,
  max: 60,
  strictMinMax: true,
  renderer: secondAxisRenderer,
  maxPrecision: 0
}));


// hides 0 value
axisRenderer.labels.template.setAll({
  minPosition: 0.02,
  textType: "adjusted",
  inside: true,
  radius: 25
});
axisRenderer.grid.template.set("strokeOpacity", 1);


secondAxisRenderer.labels.template.setAll({
  forceHidden: true
});
secondAxisRenderer.grid.template.setAll({
  forceHidden: true
});
secondAxisRenderer.ticks.template.setAll({
  strokeOpacity: 1,
  minPosition: 0.01,
  visible: true,
  inside: true,
  length: 10
});

// Add clock hands
// https://www.amcharts.com/docs/v5/charts/radar-chart/gauge-charts/#Clock_hands

// hour
var hourDataItem = xAxis.makeDataItem({});

var hourHand = am5radar.ClockHand.new(horloge, {
  radius: am5.percent(70),
  topWidth: 14,
  bottomWidth: 14,
  innerRadius: am5.percent(43),
  pinRadius: 0,
  layer: 5
})

hourDataItem.set("bullet", am5xy.AxisBullet.new(horloge, {
  sprite: hourHand
}));

xAxis.createAxisRange(hourDataItem);

hourDataItem.get("grid").set("visible", false);

// minutes
var minutesDataItem = xAxis.makeDataItem({});

var minutesHand = am5radar.ClockHand.new(horloge, {
  radius: am5.percent(85),
  topWidth: 10,
  bottomWidth: 10,
  innerRadius: am5.percent(43),
  pinRadius: 0,
  layer: 5
})

minutesDataItem.set("bullet", am5xy.AxisBullet.new(horloge, {
  sprite: minutesHand
}));

xAxis.createAxisRange(minutesDataItem);

minutesDataItem.get("grid").set("visible", false);

// seconds
var secondsDataItem = xAxis.makeDataItem({});

var secondsHand = am5radar.ClockHand.new(horloge, {
  radius: am5.percent(40),
  innerRadius: -10,
  topWidth: 5,
  bottomWidth: 5,
  pinRadius: 0,
  layer: 5
})

secondsHand.hand.set("fill", am5.color(0xff0000));
secondsHand.pin.set("fill", am5.color(0xff0000));

secondsDataItem.set("bullet", am5xy.AxisBullet.new(horloge, {
  sprite: secondsHand
}));

xAxis.createAxisRange(secondsDataItem);

secondsDataItem.get("grid").set("visible", false);

// week label
var label = chart.radarContainer.children.push(am5.Label.new(horloge, {
  fontSize: "1.5em",
  centerX: am5.p50,
  centerY: am5.p50
}));


setInterval(function() {
  updateHands(300)
}, 1000);

function updateHands(duration) {
  // get current date
  var date = new Date();
  var hours = date.getHours();
  
  if(hours > 12){
    hours -= 12;
  }  
  
  var minutes = date.getMinutes();
  var seconds = date.getSeconds();

  // set hours
  hourDataItem.set("value", hours + minutes / 60 + seconds / 60 / 60);
  // set minutes
  minutesDataItem.set("value", 12 * (minutes + seconds / 60) / 60);
  // set seconds
  var current = secondsDataItem.get("value");
  var value = 12 * date.getSeconds() / 60;
  // otherwise animation will go from 59 to 0 and the hand will move backwards
  if (value == 0) {
    value = 11.999;
  }
  // if it's more than 11.99, set it to 0
  if (current > 11.99) {
    current = 0;
  }
  secondsDataItem.animate({
    key: "value",
    from: current,
    to: value,
    duration: duration
  });

  label.set("text", chart.getDateFormatter().format(date, "MMM dd"))
}

updateHands(0);

// Make stuff animate on load
// update on visibility
document.addEventListener("visibilitychange", function() {
  updateHands(0)
});
