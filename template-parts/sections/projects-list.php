<section class="projectslists">

    <?php
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $showposts = get_option('posts_per_page');

        $args = array(
            'post_type'=>'projects', // Your post type name
            'paged' => $paged,
        );
        if ( $paged == 1 ) {
            $i = 1;
        } elseif ( $paged == 2 )  {
            $i = $showposts+1;
        }else {
            $i = $showposts * $paged - $showposts+1;
        }
        $loop = new WP_Query( $args );
        if ( $loop->have_posts() ) {
            while ( $loop->have_posts() ) : $loop->the_post(); ?>

                <div class="aboutus-infobox">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="aboutus-infobox__textblock">
                                    <p class="subtitle"><?php echo ($i < 10 ) ? "0" : " ";?><?php echo $i; ++$i;?></p>
                                    <p class="title"><?php the_title() ?></p>
                                    <div class="descr">
                                        <p>
                                            <?php the_field('text_project_card', $post->ID);?>
                                        </p>
                                    </div>
                                    <div class="flalign">
                                        <a class="custombtn" href="<?php the_permalink() ?>">More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $thumbnail = get_field('project_image', $post->ID);?>
                    <img class="aboutus-infobox__pic" src="<?php echo $thumbnail['url']; ?>" alt="image">
                </div>

          <?php  endwhile;

            $total_pages = $loop->max_num_pages;

            if ($total_pages > 1){

                $current_page = max(1, get_query_var('paged'));


                ?> 
                 <div class="custpagination">

                    <?php

                        cpt_pagination($loop->max_num_pages); 

                    ?>
                </div>
            <?php }    
        }
        wp_reset_postdata();
        ?>
</section>