<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package vick_fords
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header class="header">
        <div class="container">
            <div class="header__contentwrap">
                <div class="header__leftmenu">
					<?php
						if( has_nav_menu( 'main_menu_left' ) ) {
							wp_nav_menu(array(
								'menu' => 'main_menu_left',
								// 'menu_class' => 'main-menu',
								'theme_location' => 'main_menu_left',
								'container' => 'ul',
							));
						}						
					?>
                    
                </div>
                <div class="header__logo">
                    <a href="<?php echo site_url();?>">
                        <img src="<?php echo SD_THEME_IMAGE_URI; ?>/logo.svg" alt="logo">
                    </a>
                </div>
                <div class="header__rightmenu">
					<?php
						if( has_nav_menu( 'main_menu_right' ) ) {
							wp_nav_menu(array(
								'menu' => 'main_menu_right',
								// 'menu_class' => 'main-menu',
								'theme_location' => 'main_menu_right',
								'container' => 'ul',
							));
						}						
					?>	
                </div>
                <a href="<?php echo get_field('button_link_header','options') ?>" class="header__contactlink scroll_contact">
					<?php echo get_field('button_text_header','options') ?>
				</a>
            </div>
            <div class="burgerbtn">
                <img src="<?php echo SD_THEME_IMAGE_URI; ?>/icons/burger.svg" alt="menu">
            </div>
        </div>
        <div class="mobilemenu">
            <button class="mobilemenu__close">
                <img src="<?php echo SD_THEME_IMAGE_URI; ?>/icons/close.svg" alt="close">
            </button>
            <div class="mobilemenu__wrap">
                <div class="flexalcenter">
					<?php
						if( has_nav_menu( 'mobile_menu' ) ) {
							wp_nav_menu(array(
								'menu' => 'mobile_menu',
								// 'menu_class' => 'main-menu',
								'theme_location' => 'mobile_menu',
								'container' => 'ul',
							));
						}						
					?>	
                    <a href="<?php echo get_field('button_link_header','options') ?>" class="mobcontbtn scroll_contact">
						<?php echo get_field('button_text_header','options') ?>
                    </a>
                </div>
            </div>
        </div>
    </header>
	<main class="vf-main">
