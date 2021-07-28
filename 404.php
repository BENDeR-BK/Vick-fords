<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package vick_fords
 */

get_header(); ?>
	<section class="mission-fscreen error">
		<img src="<?php echo SD_THEME_IMAGE_URI; ?>/errorbg.png" alt="img">
		<div class="missionfscr__wrap">
			<div class="missionfscr-container">
				<div class="missionfscrwrap">
					<h1><?php _e('Page is not found', 'vick_fords'); ?></h1>
					<div class="descr">
						<p>
							<?php _e('While we`re fixing this error, you can return to the home page.', 'vick_fords'); ?>
						</p>
					</div>
					<a href="<?php echo site_url();?>" class="custombtn"><?php _e('TO THE HOME PAGE', 'vick_fords'); ?></a>
				</div>
			</div>
		</div>
	</section>
	
<?php get_footer();
