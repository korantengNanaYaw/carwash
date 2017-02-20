<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="description" content="ArcGIS JS v4, Calcite Maps and Bootstrap Example">

    <title>ArcGIS JS v4, Calcite Maps and Bootstrap Example</title>

    <!-- Calcite Maps Bootstrap -->
    <link rel="stylesheet" href="https://esri.github.io/calcite-maps/dist/css/calcite-maps-bootstrap.min-v0.3.css">

    <!-- Calcite Maps -->
    <link rel="stylesheet" href="https://esri.github.io/calcite-maps/dist/css/calcite-maps-arcgis-4.x.min-v0.3.css">

    <!-- ArcGIS JS 4 -->
    <link rel="stylesheet" href="https://js.arcgis.com/4.2/esri/css/main.css">

    <style>
        html,
        body {
            margin: 0;
            padding: 0;
            height: 100%;
        }
    </style>

</head>

<body class="calcite-maps calcite-nav-top">

<!-- Navbar -->

<nav class="navbar calcite-navbar navbar-fixed-top calcite-text-light calcite-bg-dark">
    <!-- Menu -->
    <div class="dropdown calcite-dropdown calcite-text-dark calcite-bg-light" role="presentation">
        <a class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">
            <div class="calcite-dropdown-toggle">
                <span class="sr-only">Toggle dropdown menu</span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </a>
        <ul class="dropdown-menu">
            <li><a role="button" data-target="#panelBasemaps" aria-haspopup="true"><span class="glyphicon glyphicon-th-large"></span> Basemaps</a></li>
            <li><a role="button" id="calciteToggleNavbar" aria-haspopup="true"><span class="glyphicon glyphicon-fullscreen"></span> Full Map</a></li>
        </ul>
    </div>
    <!-- Title -->
    <div class="calcite-title calcite-overflow-hidden">
        <span class="calcite-title-main">Car Wash Finder</span>
        <span class="calcite-title-divider hidden-xs"></span>
        <span class="calcite-title-sub hidden-xs">Find CarWashing Bays Near You</span>
    </div>
    <!-- Nav -->
    <ul class="nav navbar-nav calcite-nav">
        <li>
            <div class="calcite-navbar-search calcite-search-expander">
                <div id="searchWidgetDiv"></div>
            </div>
        </li>
    </ul>
</nav>
<!--/.calcite-navbar -->

<!-- Map  -->

<div class="calcite-map calcite-map-absolute">
    <div id="mapViewDiv"></div>
</div>
<!-- /.calcite-map -->

<!-- Panels -->

<div class="calcite-panels calcite-panels-right calcite-text-light calcite-bg-dark panel-group">

    <!-- Basemaps Panel -->

    <div id="panelBasemaps" class="panel collapse in">
        <div id="headingBasemaps" class="panel-heading" role="tab">
            <div class="panel-title">
                <a class="panel-toggle collapsed" role="button" data-toggle="collapse" href="#collapseBasemaps"
                   aria-expanded="false" aria-controls="collapseBasemaps"><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span><span class="panel-label">Basemaps</span></a>
                <a class="panel-close" role="button" data-toggle="collapse" data-target="#panelBasemaps"><span class="esri-icon esri-icon-close" aria-hidden="true"></span></a>
            </div>
        </div>
        <div id="collapseBasemaps" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingBasemaps">
            <div class="panel-body">
                <select id="selectBasemapPanel" class="form-control">
                    <option value="streets-vector">Streets</option>
                    <option value="satellite">Satellite</option>
                    <option value="hybrid">Hybrid</option>
                    <option value="national-geographic">National Geographic</option>
                    <option value="topo-vector">Topographic</option>
                    <option value="gray-vector">Gray</option>
                    <option value="dark-gray-vector">Dark Gray</option>
                    <option value="osm">Open Street Map</option>
                    <option value="streets-night-vector">Streets Night</option>
                    <option value="streets-navigation-vector" selected="">Streets Navigation</option>
                </select>
            </div>
        </div>
    </div>
</div>
<!-- /.calcite-panels -->

<script type="text/javascript">
    var dojoConfig = {
        packages: [{
            name: "bootstrap",
            location: "https://esri.github.io/calcite-maps/dist/vendor/dojo-bootstrap"
        },
            {
                name: "calcite-maps",
                location: "https://esri.github.io/calcite-maps/dist/js/dojo"
            }]
    };
</script>

<!-- ArcGIS JS 4 -->
<script src="https://js.arcgis.com/4.2/"></script>

<script>

    require([
        "esri/Map",
        "esri/views/MapView",
        "esri/widgets/Search",
        "esri/widgets/Popup",
        "dojo/query",

        // Bootstrap
        "bootstrap/Dropdown",
        "bootstrap/Collapse",

        // Calcite Maps
        "calcite-maps/calcitemaps-v0.3",

        "dojo/domReady!"
    ], function(Map, MapView, Search, Popup, query) {

        /******************************************************************
         *
         * Create the map, view and widgets
         *
         ******************************************************************/

            // Map
        var map = new Map({
                basemap: "streets-navigation-vector"
            });

        // View
        var mapView = new MapView({
            container: "mapViewDiv",
            map: map,
            center: [-40, 40],
            zoom: 2,
            padding: {
                top: 50,
                bottom: 0
            },
            breakpoints: {
                xsmall: 768,
                small: 769,
                medium: 992,
                large: 1200
            }
        });

        // Search - add to navbar
        var searchWidget = new Search({
            view: mapView
        }, "searchWidgetDiv");

        // Zoom to New York and show popup
        searchWidget.search("New York City");

        // Change basemaps with panel
        query("#selectBasemapPanel").on("change", function(e) {
            mapView.map.basemap = e.target.value;
        });

        /******************************************************************
         *
         * Synchronize popup and Bootstrap panels
         *
         ******************************************************************/

        // Popup - dock top-right desktop, bottom for mobile
        mapView.watch("widthBreakpoint", function(breakPoint){
            if (breakPoint === "medium" || breakPoint === "large" || breakPoint === "xlarge") {
                mapView.popup.dockOptions.position = "top-right";
            } else {
                mapView.popup.dockOptions.position = "bottom-center";
            }
        });

        // Popup - show/hide panels when popup is docked
        mapView.popup.watch(["visible", "currentDockPosition"], function(){
            var docked = mapView.popup.visible && mapView.popup.currentDockPosition;
            if (docked) {
                query(".calcite-panels").addClass("invisible");
            } else {
                query(".calcite-panels").removeClass("invisible");
            }
        });

        // Panels - undock popup when panel shows
        query(".calcite-panels .panel").on("show.bs.collapse", function(e) {
            if (mapView.popup.currentDockPosition) {
                mapView.popup.dockEnabled = false;
            }
        });

    });
</script>

</body>
</html>