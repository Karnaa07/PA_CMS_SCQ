
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
    var root = am5.Root.new("chartdiv");
    var root2 = am5.Root.new("chartStats");



    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
    am5themes_Animated.new(root)
    ]);


    // Create the map chart
    // https://www.amcharts.com/docs/v5/charts/map-chart/
    var chart = root.container.children.push(am5map.MapChart.new(root, {
    panX: "rotateX",
    panY: "rotateY",
    projection: am5map.geoOrthographic()
    }));


    // Create series for background fill
    // https://www.amcharts.com/docs/v5/charts/map-chart/map-polygon-series/#Background_polygon
    var backgroundSeries = chart.series.push(
    am5map.MapPolygonSeries.new(root, {})
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
    var polygonSeries = chart.series.push(am5map.MapPolygonSeries.new(root, {
    geoJSON: am5geodata_worldLow 
    }));
    polygonSeries.mapPolygons.template.setAll({ // Continents
    fill: am5.color(0x1EA84E),
    fillOpacity: 0.9,
    strokeWidth: 0.5,
    stroke: am5.color(0x000000)
    });


    // Create polygon series for projected circles
    var circleSeries = chart.series.push(am5map.MapPolygonSeries.new(root, {}));
    circleSeries.mapPolygons.template.setAll({
    templateField: "polygonTemplate",
    tooltipText: "{name}:{value}"
    });

    // Define data
    var colors = am5.ColorSet.new(root, {});

    var data = [
    { "id": "FR", "name": "France", "value":15, polygonTemplate: {fill:am5.color(0xFF0000) } },
    { "id": "GA", "name": "Gabon", "value": 1, polygonTemplate: { fill:am5.color(0xFF0000) } },
    { "id": "BE", "name": "Belgique", "value": 3, polygonTemplate: {fill:  am5.color(0xFF0000)} },
    { "id": "CA", "name": "Canada", "value": 3, polygonTemplate: { fill:am5.color(0xFF0000) } },
    // { "id": "GM", "name": "Gambia", "value": 1776103, polygonTemplate: { fill: colors.getIndex(2) } },
    { "id": "GE", "name": "Georgia", "value": 1, polygonTemplate: { fill:am5.color(0xFF0000) } }
    // { "id": "DE", "name": "Germany", "value": 82162512, polygonTemplate: { fill: colors.getIndex(8) } },
    // { "id": "GH", "name": "Ghana", "value": 24965816, polygonTemplate: { fill: colors.getIndex(2) } },
    // { "id": "GR", "name": "Greece", "value": 11390031, polygonTemplate: { fill: colors.getIndex(8) } },
    // { "id": "GT", "name": "Guatemala", "value": 14757316, polygonTemplate: { fill: colors.getIndex(4) } },
    // { "id": "GN", "name": "Guinea", "value": 10221808, polygonTemplate: { fill: colors.getIndex(2) } },
    // { "id": "GW", "name": "Guinea-Bissau", "value": 1547061, polygonTemplate: { fill: colors.getIndex(2) } },
    // { "id": "GY", "name": "Guyana", "value": 756040, polygonTemplate: { fill: colors.getIndex(3) } },
    // { "id": "HT", "name": "Haiti", "value": 10123787, polygonTemplate: { fill: colors.getIndex(4) } },
    // { "id": "HN", "name": "Honduras", "value": 7754687, polygonTemplate: { fill: colors.getIndex(4) } },
    // { "id": "HK", "name": "Hong Kong, China", "value": 7122187, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "HU", "name": "Hungary", "value": 9966116, polygonTemplate: { fill: colors.getIndex(8) } },
    // { "id": "IS", "name": "Iceland", "value": 324366, polygonTemplate: { fill: colors.getIndex(8) } },
    // { "id": "IN", "name": "India", "value": 1241491960, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "ID", "name": "Indonesia", "value": 242325638, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "IR", "name": "Iran", "value": 74798599, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "IQ", "name": "Iraq", "value": 32664942, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "IE", "name": "Ireland", "value": 4525802, polygonTemplate: { fill: colors.getIndex(8) } },
    // { "id": "IL", "name": "Israel", "value": 7562194, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "IT", "name": "Italy", "value": 60788694, polygonTemplate: { fill: colors.getIndex(8) } },
    // { "id": "JM", "name": "Jamaica", "value": 2751273, polygonTemplate: { fill: colors.getIndex(4) } },
    // { "id": "JP", "name": "Japan", "value": 126497241, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "JO", "name": "Jordan", "value": 6330169, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "KZ", "name": "Kazakhstan", "value": 16206750, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "KE", "name": "Kenya", "value": 41609728, polygonTemplate: { fill: colors.getIndex(2) } },
    // { "id": "KP", "name": "Korea, Dem. Rep.", "value": 24451285, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "KR", "name": "Korea, Rep.", "value": 48391343, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "KW", "name": "Kuwait", "value": 2818042, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "KG", "name": "Kyrgyzstan", "value": 5392580, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "LA", "name": "Laos", "value": 6288037, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "LV", "name": "Latvia", "value": 2243142, polygonTemplate: { fill: colors.getIndex(8) } },
    // { "id": "LB", "name": "Lebanon", "value": 4259405, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "LS", "name": "Lesotho", "value": 2193843, polygonTemplate: { fill: colors.getIndex(2) } },
    // { "id": "LR", "name": "Liberia", "value": 4128572, polygonTemplate: { fill: colors.getIndex(2) } },
    // { "id": "LY", "name": "Libya", "value": 6422772, polygonTemplate: { fill: colors.getIndex(2) } },
    // { "id": "LT", "name": "Lithuania", "value": 3307481, polygonTemplate: { fill: colors.getIndex(8) } },
    // { "id": "LU", "name": "Luxembourg", "value": 515941, polygonTemplate: { fill: colors.getIndex(8) } },
    // { "id": "MK", "name": "Macedonia, FYR", "value": 2063893, polygonTemplate: { fill: colors.getIndex(8) } },
    // { "id": "MG", "name": "Madagascar", "value": 21315135, polygonTemplate: { fill: colors.getIndex(2) } },
    // { "id": "MW", "name": "Malawi", "value": 15380888, polygonTemplate: { fill: colors.getIndex(2) } },
    // { "id": "MY", "name": "Malaysia", "value": 28859154, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "ML", "name": "Mali", "value": 15839538, polygonTemplate: { fill: colors.getIndex(2) } },
    // { "id": "MR", "name": "Mauritania", "value": 3541540, polygonTemplate: { fill: colors.getIndex(2) } },
    // { "id": "MU", "name": "Mauritius", "value": 1306593, polygonTemplate: { fill: colors.getIndex(2) } },
    // { "id": "MX", "name": "Mexico", "value": 114793341, polygonTemplate: { fill: colors.getIndex(4) } },
    // { "id": "MD", "name": "Moldova", "value": 3544864, polygonTemplate: { fill: colors.getIndex(8) } },
    // { "id": "MN", "name": "Mongolia", "value": 2800114, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "ME", "name": "Montenegro", "value": 632261, polygonTemplate: { fill: colors.getIndex(8) } },
    // { "id": "MA", "name": "Morocco", "value": 32272974, polygonTemplate: { fill: colors.getIndex(2) } },
    // { "id": "MZ", "name": "Mozambique", "value": 23929708, polygonTemplate: { fill: colors.getIndex(2) } },
    // { "id": "MM", "name": "Myanmar", "value": 48336763, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "NA", "name": "Namibia", "value": 2324004, polygonTemplate: { fill: colors.getIndex(2) } },
    // { "id": "NP", "name": "Nepal", "value": 30485798, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "NL", "name": "Netherlands", "value": 16664746, polygonTemplate: { fill: colors.getIndex(8) } },
    // { "id": "NZ", "name": "New Zealand", "value": 4414509, polygonTemplate: { fill: colors.getIndex(8) } },
    // { "id": "NI", "name": "Nicaragua", "value": 5869859, polygonTemplate: { fill: colors.getIndex(4) } },
    // { "id": "NE", "name": "Niger", "value": 16068994, polygonTemplate: { fill: colors.getIndex(2) } },
    // { "id": "NG", "name": "Nigeria", "value": 162470737, polygonTemplate: { fill: colors.getIndex(2) } },
    // { "id": "NO", "name": "Norway", "value": 4924848, polygonTemplate: { fill: colors.getIndex(8) } },
    // { "id": "OM", "name": "Oman", "value": 2846145, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "PK", "name": "Pakistan", "value": 176745364, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "PA", "name": "Panama", "value": 3571185, polygonTemplate: { fill: colors.getIndex(4) } },
    // { "id": "PG", "name": "Papua New Guinea", "value": 7013829, polygonTemplate: { fill: colors.getIndex(8) } },
    // { "id": "PY", "name": "Paraguay", "value": 6568290, polygonTemplate: { fill: colors.getIndex(3) } },
    // { "id": "PE", "name": "Peru", "value": 29399817, polygonTemplate: { fill: colors.getIndex(3) } },
    // { "id": "PH", "name": "Philippines", "value": 94852030, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "PL", "name": "Poland", "value": 38298949, polygonTemplate: { fill: colors.getIndex(8) } },
    // { "id": "PT", "name": "Portugal", "value": 10689663, polygonTemplate: { fill: colors.getIndex(8) } },
    // { "id": "PR", "name": "Puerto Rico", "value": 3745526, polygonTemplate: { fill: colors.getIndex(4) } },
    // { "id": "QA", "name": "Qatar", "value": 1870041, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "RO", "name": "Romania", "value": 21436495, polygonTemplate: { fill: colors.getIndex(8) } },
    // { "id": "RU", "name": "Russia", "value": 142835555, polygonTemplate: { fill: colors.getIndex(8) } },
    // { "id": "RW", "name": "Rwanda", "value": 10942950, polygonTemplate: { fill: colors.getIndex(2) } },
    // { "id": "SA", "name": "Saudi Arabia", "value": 28082541, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "SN", "name": "Senegal", "value": 12767556, polygonTemplate: { fill: colors.getIndex(2) } },
    // { "id": "RS", "name": "Serbia", "value": 9853969, polygonTemplate: { fill: colors.getIndex(8) } },
    // { "id": "SL", "name": "Sierra Leone", "value": 5997486, polygonTemplate: { fill: colors.getIndex(2) } },
    // { "id": "SG", "name": "Singapore", "value": 5187933, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "SK", "name": "Slovak Republic", "value": 5471502, polygonTemplate: { fill: colors.getIndex(8) } },
    // { "id": "SI", "name": "Slovenia", "value": 2035012, polygonTemplate: { fill: colors.getIndex(8) } },
    // { "id": "SB", "name": "Solomon Islands", "value": 552267, polygonTemplate: { fill: colors.getIndex(8) } },
    // { "id": "SO", "name": "Somalia", "value": 9556873, polygonTemplate: { fill: colors.getIndex(2) } },
    // { "id": "ZA", "name": "South Africa", "value": 50459978, polygonTemplate: { fill: colors.getIndex(2) } },
    // { "id": "ES", "name": "Spain", "value": 46454895, polygonTemplate: { fill: colors.getIndex(8) } },
    // { "id": "LK", "name": "Sri Lanka", "value": 21045394, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "SD", "name": "Sudan", "value": 34735288, polygonTemplate: { fill: colors.getIndex(2) } },
    // { "id": "SR", "name": "Suriname", "value": 529419, polygonTemplate: { fill: colors.getIndex(3) } },
    // { "id": "SZ", "name": "Swaziland", "value": 1203330, polygonTemplate: { fill: colors.getIndex(2) } },
    // { "id": "SE", "name": "Sweden", "value": 9440747, polygonTemplate: { fill: colors.getIndex(8) } },
    // { "id": "CH", "name": "Switzerland", "value": 7701690, polygonTemplate: { fill: colors.getIndex(8) } },
    // { "id": "SY", "name": "Syria", "value": 20766037, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "TW", "name": "Taiwan", "value": 23072000, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "TJ", "name": "Tajikistan", "value": 6976958, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "TZ", "name": "Tanzania", "value": 46218486, polygonTemplate: { fill: colors.getIndex(2) } },
    // { "id": "TH", "name": "Thailand", "value": 69518555, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "TG", "name": "Togo", "value": 6154813, polygonTemplate: { fill: colors.getIndex(2) } },
    // { "id": "TT", "name": "Trinidad and Tobago", "value": 1346350, polygonTemplate: { fill: colors.getIndex(4) } },
    // { "id": "TN", "name": "Tunisia", "value": 10594057, polygonTemplate: { fill: colors.getIndex(2) } },
    // { "id": "TR", "name": "Turkey", "value": 73639596, polygonTemplate: { fill: colors.getIndex(8) } },
    // { "id": "TM", "name": "Turkmenistan", "value": 5105301, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "UG", "name": "Uganda", "value": 34509205, polygonTemplate: { fill: colors.getIndex(2) } },
    // { "id": "UA", "name": "Ukraine", "value": 45190180, polygonTemplate: { fill: colors.getIndex(8) } },
    // { "id": "AE", "name": "United Arab Emirates", "value": 7890924, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "GB", "name": "United Kingdom", "value": 62417431, polygonTemplate: { fill: colors.getIndex(8) } },
    // { "id": "US", "name": "United States", "value": 313085380, polygonTemplate: { fill: colors.getIndex(4) } },
    // { "id": "UY", "name": "Uruguay", "value": 3380008, polygonTemplate: { fill: colors.getIndex(3) } },
    // { "id": "UZ", "name": "Uzbekistan", "value": 27760267, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "VE", "name": "Venezuela", "value": 29436891, polygonTemplate: { fill: colors.getIndex(3) } },
    // { "id": "PS", "name": "West Bank and Gaza", "value": 4152369, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "VN", "name": "Vietnam", "value": 88791996, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "YE", "name": "Yemen, Rep.", "value": 24799880, polygonTemplate: { fill: colors.getIndex(0) } },
    // { "id": "ZM", "name": "Zambia", "value": 13474959, polygonTemplate: { fill: colors.getIndex(2) } },
    // { "id": "ZW", "name": "Zimbabwe", "value": 12754378, polygonTemplate: { fill: colors.getIndex(2) } }
    ];

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
        var countryDataItem = polygonSeries.getDataItemById(dataContext.id);
        var countryPolygon = countryDataItem.get("mapPolygon");

        var value = dataContext.value;

        var radius = minRadius + maxRadius * (value - valueLow) / (valueHigh - valueLow);

        if (countryPolygon) {
        var geometry = am5map.getGeoCircle(countryPolygon.visualCentroid(), radius);
        circleSeries.data.push({
            name: dataContext.name,
            value: dataContext.value,
            polygonTemplate: dataContext.polygonTemplate,
            geometry: geometry
        });
        }
    }
    })


   // var root2 = am5.root.new("chartStats");


// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root2.setThemes([
  am5themes_Animated.new(root2)
]);


// Create chart
// https://www.amcharts.com/docs/v5/charts/xy-chart/
var chart = root2.container.children.push(am5xy.XYChart.new(root2, {
  panX: true,
  panY: true,
  wheelX: "panX",
  wheelY: "zoomX",
  pinchZoomX:true
}));

// Add cursor
// https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
var cursor = chart.set("cursor", am5xy.XYCursor.new(root2, {}));
cursor.lineY.set("visible", false);


// Create axes
// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
var xRenderer = am5xy.AxisRendererX.new(root2, { minGridDistance: 30 });
xRenderer.labels.template.setAll({
  rotation: -90,
  centerY: am5.p50,
  centerX: am5.p100,
  paddingRight: 15
});

var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root2, {
  maxDeviation: 0.3,
  categoryField: "country",
  renderer: xRenderer,
  tooltip: am5.Tooltip.new(root2, {})
}));

var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root2, {
  maxDeviation: 0.3,
  renderer: am5xy.AxisRendererY.new(root2, {})
}));


// Create series
// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
var series = chart.series.push(am5xy.ColumnSeries.new(root2, {
  name: "Series 1",
  xAxis: xAxis,
  yAxis: yAxis,
  valueYField: "value",
  sequencedInterpolation: true,
  categoryXField: "country",
  tooltip: am5.Tooltip.new(root2, {
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


// Set data
var dataStats = [{
  country: "USA",
  value: 2025
}, {
  country: "China",
  value: 1882
}, {
  country: "Japan",
  value: 1809
}, {
  country: "Germany",
  value: 1322
}, {
  country: "UK",
  value: 1122
}, {
  country: "France",
  value: 1114
}, {
  country: "India",
  value: 984
}, {
  country: "Spain",
  value: 711
}, {
  country: "Netherlands",
  value: 665
}, {
  country: "Russia",
  value: 580
}, {
  country: "South Korea",
  value: 443
}, {
  country: "Canada",
  value: 441
}];

xAxis.data.setAll(dataStats);
series.data.setAll(dataStats);


    // Make stuff animate on load
    chart.appear(1000, 100);

