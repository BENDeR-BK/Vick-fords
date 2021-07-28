<section class="services-list">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <?php $serviceCount = 1; while( have_rows('services_list', 'options') ) : the_row(); 
                    $image = get_sub_field('image');
                    $url = $image['url']; 
                    $title = get_sub_field('title');
                    $text = get_sub_field('text');
                    $text_full = get_sub_field('text_full');

                    ?>
                    <div class="service__box" id='service-<?php echo $serviceCount; ++$serviceCount;?>'>
                        <div class="service__pic">
                            <img src="<?php echo $url; ?>" alt="img">
                        </div>
                        <div class="service__descr">
                            <p class="title"><?php echo $title; ?></p>
                            <div class="descr">
                                <?php echo $text_full; ?>
                            </div>
                        </div>
                    </div>
                <?php endwhile;?>
            </div>
        </div>
    </div>
</section>