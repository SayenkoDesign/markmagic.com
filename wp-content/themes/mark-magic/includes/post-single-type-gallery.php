<?php get_template_part( 'includes/post-single-header' ) ?>

	<?php
		$gallery = om_get_custom_gallery(
			get_the_ID(),
			array(
				'image_size' => 'post-media-large',
				'show_captions' => (get_post_meta(get_the_ID(), OM_THEME_SHORT_PREFIX.'gallery_captions', true) == 'true'),
				'mode' => get_post_meta(get_the_ID(), OM_THEME_SHORT_PREFIX.'gallery_mode', true),
			)
		);
		if($gallery) { ?>
		<div class="post-media">
			<?php echo om_esc_sg($gallery) ?>
		</div>
	<?php } ?>

<?php get_template_part( 'includes/post-single-footer' ) ?>