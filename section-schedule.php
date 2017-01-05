<section class="schedule" id="times">

	<?php the_title('<h1>','</h1>'); ?>

	<p class="disclaimer"><?php echo get_post_meta(get_the_ID(), 'disclaimer')[0]; ?></p>
	<div class="tour">
		<div class="times-container">
			<?php
			// vars	
			$times = get_field('tour_times');
			// check
			if( $times ): ?>
				<?php foreach( $times as $time ): ?>
					<span><?php echo $time; ?></span>
				<?php endforeach; ?>
			<?php endif; ?>
		</div>
	</div>
	
	<h2><?php echo get_post_meta(get_the_ID(), 'subhead')[0]; ?></h2>
	<table class="return">
		<tbody>
			<tr>
				<?php
				// vars	
				$times = get_field('return_times');
				// check
				if( $times ): ?>
					<?php foreach( $times as $time ): ?>
						<td><span><?php echo $time; ?></span></td>
					<?php endforeach; ?>
				<?php endif; ?>
			</tr>
		</tbody>
	</table>

</section>