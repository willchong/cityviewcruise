<section class="location" id="location">
 <?php the_title('<h1>','</h1>'); ?>
 <?php echo get_post_meta(get_the_ID(), 'mapCoords')[0]; ?>
 <div id="map"></div>
 <a href="<?php echo get_post_meta(get_the_ID(), 'imageUrl')[0]; ?>" target="_blank">
 	<img class="map3d" src="<?php echo get_post_meta(get_the_ID(), 'imageUrl')[0]; ?>" alt="">
 </a>
</section>