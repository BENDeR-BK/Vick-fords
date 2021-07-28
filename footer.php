<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vick_fords
 */
?>
</main>
<footer class="footer">
    <div class="footer__container">
        <div class="footer__topsect">
            <div class="row no-gutters align-items-center justify-content-between">
                <a href="<?php echo site_url();?>" class="footer__logo">
                    <img src="<?php echo SD_THEME_IMAGE_URI; ?>/logo-footer.svg" alt="logo">
                </a>
                <nav>
                    <?php
						if( has_nav_menu( 'footer_menu' ) ) {
							wp_nav_menu(array(
								'menu' => 'footer_menu',
								// 'menu_class' => 'main-menu',
								'theme_location' => 'footer_menu',
								'container' => 'ul',
							));
						}						
					?>	
                </nav>
                <a href="<?php echo get_field('button_link_footer','options') ?>" class="custombtn scroll_contact">
                    <?php echo get_field('button_text_footer','options') ?>
                </a>
            </div>
        </div>
    </div>
    <div class="footer__bottline">
        <p><?php echo get_field('copyright_text','options') ?></p>
    </div>

    <div class="upbtn custombtn">
        <?php _e('up', 'vick_fords') ?>
    </div>
</footer>
<div class="cookies-section">
    
    <div class="close-cookies">
        <img src="<?php echo SD_THEME_IMAGE_URI; ?>/icons/close.svg" alt="">
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-12">
                <div class="cookies-section__wrapper">
                    <div class="descrwrap">
                        <p><?php echo get_field('privacy_policy__text','options') ?></p>
                    </div>
                    <a href="<?php echo get_field('privacy_policy__link','options') ?>" class="cookies__more"><?php _e('READ MORE', 'sushi') ?></a>
                    <div class="btnwrap">
                    
                        <a href="#" class="custombtn cookies__ok"><?php _e('GOT IT', 'vick_fords') ?></a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
   
</div>

<!-- Modal -->
<div class="modal fade" id="tymodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <img src="<?php echo SD_THEME_IMAGE_URI; ?>/icons/close.svg" alt="close">
            </button>
            <div class="modal-body">
                <p class="title">Thank you!</p>
                <div class="descr">
                    <p>Message was sent.</p>
                </div>
                <a href="<?php echo site_url();?>" class="custombtn">TO THE HOME PAGE</a>
            </div>

        </div>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>
