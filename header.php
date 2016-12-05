<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/styles.css" />
<link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB9SQoCYJPxxT74OjDRz8BN8BANbIh3TdY"></script>
<script type="text/javascript">
    // When the window has finished loading create our google map below
    google.maps.event.addDomListener(window, 'load', init);

    function init() {
        // Basic options for a simple Google Map
        // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
        var mapOptions = {
            // How zoomed in you want the map to start at (always required)
            zoom: 15,

            // The latitude and longitude to center the map (always required)
            center: new google.maps.LatLng(43.637702, -79.382697),

            // How you would like to style the map. 
            // This is where you would paste any style found on Snazzy Maps.
            styles: [{"featureType":"all","elementType":"geometry.fill","stylers":[{"saturation":"-100"}]},{"featureType":"all","elementType":"geometry.stroke","stylers":[{"visibility":"on"}]},{"featureType":"all","elementType":"labels.icon","stylers":[{"visibility":"on"}]},{"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#929292"}]},{"featureType":"administrative.country","elementType":"geometry.fill","stylers":[{"visibility":"on"},{"saturation":"5"},{"lightness":"-11"},{"weight":"0.01"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#f2f2f2"}]},{"featureType":"landscape.man_made","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape.man_made","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"landscape.natural","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"poi","elementType":"geometry.fill","stylers":[{"saturation":"-100"},{"visibility":"off"}]},{"featureType":"poi","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels.text","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels.text.fill","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels.text.stroke","stylers":[{"visibility":"off"}]},{"featureType":"poi","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi.attraction","elementType":"geometry.fill","stylers":[{"saturation":"-100"}]},{"featureType":"poi.attraction","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"poi.attraction","elementType":"labels","stylers":[{"visibility":"off"}]},{"featureType":"poi.attraction","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"poi.business","elementType":"geometry.fill","stylers":[{"saturation":"-100"}]},{"featureType":"poi.business","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"poi.government","elementType":"geometry.fill","stylers":[{"saturation":"-100"}]},{"featureType":"poi.government","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"poi.medical","elementType":"geometry.fill","stylers":[{"saturation":"-100"}]},{"featureType":"poi.medical","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"poi.park","elementType":"geometry.stroke","stylers":[{"saturation":"-100"},{"visibility":"off"}]},{"featureType":"poi.place_of_worship","elementType":"geometry.fill","stylers":[{"saturation":"-100"}]},{"featureType":"poi.place_of_worship","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"poi.school","elementType":"geometry.fill","stylers":[{"visibility":"off"}]},{"featureType":"poi.school","elementType":"geometry.stroke","stylers":[{"saturation":"-100"}]},{"featureType":"poi.sports_complex","elementType":"geometry.fill","stylers":[{"saturation":"-100"}]},{"featureType":"poi.sports_complex","elementType":"geometry.stroke","stylers":[{"visibility":"off"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"off"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#54a1d4"},{"visibility":"on"}]},{"featureType":"water","elementType":"labels.text","stylers":[{"color":"#348ea4"},{"visibility":"off"}]},{"featureType":"water","elementType":"labels.text.stroke","stylers":[{"visibility":"on"},{"color":"#ffffff"}]}]
        };

        // Get the HTML DOM element that will contain your map 
        // We are using a div with id="map" seen below in the <body>
        var mapElement = document.getElementById('map');

        // Create the Google Map using our element and options defined above
        var map = new google.maps.Map(mapElement, mapOptions);

        // Let's also add a marker while we're at it
        var marker = new google.maps.Marker({
            position: new google.maps.LatLng(43.637702, -79.382697),
            map: map
        });

        var contentString = '<div id="marker">'+
              '<p>The <strong>Ste Marie 1</strong> is located at <strong>235 Queens Quay West</strong>, near the Harbourfront Centre at the West Pier.</p>'+
              '<p>Follow Lower Simcoe St. south to the water and the Ste Marie 1 is on the west side in front of Natrel pond/rink.</p>'+
              '<a href="https://www.google.com/maps/place/City+View+Cruise+-+St.+Marie+1/@43.6373772,-79.3843819,17.22z/data=!4m5!3m4!1s0x0:0x5db3f72b46aee81d!8m2!3d43.6376902!4d-79.3827083?hl=en-US" target="_blank">Open in Google Maps</a>.'+
              ' </div>';

          var infowindow = new google.maps.InfoWindow({
            content: contentString,
            pixelOffset: google.maps.Size(200,200)
          });

          marker.addListener('click', function() {
            infowindow.open(map, marker);
          });
          infowindow.open(map, marker);

    }
</script>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="wrapper" class="hfeed">
<header id="header" role="banner">
<section id="branding" style="display: none">
<div id="site-title"><?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '<h1>'; } ?><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_html( get_bloginfo( 'name' ) ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a><?php if ( is_front_page() || is_home() || is_front_page() && is_home() ) { echo '</h1>'; } ?></div>
<div id="site-description"><?php bloginfo( 'description' ); ?></div>
</section>
</header>
<div id="container">