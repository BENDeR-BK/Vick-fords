<?php 
    $field = get_field_object('show__hide_section_projects');
    $show__hide_section_projects = $field['value'];
    if( $show__hide_section_projects ) {
        $field_services = get_field_object('show__hide_section_services');
        $show__hide_section_services = $field_services['value'];
        if( $show__hide_section_services ) { ?>
        <section class="our-projects" >
        <?php } else { ?>
            <section class="our-projects " style='padding-top: 70px'>
        <?php }?>
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <p class="section-subtitle"><?php echo the_field('sub_title_projects'); ?></p>
                        <h3 class="section-title"><?php echo the_field('title_projects'); ?></h3>
                    </div>
                    <div class="col-lg-8">
                        <div class="our-projects__descr companysmission__descr">
                            <?php echo the_field('text_projects'); ?>
                        </div>
                        <a href="<?php echo the_field('button_link_projects'); ?>" class="custombtn">
                            <span><?php echo the_field('button_text_projects'); ?></span>
                        </a>
                    </div>
                </div>
            
                <?php $slider_companysmission = get_field('slider_projects');
                    if ( $slider_companysmission) { ?>
                    <div class="companysmission__slider">
                        <div class="mainslider">
                            <?php while( have_rows('slider_projects') ) : the_row(); 
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
<?php } else { ?>
<div class="our-projects_hide"></div>  
<?php } ?>