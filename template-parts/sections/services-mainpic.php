<section class="servicesmainpic">
    <?php 
        $image = get_field('image_our_services');
        $url = $image['url']; 
    ?>
    <img src="<?php echo $url; ?>" alt="img">
    <div class="servicesmainpic__wrap">
        <div class="servicesmainpic__container">
            <div class="missionfscrwrap">
                <p class="subtitle-center"><span><?php echo the_field('sub_title_our_services'); ?></span></p>
                <h1><?php echo the_field('title_our_services'); ?></h1>
                <div class="descr">
                    <?php echo the_field('text_our_services'); ?>
                </div>
            </div>
        </div>
    </div>
</section>