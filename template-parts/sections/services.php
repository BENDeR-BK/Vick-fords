<?php 
    $field = get_field_object('show__hide_section_services');
    $show__hide_section_services = $field['value'];
    if( $show__hide_section_services ) { 

    $show__hide_section_projects = get_field_object('show__hide_section_projects');
    $show__hide_section_services = $show__hide_section_projects['value'];
    if( $show__hide_section_services ) { ?>
    <section class="services" >
    <?php } else { ?>
        <section class="services " style='margin-bottom: 90px'>
    <?php }?>
        <div class="services__container">
            <div class="row">
                <div class="col-lg-4">
                    <p class="section-subtitle"><?php echo the_field('sub_title_services'); ?></p>
                    <h3 class="section-title"><?php echo the_field('title_services'); ?></h3>
                </div>
                <div class="col-lg-8">
                    <div class="companysmission__descr">
                        <?php echo the_field('text_services'); ?>
                    </div>
                    <a href="<?php echo the_field('button_link_services'); ?>" class="custombtn">
                        <?php echo the_field('button_text_services'); ?>
                    </a>
                </div>
            </div>
            <div class="scroll-slider">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="scrollbar">
                            <div class="handle">
                                <div class="mousearea"></div>
                            </div>
                        </div>
                        <div class="frame" id="basic">
                            <ul class="clearfix">
                                <?php  $serviceCount = 1; while( have_rows('services_list', 'options') ) : the_row(); 
                                    $image = get_sub_field('image');
                                    $title = get_sub_field('title');
                                    $text = get_sub_field('text');
                                    $link = get_sub_field('link');
                                    $url = $image['url']; 
                                
                                    ?>
                                    
                                    
                                    <li>
                                        <div class="scrslidebox">
                                            <div class="front">
                                                <div class="scrslidebox__pic">
                                                    <img src="<?php echo $url; ?>" alt="slide">
                                                </div>
                                                <div class="scrslidebox__text">
                                                    <p><?php echo $title; ?></p>
                                                </div>
                                            </div>
                                            <div class="back">
                                                <p class="title"><?php echo $title; ?></p>
                                                <div class="descr">
                                                    <p>
                                                        <?php echo $text; ?>
                                                    </p>
                                                </div>
                                                <a href="<?php echo $link; ?>#service-<?php echo $serviceCount; ++$serviceCount;?>" class="custombtn">
                                                    <?php _e('More', 'vick_fords') ?>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                <?php  endwhile;?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } else { ?>
<div class="services_hide"></div>  
<?php } ?>