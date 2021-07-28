<?php
/**
 * Pagination layout.
 *
 * @package vick_fords
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! function_exists( 'ch_pagination' ) ) {
	function ch_pagination( $args = array(), $class = 'lt-pagination' ) {

		if ( $GLOBALS['wp_query']->max_num_pages <= 1 ) {
			return;
		}
		$args = wp_parse_args(
			$args,
			array(
				'mid_size'           => 1,
				'prev_next'          => true,
				'prev_text'          => __( '<', 'vick_fords' ),
				'next_text'          => __( '>', 'vick_fords' ),
				'screen_reader_text' => __( 'Posts navigation', 'vick_fords' ),
				'type'               => 'array',
				'current'            => max( 1, get_query_var( 'paged' ) ),
			)
		);
		
		$links = paginate_links( $args );
		?>
		<nav class="<?php echo esc_attr($class); ?>" aria-label="<?php echo $args['screen_reader_text']; ?>">
			<ul class="lt-pagination__list">
				<?php
				foreach ( $links as $key => $link ) {
					$classes = ['lt-pagination__item'];
					if( strpos( $link, 'current' ) ) {
						$classes[] = 'active';
					}
					if( strpos( $link, 'next' ) ) {
						$classes[] = 'lt-pagination__item--next';
					}
					if( strpos( $link, 'prev' ) ) {
						$classes[] = 'lt-pagination__item--prev';
					}
					?>
					<li class="<?php echo implode($classes, ' '); ?>">
						<?php echo str_replace( 'page-numbers', 'lt-pagination__link', $link ); ?>
					</li>
					<?php
				}
				?>
			</ul>
		</nav>
		<?php
	}
}



//  Custom post type pagination function 
	
function cpt_pagination($pages = '', $range = 1){

	$showitems = ($range * 2)+1;
	
	global $paged;
	if(empty($paged)) $paged = 1;
	if($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages){
			$pages = 1;
		}
	} 

	if(1 != $pages) {
		echo "<nav aria-label='Page navigation example'>  <ul class='pagination'>";
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li class=\" lt-pagination__item\"><a href='".get_pagenum_link(1)."'>1</a></li>";
		if($paged > 3 && $showitems < $pages) echo "<li class=\" lt-pagination__item \">...</li>";
		for ($i=1; $i <= $pages; $i++) {
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
				echo ($paged == $i)? "<li class=\" lt-pagination__item active\"><a class='lt-pagination__link'>".$i."</a></li>":"<li class='lt-pagination__item'> <a href='".get_pagenum_link($i)."' class=\"lt-pagination__link\">".$i."</a></li>";
			}
		}
		if ($paged < $pages - 2 ) echo " <li class='page-item lt-pagination__item'>...</li>";
		if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo " <li class='li'><a class='a' href='".get_pagenum_link($pages)."'><i class='flaticon flaticon-arrow'></i>".$pages ."</a></li>";
		echo "</ul></nav>\n";
	}
}




?>
