<section class="companysmission" id="compmiss">
    <div class="companysmission-container">
        <div class="row">
            <div class="col-lg-4">
                <p class="section-subtitle"><?php echo the_field('sub-title_companysmission'); ?></p>
                <h3 class="section-title"><?php echo the_field('title_companysmission'); ?></h3>
            </div>
            <div class="col-lg-8">
                <div class="companysmission__descr">
                    <?php echo the_field('text_companysmission'); ?>
                   
                </div>
                <a href="<?php echo the_field('button_link_companysmission'); ?>" class="custombtn">
                    <span><?php echo the_field('button_text_companysmission'); ?></span>
                </a>
            </div>
        </div>
        <?php $slider_companysmission = get_field('slider_companysmission');
            if ( $slider_companysmission) { ?>
            <div class="companysmission__slider">
                <div class="mainslider">
                    <?php while( have_rows('slider_companysmission') ) : the_row(); 
                        $image = get_sub_field('add_slide');
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