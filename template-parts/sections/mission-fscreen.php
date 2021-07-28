<section class="mission-fscreen">
    <?php
        $image = get_field('image_mission');
        $url = $image['url']; 
    ?>
    <img src="<?php echo $url; ?>" alt="img">
    <div class="missionfscr__wrap">
        <div class="missionfscr-container">
            <div class="missionfscrwrap">
                <p class="subtitle-center"><span><?php echo the_field('sub_title_mission'); ?></span></p>
                <h1><?php echo the_field('title_mission'); ?></h1>
                <div class="descr">
                    <?php echo the_field('text_mission'); ?>
                </div>
            </div>
        </div>
    </div>
</section>