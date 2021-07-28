<section class="aboutus-fscreen">
    <div class="container">
        <p class="subtitle"><span><?php echo the_field('sub_title_who_we_are'); ?></span></p>
        <h1> <?php echo the_field('title_who_we_are'); ?></h1>
        <?php $slider_who_we_are = get_field('slider_who_we_are');
            if ( $slider_who_we_are) { ?>
            <div class="companysmission__slider">
                <div class="mainslider">
                    <?php while( have_rows('slider_who_we_are') ) : the_row(); 
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