<?php 
    $field = get_field_object('show__hide_section');
    $sectionOn = $field['value'];
    if( $sectionOn ) { ?>
    <section class="benefits">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <p class="section-subtitle"><?php echo the_field('sub_title_benefits'); ?></p>
                    <h3 class="section-title"><?php echo the_field('title_benefits'); ?></h3>
                    <div class="benefits__description">
                        <?php echo the_field('text_benefits'); ?>
                    </div>
                    <a href="<?php echo the_field('button_link_benefits'); ?>" class="custombtn">
                        <?php echo the_field('button_text_benefits'); ?>
                    </a>
                </div>
                <div class="col-lg-7">
                    <div class="benefitsicsect">
                        <?php while( have_rows('benefits_item') ) : the_row(); 
                            $image = get_sub_field('icon');
                            $title = get_sub_field('title');
                            $text = get_sub_field('text');
                            $url = $image['url']; ?>
                            
                            <div class="benefit__info">
                                <div class="picbox">
                                    <img src="<?php echo $url; ?>" alt="icon">
                                </div>
                                <div class="descrbox">
                                    <p class="title"><?php echo $title; ?></p>
                                    <p class="descr">
                                        <?php echo $text; ?>
                                    </p>
                                </div>
                            </div>
                        <?php endwhile;?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } else { ?>
<div class="benefits_hide"></div>  
<?php } ?>