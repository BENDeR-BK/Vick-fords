<section class="moredetails">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <p class="section-subtitle"><?php echo the_field('sub_title_details'); ?></p>
                <h3 class="section-title"><?php echo the_field('title_details'); ?></h3>
            </div>
            <div class="col-lg-8">
                <div class="our-projects__descr companysmission__descr">
                    <?php echo the_field('text_details'); ?>
                </div>
            </div>
        </div>
        
        <?php $slider_details = get_field('slider_details');
            if ( $slider_details) { ?>
            <div class="companysmission__slider">
                <div class="mainslider">
                    <?php while( have_rows('slider_details') ) : the_row(); 
                        $image = get_sub_field('image');
                        $url = $image['url']; ?>
                        <div>
                            <div class="mainslider__slide">
                                <img src="<?php echo $url; ?>" alt="slide">
                            </div>
                        </div>
                    <?php endwhile;?>
                </div>
                <div class="pagingInfo"></div>
            </div>
        <?php } ?>
    </div>
</section>