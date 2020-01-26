<div class="wpsisac-image-slide">
	<div class="wpsisac-slide-wrap" <?php echo $slider_height_css ; ?>>		
		<img src="<?php echo esc_url($slider_img); ?>" alt="<?php the_title(); ?>" />
		<div class="wpsisac-slider-overlay">
			<div class="wpsisac-slider-content">
				<h2 class="wpsisac-slide-title"><?php the_title(); ?></h2>
				<?php if($show_content) { ?>
					<div class="wpsisac-slider-short-content">
						<?php the_content(); ?>			
					</div>
				<?php }								
				$sliderurl = get_post_meta( get_the_ID(),'wpsisac_slide_link', true );
				if($sliderurl != '') { ?>
				<div class="wpsisac-readmore"><a href="<?php echo esc_url($sliderurl); ?>" class="wpsisac-slider-readmore"><?php esc_html_e( 'Read More', 'wp-slick-slider-and-image-carousel' ); ?></a></div>
				<?php } ?>
			</div>
		</div>
	</div>
</div>