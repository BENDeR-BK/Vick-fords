
<?php 
 get_header();?>
  
<section class="projectsfscr">
    <div class="container">
        <p class="subtitle"><span>WORK WITH THE BEST111</span></p>
        <h1>Our Projects</h1>
    </div>
</section>
<section class="projectslists">
    <?php			
       $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

       $showposts = get_option('posts_per_page');

       
       if ( $paged == 1 ) {
           $i = 1;
       } elseif ( $paged == 2 )  {
           $i = $showposts+1;
       }else {
           $i = $showposts * $paged - $showposts+1;
       }
        if(have_posts() ):  while( have_posts() ): the_post(); ?>
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
            <?php endwhile; ?>
        
    
    <div class="custpagination">
        <?php ch_pagination(); ?>
    </div>
    <?php endif; wp_reset_postdata();?>
</section>
          
<?php  get_template_part( 'template-parts/sections/contact-us' );
  
?>

<?php get_footer(); ?>