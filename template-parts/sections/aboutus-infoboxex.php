<section class="aboutus-infoboxex">
    <?php while( have_rows('info_box') ) : the_row(); 
        $image = get_sub_field('image');
        $title = get_sub_field('title');
        $sub_title = get_sub_field('sub-title');
        $text = get_sub_field('text');
        $url = $image['url']; ?>
        
        <div class="aboutus-infobox">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="aboutus-infobox__textblock">
                            <p class="subtitle"><?php echo $sub_title; ?></p>
                            <p class="title"><?php echo $title; ?></p>
                            <div class="descr">
                                <?php echo $text; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <img class="aboutus-infobox__pic" src="<?php echo $url; ?>" alt="img">
        </div>
    <?php endwhile;?>
    
</section>