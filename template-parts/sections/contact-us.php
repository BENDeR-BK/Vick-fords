
<?php 
if ( is_page_template('page-front.php') ) {
    $add_class = '';
} else {
    $add_class = 'mt0';
}
?>

<section class="contact-us <?php echo $add_class;?>" id='contact-us'>
    <div class="contactus__container">
        <div class="row">
            <div class="col-lg-4">
                <p class="section-subtitle"><?php echo get_field('sub_title_contact','options') ?></p>
                <h3 class="section-title"><?php echo get_field('title_contact','options') ?></h3>
                <img class="mailpic" src="<?php echo SD_THEME_IMAGE_URI; ?>/mailpic.png" alt="mail pic">
            </div>
            <div class="col-lg-6">
                <div class="conform">
                    <?php echo do_shortcode( '[contact-form-7 id="77" title="Contact us"]' ); ?>
                </div>
                
            </div>
        </div>
    </div>
</section>