<?php get_header(); ?>
<section id="content" role="main">
	<nav class="active">
		<ul>
			<a class="navlink" href="#times"><li>Times</li></a>
			<a class="navlink" href="#"><li>Tickets</li></a>
			<a class="navlink" href="#routes"><li>Routes</li></a>
			<a class="navlink" href="#intro">
				<svg version="1.1" id="anchor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
				 viewBox="0 0 146.3 162.6" enable-background="new 0 0 146.3 162.6" xml:space="preserve">
			<path fill="#FFFFFF" d="M146.2,113.6l-4.9-32.2c0,0-0.9-2.6-3.6-3.3s-5.4,0.8-5.4,0.8l-11.2,10c0,0-15.1,12.9-15.2,17.5
				c-0.1,5.7,10,7.3,10,7.3s-4.3,10-15,20.3c-5.3,5.2-12.5,7.7-18.3,8.9v-99c7.9-3.6,13.5-11.6,13.5-20.9c0-12.7-10.3-23-23-23
				s-23,10.3-23,23c0,9.3,5.5,17.3,13.5,20.9v99c-5.8-1.2-13-3.7-18.3-8.9c-10.7-10.3-15-20.3-15-20.3s10.1-1.7,10-7.3
				c-0.1-4.6-15.2-17.5-15.2-17.5L14,78.8c0,0-2.7-1.6-5.4-0.8S5,81.3,5,81.3l-4.9,32.2c0,0-0.9,4.5,2.2,6.2c3.2,1.8,6.1,1.4,7.6,0.9
				s3.9-1.5,3.9-1.5S20,138.6,37,151.6c7.7,5.9,19.3,10.2,33.1,10.9c0.6,0.1,1.3,0.1,2.1,0.1c0.3,0,0.6,0,0.8,0c0.3,0,0.6,0,0.8,0
				c0.8,0,1.5,0,2.1-0.1c13.8-0.7,25.5-5,33.1-10.9c17-13,23.2-32.4,23.2-32.4s2.4,1,3.9,1.5s4.4,0.9,7.6-0.9
				C147,118,146.2,113.6,146.2,113.6z M73.1,13.7c5.1,0,9.2,4.1,9.2,9.2c0,5.1-4.1,9.2-9.2,9.2S64,27.9,64,22.9
				C64,17.8,68.1,13.7,73.1,13.7z"/>
			</svg>
			</a>
			<a class="navlink" href="#location"><li>Location</li></a>
			<a class="navlink" href="#faq"><li>FAQ</li></a>
			<a class="navlink" href="#about"><li>About</li></a>
		</ul>
	</nav>
<?php 

$args = array(
	'order' => 'ASC',
	'orderby' => 'meta_value',
	'meta_key' => 'listOrder'
);
// the query
$the_query = new WP_Query( $args ); ?>

<?php if ( $the_query->have_posts() ) : ?>

	<!-- the loop -->
	<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
		
		<?php if (get_the_title($post) == 'Intro'): ?>
			<?php get_template_part('section-intro'); ?>

		<?php elseif (get_the_title($post) == 'Schedule and Times'): ?>
			<?php get_template_part('section-schedule'); ?>

		<?php elseif (get_the_title($post) == 'Location'): ?>
			<?php get_template_part('section-location'); ?>

		<?php elseif (get_the_title($post) == 'Route Map'): ?>
			<?php get_template_part('section-route'); ?>

		<?php elseif (get_the_title($post) == 'Social'): ?>
			<?php get_template_part('section-social'); ?>

		<?php elseif (get_the_title($post) == 'FAQ'): ?>
			<?php get_template_part('section-faq'); ?>
		
		<?php elseif (get_the_title($post) == 'Private Charters'): ?>
			<?php get_template_part('section-charters'); ?>
		
		<?php elseif (get_the_title($post) == 'About Us'): ?>
			<?php get_template_part('section-about'); ?>

		<?php endif; ?>

	<?php endwhile; ?>
	<!-- end of the loop -->

	<?php wp_reset_postdata(); ?>

<?php endif; ?>

</section>
<?php get_footer(); ?>