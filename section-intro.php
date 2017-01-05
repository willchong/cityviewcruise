<section class="intro" id="intro">
	<h1><?php echo get_post_meta(get_the_ID(), 'headline')[0]; ?></h1>
	<p class="subhead"><?php echo get_post_meta(get_the_ID(), 'subhead')[0]; ?></p>
	<a href="<?php echo get_post_meta(get_the_ID(), 'buttonLink')[0]; ?>" target="_blank" class="cta">
		<?php echo get_post_meta(get_the_ID(), 'button')[0]; ?>
	</a>
	<p class="disclaimer"><?php echo get_post_meta(get_the_ID(), 'disclaimer')[0]; ?></p>
	<p><?php echo get_post_meta(get_the_ID(), 'incentive')[0]; ?></p>
</section>