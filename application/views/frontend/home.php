
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lights on</title>

     <!-- faveicon start   -->
    <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/frontend/image/favicon.png" alt="">

    <link rel="stylesheet" href="<?php echo base_url()?>assets/frontend/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/frontend/css/introjs.min.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

      <link rel="stylesheet" href="https://unpkg.com/leaflet@1.4.0/dist/leaflet.css" integrity="sha512-puBpdR0798OZvTTbP4A8Ix/l+A4dHDD0DGqYW6RQ+9jxkRFclaxxQb/SJAWZfWAkuyeQUytO7+7N4QKrDh+drA=="
      crossorigin="" />



    <link rel="stylesheet" href="<?php echo base_url()?>assets/frontend/css/style.css">
    <style>
    .leaflet-top.leaflet-right {
        right: -1;
        right: auto;
        top: 75px;
        left: 8px;
    }
    </style>
</head>

<body>

    <!-- header start -->
    <header>
        <div class="container-fluid d-flex align-items-center  custom-flex">
            <div class="logoHolder">
                <span class="LogoText">
                   <img class="" src="<?php echo base_url()?>assets/frontend/image/light.svg" alt=""> Lights On
                </span>
            </div>
            <?php

              $error= $this->session->flashdata('msg');
               if($error){ ?>

                 <div class="alert alert-info alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Message!!!!</strong> <?php echo $error ; ?>
                  </div>
               <?php
               }
                ?>
            <div class="switch right ">
                <input type="checkbox" id="id-name--1" name="set-name" class="switch-input toglbtn">
                <label for="id-name--1" class="switch-label"><span class="toggle--on">Darkmode</span><span class="toggle--off">Lightmode</span></label>
            </div>

        </div>
    </header>
    <!-- header end -->

    <div class="mainholder">

        <!-- leaflet map -->
        <section class="main" id="mapid">
            <div class="fixedfooter">
              <!-- <h1 data-step="1" data-intro="Click and add Markers to map!"></h1> -->
              <button class="maptopBtn" id="addlight" type="button" data-toggle="modal" data-target="#modal1">
                  <i class="fa fa-lightbulb">
                  </i>
                  <span>ADD LIGHT TO MAP</span>
                  <img class="bulb" src="<?php echo base_url()?>assets/frontend/image/light.svg" alt="">
              </button>
          </div>
        </section>
        <!-- leaftlet map end -->

        <!-- mapside data -->
        <div class="sideData">

          <!-- showhide arrow-->
          <div class="arowIcon">
              <i class="fa fa-arrow-left"></i>
          </div>

          <!-- mapside data content-->
          <div class="sideData-wrap">
            <div id="chart1" style="height:200px"></div>
            <!-- <div id="chart2" style="height:200px"></div> -->
            <div class="charts"></div>

            <!-- progress report -->
            <div class="progress-report">

              <!-- progress reportOne -->
              <div class="progressOne">
                <div class="progressWrapper">
                  <h4>Solar Light<span class="total-count"><?php echo $pie_data_s ?></span></h4>
                    <div class="progress-content">
                        <h5>function</h5>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="1" aria-valuemin="0" id="p_s_func" aria-valuemax="<?php echo $pie_data_s ?>">
                            <span class="popOver" data-toggle="tooltip" data-placement="top"></span>
                        </div>
                        <div class="datashow">
                            <label>Solar light : </label><span class="progress-value">50%</span>
                        </div>
                    </div>
                </div>
                <div class="progressWrapper">
                    <div class="progress-content">
                        <h5>Non-functional</h5>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="2" aria-valuemin="0" id="p_s_nfunc" aria-valuemax="<?php echo $pie_data_s ?>">
                            <span class="popOver" data-toggle="tooltip" data-placement="top">0</span>
                        </div>
                        <div class="datashow">
                            <label>Non-functional : </label><span class="progress-value">0</span>
                        </div>
                    </div>
                </div>
              </div>

              <!-- progress reportTwo -->
              <div class="progressTwo">
                <div class="progressWrapper">
                  <h4>Electric Light<span class="total-count"><?php echo $pie_data_e ?></span></h4>
                    <div class="progress-content">
                        <h5>function</h5>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" id="p_e_func" aria-valuemax="<?php echo $pie_data_e ?>">
                            <span class="popOver" data-toggle="tooltip" data-placement="top">0</span>
                        </div>
                        <div class="datashow">
                            <label>Function : </label><span class="progress-value">0</span>
                        </div>
                    </div>
                </div>
                <div class="progressWrapper">
                    <div class="progress-content">
                        <h5>Non-functional</h5>
                    </div>
                    <div class="progress">
                        <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" id="p_e_nfunc" aria-valuemax="<?php echo $pie_data_e ?>">
                            <span class="popOver" data-toggle="tooltip" data-placement="top">0</span>
                        </div>
                        <div class="datashow">
                            <label>Non-functional : </label><span class="progress-value">0</span>
                        </div>
                    </div>
                </div>
              </div>
            </div>

            <!-- progress report end -->
            <div class="btnflex">
              <a class="export-btn" href="#"> Data</a>
              <a class="export-btn abtbtn" href="#aboutSection"> About US</a>
            </div>
            <h1 data-step="3" data-intro="Click to find out more about Project!"></h1>
          </div>
          <!-- mapside data content end-->
        </div>
        <!-- mapside data end -->
        <!--Lagend start -->
        <div class="legends">
          <!-- filter section Upadated-->
          <div class="filter">
            <form>
              <ul>
                  <li>
                    <!-- sub filter -->
                    <div class="toggle-subfilter">
                      <h5>Solar Light </h5>
                      <!-- filter -->
                      <div class="toggle-filter">
                        <p>functional</p>
                        <div class="switch">
                            <input type="checkbox" value = "solar_functional" class="CheckBox" id="function-btn" checked>
                            <label for ="function-btn"></label>
                        </div>
                      </div>

                      <!-- filter -->
                      <div class="toggle-filter">
                        <p>Non-functional</p>
                        <div class="switch">
                            <input type="checkbox" value="solar_nonfunctional" class="CheckBox" id="nonfunction-btn" checked>
                            <label for ="nonfunction-btn"></label>
                        </div>
                      </div>

                    </div>
                  </li>
                  <li>
                    <!-- sub filter -->
                    <div class="toggle-subfilter">
                      <h5>Electric Light</h5>
                      <!--filter -->
                      <div class="toggle-filter">
                        <p>functional</p>
                        <div class="switch">
                            <input type="checkbox" value = "electric_functional" class="CheckBox" id="electric-btn" checked>
                            <label for ="electric-btn"></label>
                        </div>
                      </div>

                      <!--filter -->
                      <div class="toggle-filter">
                        <p>Non-functional</p>
                        <div class="switch">
                            <input type="checkbox" value="electric_nonfunctional" class="CheckBox" id="nonelectric-btn" checked>
                            <label for ="nonelectric-btn"></label>
                        </div>
                      </div>
                    </div>
                  </li>
              </ul>
            </form>
          </div>
        </div>

        <!--lagend end -->

        <!-- <h1 data-step="2" data-intro="Click and find in the map  different types of lights being used"></h1> -->
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Adding Light </h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div class="modal-body">
            <div class="row">
                <div class="col-md-7">
                  <div id="iframeMap" style="">
                  </div>
                </div>
                <div class="col-md-5">
                  <div>
                    <div id="rootwizard">
                      <div class="navbar">
                        <div class="navbar-inner">
                          <ul>
                              <li><a href="#tab1" data-toggle="tab">First</a></li>
                              <li><a href="#tab2" data-toggle="tab">Second</a></li>
                              <li><a href="#tab3" data-toggle="tab">Third</a></li>
                              <li><a href="#tab4" data-toggle="tab">Forth</a></li>
                              <li><a href="#tab5" data-toggle="tab">Fifth</a></li>
                              <li><a href="#tab6" data-toggle="tab">Sixth</a></li>
                              <li><a href="#tab7" data-toggle="tab">Seventh</a></li>
                              <li><a href="#tab8" data-toggle="tab">Eighth</a></li>
                              <li><a href="#tab9" data-toggle="tab">Ninth</a></li>
                          </ul>
                        </div>
                      </div>
                      <div id="bar" class="progress">
                          <div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0"
                              aria-valuemax="100" style="width: 0%;"></div>
                      </div>
                      <div class="tab-content">
                        <div class="tab-pane" id="tab1">
                          <form action="" method="POST" enctype="multipart/form-data">
                            <div class="question">
                              <h5> 1. Enter your email address</h5>
                              <input class="darkInput" type='text' name='email'    placeholder='Email address'
                               >
                            </div>
                          </div>
                          <div class="tab-pane" id="tab2">
                            <div class="question">
                                <h5> 2. Where is this street light located ? </h5>
                                <div class="choice d-flex   flex-column  ">
                                    <label class="rc mr30">Highway
                                        <input type="radio" value="highway" name="where_is_this_street_light_located">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="rc mr30">Road
                                        <input type="radio" value="road" name="where_is_this_street_light_located">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="rc mr30">Alley
                                        <input type="radio" value="alley" name="where_is_this_street_light_located">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                          </div>
                          <!-- <div class="tab-pane" id="tab3">
                              <div class="question">
                                  <h5> 3. What is your area number? </h5>
                                  <select name="what_is_your_area_number">
                                      <option value="a1">Area 1</option>
                                      <option value="a2">Area 2</option>
                                  </select>
                              </div>
                          </div> -->
                          <div class="tab-pane" id="tab4">
                            <div class="question">
                                <h5> 3. Type of Street Light </h5>
                                <div class="choice   morechoice d-flex flex-column">
                                    <label class="rc mr30 rm1">Electric
                                        <input type="radio" value="electric" name="type_of_street_light">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="rc mr30 rm1">Solar
                                        <input type="radio" value="solar" name="type_of_street_light">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                          </div>

                          <div class="tab-pane" id="tab5">
                            <div class="question">
                                <h5> 5. Type of street light poles </h5>
                                <div class="choice   morechoice d-flex flex-column">
                                    <label class="rc mr30 rm">Wood
                                        <input type="radio" value="wood" name="type_of_street_light_poles">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="rc mr30 rm">Concrete
                                        <input type="radio" value="concrete" name="type_of_street_light_poles">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="rc mr30">Other
                                        <input type="radio" id="others" name="other">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label id="otherinput">
                                      <input class="darkInput mt15 inputmore" type='text' name='type_of_street_light_poles_other' id='name'
                                          placeholder='Enter type of street light pole'>
                                    </label>
                                </div>
                            </div>
                          </div>
                          <div class="tab-pane" id="tab6">
                            <div class="question">
                                <h5> 6. What is status of  street light ?</h5>
                                <div class="choice   morechoice d-flex flex-column">
                                    <label class="rc mr30 rm">Functional
                                        <input type="radio" value="functional" name="what_is_the_status_of_street_light">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="rc mr30 rm">Non functional
                                        <input type="radio" value="non functional" name="what_is_the_status_of_street_light">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                          </div>

                          <div class="tab-pane" id="tab7">
                            <div class="question">
                                <h5> 7. Damage Detail of the street light</h5>
                                <!-- <div class="choice   morechoice d-flex flex-column"> -->
                                    <!-- <label class="rc mr30 rm">Solar powered -->
                                        <!-- <input type="radio" name="radio"> -->
                                        <textarea class="darkInput" name="damage_details_of_the_street_light" rowsize="5"></textarea>
                                        <!-- <span class="checkmark"></span> -->
                                    <!-- </label> -->
                                <!-- </div> -->
                            </div>
                          </div>
                          <div class="tab-pane" id="tab8">
                            <div class="question">
                              <h5>Select image to upload:</h5>
                              <input type="file" name="photo" id="fileToUpload">
                            </div>
                          </div>
                          <div class="tab-pane" id="tab9">
                            <div class="question">
                              <h5> Latitude </h5>
                              <input class="darkInput" type='text' name='latitude' id='latitude' value=''  placeholder='Enter Your Latitude'
                               required>
                              <span class="error"> Latitude </span>
                              <h5> Longitude </h5>
                              <input class="darkInput" type='text' name='longitude' id='longitude' value=''  placeholder='Enter Your Longitude'
                                  required>
                              <span class="error"> Longitude </span>
                            </div>
                            <button  name="submit" type="submit"><span>Submit</span></button>
                          </form>
                        </div>
                        <ul class="pager wizard d-flex justify-content-end buttons ">
                            <li class="previous first" style="display:none;"><button class="nextprev">
                                <span>First</span>
                              </button>
                            </li>
                            <li class="previous"><button class="nextprev">
                              <span>Previous</span>
                              </button>
                            </li>
                            <li class="next last" style="display:none;"><button class="nextprev">
                              <span>Last</span>
                              </button>
                            </li>
                            <li class="next"><button class="nextprev">
                              <span>Next</span>
                              </button>
                            </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="ipopholder">
        <div class="olay">
            <div class="initialPopover">
                <h2 class="inpop">Welcome to Kathmandu valley utility mapping initiative</h2>
                <p>As a part of this initiative we are at first mapping the <span class="coloredtext">street lights</span>
                    along with condition through crowdmapping
                  </p>
                <button class="maptopBtn ipbtn" type="button">
                  <span> GET STARTED</span>
                  <i class="fa fa-arrow-right"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- about section start -->
    <section class="detail  about-section" id="aboutSection">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <video controls autoplay loop>
                        <source src="movie.mp4">
                        <source src="<?php echo base_url()?>video/Pexels Videos 1654216.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                    </video>
                </div>
                <div class="col-md-6">
                    <h2> About</h2>
                    <p align="justify">With an aim to assist in planned urban development by collection and use of open urban geospatial data, this platform helps in mapping one of the basic urban utilities: Street Lights. Lights ON is a technical tools that allows public, voluntary groups and organizations to collect data on where street lights are and what their conditions are. The crowdsourced data collected using a mobile application is fed into this open web platform showing locations of the street lights. The target is to use this portal for real time information on status of street lights, get a visual sense of how much of the area of the city is lighted and provide baseline data to authorities for better urban development.</p>
                    <p>Lights On is a joint initiative of Youth Innovation Lab and NAXA with support from Asia Foundation and Data For Development (D4D) to engage youth in digital advocacy campaign.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- about section end -->

    <!-- jquery libaray -->

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
        crossorigin="anonymous"></script>
    <script src="<?php echo base_url()?>assets/frontend/js/bootstrap.min.js"> </script>
    <script src="https://unpkg.com/leaflet@1.4.0/dist/leaflet.js" integrity="sha512-QVftwZFqvtRNi0ZyCtsznlKSWOStnDORoefr1enyq5mVL4tmKB3S/EnC3rRJcxCPavG10IcrVGSmPh6Qw5lwrg=="
        crossorigin=""></script>

      <script src="<?php echo base_url()?>assets/frontend/js/jquery.bootstrap.wizard.js"> </script>
    <!-- <script src="<?php echo base_url()?>assets/frontend/js/jquery.steps.min.js"> </script> -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="<?php echo base_url()?>/assets/frontend/js/intro.min.js"></script>
    <script src="<?php echo base_url()?>/assets/frontend/js/leaflet.ajax.min.js"></script>
    <script src="<?php echo base_url()?>/assets/frontend/js/leaflet-bing-layer.js"></script>


    <script>

    $(document).ready(function(){
        var geojson='<?php echo $light_data ?>';
        geojson_layer = JSON.parse(geojson);
        //console.log(geojson_layer);

        mymap = L.map('mapid').setView([27.608421548604188, 85.3887634444982], 11);
        var CartoDB_DarkMatter = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
            subdomains: 'abcd',
            maxZoom: 19
        });

        const tonerUrl = "http://{S}tile.stamen.com/toner/{Z}/{X}/{Y}.png";

          const url = tonerUrl.replace(/({[A-Z]})/g, s => s.toLowerCase());

          const blackandwhite = L.tileLayer(url, {
            subdomains: ['', 'a.', 'b.', 'c.', 'd.'],
            minZoom: 0,
            maxZoom: 20,
            type: 'png',
            attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, under <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a>. Data by <a href="http://openstreetmap.org">OpenStreetMap</a>, under <a href="http://creativecommons.org/licenses/by-sa/3.0">CC BY SA</a>'
          });//.addTo(mymap);


        //L.tileLayer.bing('AoTlmaazzog43ImdKts9HVztFzUI4PEOT0lmo2V4q7f20rfVorJGAgDREKmfQAgd',{imagerySet: 'AerialWithLabels'}).addTo(mymap)
        var bing = new L.tileLayer.bing({bingMapsKey:'AoTlmaazzog43ImdKts9HVztFzUI4PEOT0lmo2V4q7f20rfVorJGAgDREKmfQAgd',imagerySet: 'AerialWithLabels'});
        //mymap.addLayer(bing);

        var osm = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
        });

        var baseLayers = {
          "OSM Dark Theme": CartoDB_DarkMatter,
          "OSM Light Theme": blackandwhite,
          "Openstreetmap": osm,
          "Bing Aerial": bing
        };
        CartoDB_DarkMatter.addTo(mymap);

        layerswitcher = L.control.layers(baseLayers,null,{collapsed:true}).addTo(mymap);


        mymap.attributionControl.addAttribution(
            'this is a product of <b> NAXA </b> ');


        var Esri_WorldStreetMap = L.tileLayer(
            'https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
                attribution: 'Tiles &copy; Esri &mdash; Source: Esri, DeLorme, NAVTEQ, USGS, Intermap, iPC, NRCAN, Esri Japan, METI, Esri China (Hong Kong), Esri (Thailand), TomTom, 2012'
            });

        var OpenStreetMap_France = L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
            maxZoom: 20,
            attribution: '&copy; Openstreetmap France | &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });

        //console.log(geojson_layer);
        var solar_functional=L.featureGroup();
        var electric_functional=L.featureGroup();
        var solar_nonfunctional=L.featureGroup();
        var electric_nonfunctional=L.featureGroup();
        var electric = L.featureGroup();
        var solar=L.featureGroup();
        var s_func_count=0;
        var s_non_func_count=0;
        var e_func_count=0;
        var e_non_func_count=0;

        var light_map = new L.GeoJSON(geojson_layer, {

          pointToLayer: function(feature, latlng) {
            // if(feature.properties.type_of_street_light == "solar"){
            //
            //   if(feature.properties.what_is_the_status_of_street_light == "functional"){
            //   var  icon='<?php echo base_url()?>/icon/sa.png';
            //   }
            //
            //   else{
            //   var  icon='<?php echo base_url()?>/icon/si.png';
            //   }
            // }else{
            //   if(feature.properties.what_is_the_status_of_street_light == "functional"){
            //   var  icon='<?php echo base_url()?>/icon/ea.png';
            //   }
            //
            //   else{
            //   var  icon='<?php echo base_url()?>/icon/ei.png';
            //   }
            //
            // }
            // icons = L.icon({
            //   iconSize: [7, 8],
            //   iconAnchor: [13, 27],
            //   popupAnchor:  [2, -24],
            //   iconUrl: icon
            // });
            // //console.log(icon.options);
            // var marker = L.marker(latlng, {icon: icons});
            var marker = L.circleMarker(latlng);
            return marker;

          },

          onEachFeature: function(feature, layer) {
        //  console.log(feature.properties);




            //feature.properties.layer_name = "transit_stops";
            //add if condition
            if(feature.properties.type_of_street_light == "solar"){
              layer.addTo(solar);
              if(feature.properties.what_is_the_status_of_street_light == "functional"){
                var  style=({
                        fillColor: 'yellow',
                        weight: 5,
                        opacity: 0.5,
                        color: 'yellow',
                        radius: '5',
                        fillOpacity:1

                });
                s_func_count++;
                layer.addTo(solar_functional);

              }else{

                var  style=({
                  fillColor: 'yellow',
                  weight: 5,
                  opacity: 0.5,
                  color: 'red',
                  radius: '5',
                  fillOpacity:0.9

                });
                s_non_func_count++;
                layer.addTo(solar_nonfunctional);
              }
            }
            else{
              layer.addTo(electric);
              if(feature.properties.what_is_the_status_of_street_light == "functional"){
                var  style=({
                        fillColor: '#c1f441',
                        weight: 5,
                        opacity: 0.5,
                        color: '#669618',
                        radius: '5',
                        fillOpacity: 0.9

                });
                e_func_count++;
                layer.addTo(electric_functional);
              }
              else{
                var  style=({
                  fillColor: '#c1f441',
                  weight: 5,
                  opacity: 0.5,
                  color: '#871896',
                  radius: '5',
                  fillOpacity: 0.9

                });

                e_non_func_count++;
                layer.addTo(electric_nonfunctional);
              }

            }
            //else
            //style for circle marker

            layer.setStyle(style);
            //end
            var popCont='';
            popCont+='<div class="mappopup" style="max-height:300px; overflow-y:auto; max-width:400px; width:100%;">';
            popCont+='<img src="'+feature.properties.photo_thumb+'" alt="map" style="padding:2px; border:1px solid #efefef;max-width:100%; height:auto;">';
            popCont+='<ul style="list-style: none;  font-size: 0.775rem; padding:5px; border:1px solid #efefef;">'
            popCont+='<li style="display: block; border-bottom:1px solid #efefef; padding: 5px 0;"><label style="margin-right: 5px; font-weight: 600;">Email: </label>'+feature.properties.email+'</li>';
            popCont+='<li style="display: block; border-bottom:1px solid #efefef; padding: 5px 0;"><label style="margin-right: 5px; font-weight: 600;">Where Is The Street Light Located : </label>'+feature.properties.where_is_this_street_light_located+'</li>';
            popCont+='<li style="display: block; border-bottom:1px solid #efefef; padding: 5px 0;"><label style="margin-right: 5px; font-weight: 600;">Type of street lightt :</label>'+feature.properties.type_of_street_light+'</li>';
            popCont+='<li style="display: block; border-bottom:1px solid #efefef; padding: 5px 0;"><label style="margin-right: 5px; font-weight: 600;">what_is_the_status_of_street_light :</label>'+feature.properties.what_is_the_status_of_street_light+'</li>';
            popCont+='<li style="display: block; border-bottom:1px solid #efefef; padding: 5px 0;"><label style="margin-right: 5px; font-weight: 600;">damage_details_of_the_street_light :</label>'+feature.properties.damage_details_of_the_street_light+'</li>';
            popCont+='</ul></div>';
              layer.bindPopup('popCont');

          }
        });//.addTo(mymap);


        solar_functional.addTo(mymap);
        solar_nonfunctional.addTo(mymap);
        electric_functional.addTo(mymap);
        electric_nonfunctional.addTo(mymap);

        // loading layers Ward_Boundary
        kathmandu = new L.geoJson.ajax("./geojson/Kathmandu.geojson", {
                    onEachFeature: function (feature, layer) {
                        var popUpContent = "";
                        popUpContent += '<table style="width:100%;" id="TAL-popup" class="popuptable">';
                        //for (data in layer.feature.properties) {
                            //console.log(feature);
                            //dataspaced = underscoreToSpace(data);
                            popUpContent += "<tr>" + "<td>District </td>" + "<td>" + "  " + layer.feature.properties.FIRST_DIST + "</td>" + "</tr>";
              popUpContent += "<tr>" + "<td>Municiplity </td>" + "<td>" + "  " + layer.feature.properties.FIRST_GaPa + "</td>" + "</tr>";
              //popUpContent += "<tr>" + "<td>Perimeter </td>" + "<td>" + "  " + layer.feature.properties.Perimeter + "</td>" + "</tr>";
                        //}
                        popUpContent += '</table>';

                        layer.bindPopup(L.popup({
                            closeOnClick: true,
                            closeButton: true,
                            keepInView: true,
                            autoPan: true,
                            maxHeight: 200,
                            minWidth: 300
                        }).setContent(popUpContent));


                    }
                });
                kathmandu.on('data:loaded', function (data) {
                    kathmandu.setStyle({
                            fillColor: 'green',
                            weight: 1,
                            opacity:0.5,
                            color: 'yellow',
                            //dashArray: '3',
                            fillOpacity: 0

                    });
                    console.log("Ward Layer Added");
                    //map.fitBounds(Ward_Boundary.getBounds(), {padding:[-50,-50]});
                });
                kathmandu.addTo(mymap);


                lalitpur = new L.geoJson.ajax("./geojson/Lalitpur.geojson", {
                    onEachFeature: function (feature, layer) {
                        var popUpContent = "";
                        popUpContent += '<table style="width:100%;" id="TAL-popup" class="popuptable">';
                        //for (data in layer.feature.properties) {
                            console.log(feature);
                            //dataspaced = underscoreToSpace(data);
                            popUpContent += "<tr>" + "<td>Name </td>" + "<td>" + "  " + layer.feature.properties.FIRST_DIST + "</td>" + "</tr>";
              popUpContent += "<tr>" + "<td>Area </td>" + "<td>" + "  " + layer.feature.properties.FIRST_GaPa + "</td>" + "</tr>";
              //popUpContent += "<tr>" + "<td>Perimeter </td>" + "<td>" + "  " + layer.feature.properties.Perimeter + "</td>" + "</tr>";
                        //}
                        popUpContent += '</table>';

                        layer.bindPopup(L.popup({
                            closeOnClick: true,
                            closeButton: true,
                            keepInView: true,
                            autoPan: true,
                            maxHeight: 200,
                            minWidth: 250
                        }).setContent(popUpContent));


                    }
                });
                lalitpur.on('data:loaded', function (data) {
                    lalitpur.setStyle({
                            fillColor: 'green',
                            weight: 1,
                            opacity: 0.5,
                            color: 'yellow',
                            //dashArray: '3',
                            fillOpacity: 0

                    });
                    console.log("Ward Layer Added");
                    //map.fitBounds(Ward_Boundary.getBounds(), {padding:[-50,-50]});
                });
                lalitpur.addTo(mymap);


            bhaktapur = new L.geoJson.ajax("./geojson/Bhaktapur.geojson", {
                    onEachFeature: function (feature, layer) {
                        var popUpContent = "";
                        popUpContent += '<table style="width:100%;" id="TAL-popup" class="popuptable">';
                        //for (data in layer.feature.properties) {
                            console.log(feature);
                            //dataspaced = underscoreToSpace(data);
                            popUpContent += "<tr>" + "<td>District </td>" + "<td>" + "  " + layer.feature.properties.FIRST_DIST + "</td>" + "</tr>";
              popUpContent += "<tr>" + "<td>Municipality </td>" + "<td>" + "  " + layer.feature.properties.FIRST_GaPa + "</td>" + "</tr>";
              //popUpContent += "<tr>" + "<td>Perimeter </td>" + "<td>" + "  " + layer.feature.properties.Perimeter + "</td>" + "</tr>";
                        //}
                        popUpContent += '</table>';

                        layer.bindPopup(L.popup({
                            closeOnClick: true,
                            closeButton: true,
                            keepInView: true,
                            autoPan: true,
                            maxHeight: 200,
                            minWidth: 300
                        }).setContent(popUpContent));


                    }
                });
                bhaktapur.on('data:loaded', function (data) {
                    bhaktapur.setStyle({
                            fillColor: 'green',
                            weight: 1,
                            opacity: 0.5,
                            color: 'yellow',
                            //dashArray: '3',
                            fillOpacity: 0

                    });
                    console.log("Ward Layer Added");
                    //map.fitBounds(Ward_Boundary.getBounds(), {padding:[-50,-50]});
                });
                bhaktapur.addTo(mymap);
        //end

        $('.switch-input').on('change',function(){
        //  console.log('clicked');
        var checked =$(this). prop("checked");
        console.log(checked);
          if(checked){
            if(mymap.hasLayer(bing)){
                mymap.removeLayer(bing);
            }
            mymap.removeLayer(CartoDB_DarkMatter);
            mymap.addLayer(blackandwhite);
          }else{
             if(mymap.hasLayer(bing)){
                mymap.removeLayer(bing);
            }
            mymap.removeLayer(blackandwhite);
            mymap.addLayer(CartoDB_DarkMatter);

          }


        });

        // console.log(s_func_count);
        // console.log(s_non_func_count);
        // console.log(e_func_count);
        // console.log(e_non_func_count);

        //adding value to pregress bar
      //  var s_func_count;
        function createProgressBar(s_func_count_p,s_non_func_count_p,e_func_count_p,e_non_func_count_p){
          //console.log(s_func_count_p);
          $('#p_s_func').attr('aria-valuenow',s_func_count_p);
          $('#p_s_nfunc').attr('aria-valuenow',s_non_func_count_p);
          $('#p_e_func').attr('aria-valuenow',e_func_count_p);
          $('#p_e_nfunc').attr('aria-valuenow',e_non_func_count_p);

          $(".progress-bar").each(function () {
            var now=$(this).attr('aria-valuenow')
            var max=$(this).attr('aria-valuemax')
            var $percent = (now / max) * 100;
            each_bar_width = $(this).attr('aria-valuenow');
            $(this).width(Math.round($percent) + '%');
            $(this).find('.popOver').html(Math.round($percent) + '%');
            $(this).parent().find('.progress-value').html(" " + now);
        });
        }
        createProgressBar(s_func_count,s_non_func_count,e_func_count,e_non_func_count);
        //end


        $(".CheckBox").on("click",function(e){
          var value = $(this).val();
          var check =$(this). prop("checked");
          //console.log(value);
          //filter progressbar
          if($('#function-btn').prop("checked")==false){
            c_s_func_count=0;

          }else{
            c_s_func_count=s_func_count;
          }

          if($('#nonfunction-btn').prop("checked")==false){
          c_s_non_func_count=0;

          }else{
            c_s_non_func_count=s_non_func_count;

          }

          if($('#electric-btn').prop("checked")==false){
            c_e_func_count=0;

          }else{
            c_e_func_count=e_func_count;

          }

          if($('#nonelectric-btn').prop("checked")==false){
            c_e_non_func_count=0;

          }else{
            c_e_non_func_count=e_non_func_count;

          }
          createProgressBar(c_s_func_count,c_s_non_func_count,c_e_func_count,c_e_non_func_count);





          var layerclicked = eval(value);//window[e.target.value];

          if(mymap.hasLayer(layerclicked)){

            mymap.removeLayer(layerclicked);


          }
          else{
            mymap.addLayer(layerclicked);
          }

        });



    var mymap1 = L.map('iframeMap').setView([27.7172, 85.3240], 13);
    var CartoDB_DarkMatter1 = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
            subdomains: 'abcd',
            maxZoom: 19
        });//.addTo(mymap);

        const tonerUrl1 = "http://{S}tile.stamen.com/toner/{Z}/{X}/{Y}.png";

          const url1 = tonerUrl1.replace(/({[A-Z]})/g, s => s.toLowerCase());

          const blackandwhite1 = L.tileLayer(url1, {
            subdomains: ['', 'a.', 'b.', 'c.', 'd.'],
            minZoom: 0,
            maxZoom: 20,
            type: 'png',
            attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, under <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a>. Data by <a href="http://openstreetmap.org">OpenStreetMap</a>, under <a href="http://creativecommons.org/licenses/by-sa/3.0">CC BY SA</a>'
          });//.addTo(mymap);


        //L.tileLayer.bing('AoTlmaazzog43ImdKts9HVztFzUI4PEOT0lmo2V4q7f20rfVorJGAgDREKmfQAgd',{imagerySet: 'AerialWithLabels'}).addTo(mymap)
        var bing1 = new L.tileLayer.bing({bingMapsKey:'AoTlmaazzog43ImdKts9HVztFzUI4PEOT0lmo2V4q7f20rfVorJGAgDREKmfQAgd',imagerySet: 'AerialWithLabels'});
        //mymap.addLayer(bing);

        var osm1 = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors'
        });

        var baseLayers1 = {
          "OSM Dark Theme": CartoDB_DarkMatter1,
          "OSM Light Theme": blackandwhite1,
          "Openstreetmap": osm1,
          "Bing Aerial": bing1
        };
        bing1.addTo(mymap1);

        layerswitcher1 = L.control.layers(baseLayers1,null,{collapsed:true}).addTo(mymap1);

        var marker = L.marker([27.710623, 85.327163], {
            draggable: true
        }).addTo(mymap1);
        marker.bindPopup('<p class="center layerpopup" style="width:100%">Drag The Marker To Choose Light</p>').openPopup();
        marker.on('dragend', function(e) {


            document.getElementById('latitude').value = marker.getLatLng().lat;
            document.getElementById('longitude').value = marker.getLatLng().lng;

        });



    $(".maptopBtn").click(function () {

        setTimeout(function () {
            window.dispatchEvent(new Event('resize'));
        }, 300);



    })



    mymap1.attributionControl.addAttribution(
        'this is a product of <b> NAXA </b> ');


  });
    </script>


    <script>
        // Build the chart
 var solar='<?php echo $pie_data_s ?>';
 var electric='<?php echo $pie_data_e ?>';
 //console.log(parseInt(solar));

        Highcharts.setOptions({
            colors: ['#544711', '#A1840F', '#DDDF00', '#24CBE5', '#64E572', '#FF9655', '#FFF263', '#6AF9C4']
        });
        Highcharts.chart('chart1', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie',

            },
            title: {
                text: ''
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {

                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },

            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: 'Electrical',
                    y: parseInt(electric),
                    sliced: true,
                    selected: true
                }, {
                    name: 'Solar',
                    y: parseInt(solar)
                }]
            }]
        });



    </script>
    <script>
    var bar_data='<?php echo $bar_data ?>';
    //console.log(bar_data);
    var b_data=JSON.parse(bar_data);
    //console.log(b_data);
    b_data.push({

        dataLabels: {
            enabled: false
        }
    })
        Highcharts.chart('chart2', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: 0,
                plotShadow: false
            },
            title: {
                text: '',
                align: 'center',

                y: 40
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    dataLabels: {
                        enabled: true,
                        distance: -50,
                        style: {
                            fontWeight: 'bold',
                            color: 'white'
                        }
                    },
                    startAngle: -90,
                    endAngle: 90,
                    center: ['50%', '75%'],
                    size: '110%'
                }
            },
            series: [{
                type: 'pie',
                name: 'Browser share',
                innerSize: '50%',
                data: b_data
            }]
        });
    </script>
    <script>
        $(document).ready(function () {
            // $(".arowIcon").click(function () {
            //         $(this).toggleClass("hideSide");
            //         $(".sideData").toggleClass("hideSide");
            //     })

            $(".arowIcon").click(function () {
                    $(this).toggleClass("hideSide");
                    $(".sideData-wrap").toggle(500);
                })

            $(".ipbtn").click(function () {
              $("body").css("overflow", "auto");
                $(".olay").addClass("hide");
                // $(".sideData").css("overflow-y","scroll");
                $('.arowIcon').toggleClass("hideSide");
                    $(".sideData-wrap").toggle(500);
            })

            $("#addlight").click(function () {

              $(".sideData-wrap").hide();
            })
        });
    </script>
    <script>
        $(document).ready(function () {
          $(".help ").click(function () {
              introJs().setOptions({
                  'scrollToElement': false,
                  'overlayOpacity': 0.5

              }).start();

          });

            $('#rootwizard').bootstrapWizard({

                onNext: function (tab, navigation, index) {

                    // if (index == 2) {
                    //     // Make sure we entered the name
                    //     if (!$('#name').val()) {
                    //         $(".error").addClass("show");
                    //
                    //         $("input").focus(function () {
                    //             $(".error").removeClass("show");
                    //         });
                    //
                    //         return false;
                    //
                    //     }
                    // }


                    if (index == 3) {
                      console.log('4');

                        $('.morechoice .rm').click(function () {
                            $(".inputmore").removeClass("showinput");

                        })

                        if ($('#others').click(function () {
                                $(".inputmore").addClass("showinput");


                            }));



                    }





                },
                onTabShow: function (tab, navigation, index) {
                    var $total = navigation.find('li').length;
                    var $current = index + 1;
                    var $percent = ($current / $total) * 100;
                    $('#rootwizard .progress-bar').css({
                        width: $percent + '%'
                    });
                }
            });

          //   $(".progress-bar").each(function () {
          //     var now=$(this).attr('aria-valuenow')
          //     var max=$(this).attr('aria-valuemax')
          //     var $percent = (now / max) * 100;
          //     each_bar_width = $(this).attr('aria-valuenow');
          //     $(this).width($percent + '%');
          //     $(this).find('.popOver').html($percent + '%');
          //     $(this).parent().find('.progress-value').html(" " + now);
          // });







          // $('.btnflex a.abtbtn').on("click", function (e) {
          //   e.preventDefault();
          //   console.log('open');
          //     $('.about-section').toggle('slow');
          //     var abtScroll = $(".about-section").offset();
          //       $('html, body').animate({
          //           scrollTop: (abtScroll - 50)
          //       }, 900);
          //   });

          $(".btnflex a.abtbtn ").click(function () {
            $('.about-section').toggle('slow');

                $('html, body').animate({
                    scrollTop: $(".about-section").offset().top
                }, 1000);
            });


        $('.toggle-filter .switch').on("change", function () {
            $('.progress-report').show('slow');
          });


            $('p.layerpopup').parent('.leaflet-popup-content').css('width','100%');


        });
        $(document).ready(function(){
          $('.mappopup').parent('.leaflet-popup-content').css({"max-width":"400px","width":"100%"});
        })
    </script>

</body>

</html>
