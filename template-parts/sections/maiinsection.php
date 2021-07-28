<section class="maiinsection">
    <div class="maiinsection__pic">
        <video autoplay="" loop="" muted="">
            <source src="<?php echo the_field('video'); ?>" type="video/mp4">
        </video>
        <div class="maiinsection__textbox">
            <p class="subtitle"><?php echo the_field('sub-title_main'); ?></p>
            <h1>
                <?php echo the_field('title_main'); ?>
            </h1>
        </div>
        <a href="#compmiss" class="mousescroll">
            <svg width="20" height="35" viewBox="0 0 20 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                <rect x="0.5" y="0.5" width="19" height="34" rx="9.5" stroke="#D3AB75" />
                <line x1="10.5" y1="23" x2="10.5" y2="28" stroke="#D3AB75" />
            </svg>
        </a>
    </div>
</section>