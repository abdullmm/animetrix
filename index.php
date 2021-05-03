

<?php require 'head.php';




?>

<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">

        <div class="container-fluid" >

            <div id="container3" class="w-100 p-3" style="width: 60em; height: 30em;">
                <div id="map"></div>

            </div>
        </div>
        <br />
        <!--Cards-->
        <div class="container-fluid bg-light text-dark">
            <div class="row">
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 mb-3">
                    <div class="card card1">
                        <div class="card-body body1">
                            <h5 class="card-title1">Discover.</h5>
                            <p class="card-text text1">See what animals are around you! This database collects data of researchers dedicated to getting to know the world around them.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 mb-3">
                    <div class="card card2">
                        <div class="card-body body2">
                            <h5 class="card-title2">Learn.</h5>
                            <p class="card-text text2">Interact with the data from a network of researchers world-wide to understand what is going on in the ecosystem around you</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 mb-3">
                    <div class=" card card3">
                        <div class="card-body body3">
                            <h5 class="card-title3">Engage.</h5>
                            <p class="card-text text3">Seen a species before? Engage with other users, students, and researchers on our FORUM page to join in the discussion.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                    <div class="card card4">
                        <div class="card-body body4">
                            <h5 class="card-title4">Explore.</h5>
                            <p class="card-text text4">Want to gather your own data? Purchase a device, register it, and start collecting data on species near you. Check out our DEVICES page to get started today.</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div>

<script type="text/javascript">
    var markers = [

        {
            "title": 'device_1_bryan',
            "lat": '35.5247700000',
            "lng": '-78.9995610000'

        }

        ,

        {
            "title": 'device_2_bryan',
            "lat": '38.1145100000',
            "lng": '-78.1272010000'

        }

    ];
</script>


<script>

    // Initialize and add the map
    function initMap() {
        // The location of Uluru
        var showker = {lat: 38.433410, lng:  -78.872611};

        // The map, centered at Uluru
        var map = new google.maps.Map(
            document.getElementById('container3'), {zoom: 18, center: showker
            });
        // The marker, positioned at Uluru
        var marker = new google.maps.Marker({position: showker, map: map});
    }
</script>
<!--Load the API from the specified URL
* The async attribute allows the browser to render the page while the API loads
* The key parameter will contain your own API key (which is not needed for this tutorial)
* The callback parameter executes the initMap() function
-->
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDksEnZmFtaehIf5sQFG5GWe0wsefuR2gU&callback=initMap">
</script>


<?php require 'footer.php'; ?>
