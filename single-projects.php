<?php 
    get_header();
?>
    <?php  while ( have_posts() ) : the_post(); ?>
        <section class="mission-fscreen openpr">
            <?php $thumbnail = get_field('project_image', $post->ID);?>
            <img src="<?php echo $thumbnail['url']; ?>" alt="img">
            <div class="missionfscr__wrap">
                <div class="missionfscr-container">
                    <div class="breadcrumbs">
                        <?php
                            if(function_exists('bcn_display')) {
                                bcn_display();
                            }
                        ?>
                        
                    </div>
                    <div class="missionfscrwrap">
                        <h1><?php the_title() ?></h1>
                        <div class="descr">
                            <?php the_field('description', $post->ID);?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="moredetails">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <p class="section-subtitle"><?php _e('DETAILS', 'vick_fords') ?></p>
                        <h3 class="section-title"><?php the_field('title_details');?></h3>
                    </div>
                    <div class="col-lg-8">
                        <div class="our-projects__descr companysmission__descr">
                            <?php the_field('text_details');?>
                            
                        </div>
                    </div>
                </div>

                <div class="companysmission__slider">
                    <div class="mainslider">
                        <?php while( have_rows('slider_project') ) : the_row(); 
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
                <div class="aftsldescr">
                    <?php the_field('content_text');?>
                </div>
            </div>
        </section>
    <?php endwhile;?>
<?php
    
    
    get_template_part( 'template-parts/sections/contact-us' );

?>

<?php get_footer(); ?>