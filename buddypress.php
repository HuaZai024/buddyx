<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package buddyx
 */

namespace BuddyX\Buddyx;

get_header();

buddyx()->print_styles( 'buddyx-content' );
buddyx()->print_styles( 'buddyx-sidebar', 'buddyx-widgets' );

?>
	<?php do_action( 'buddyx_sub_header' ); ?>

	<?php do_action( 'buddy_before_content' ); ?>

	<?php if ( ! bp_is_user() && ! bp_is_group_single() && ! bp_is_group_create() && get_theme_mod( 'buddypress_sidebar_option' ) == 'left' || ! bp_is_user() && ! bp_is_group_single() && ! bp_is_group_create() && get_theme_mod( 'buddypress_sidebar_option' ) == 'both'  ) : ?>
		<aside id="secondary" class="left-sidebar widget-area">
			<div class="sticky-sidebar">
				<?php buddyx()->display_buddypress_left_sidebar(); ?>
			</div>
		</aside>
	<?php endif; ?>
	<main id="primary" class="site-main">
	
		<?php
		if ( have_posts() ) {

			//get_template_part( 'template-parts/content/page_header' );

			while ( have_posts() ) {
				the_post();

				get_template_part( 'template-parts/content-buddypress' );
			}

			if ( ! is_singular() ) {
				get_template_part( 'template-parts/content/pagination' );
			}
		} else {
			get_template_part( 'template-parts/content/error' );
		}
		?>
		
	</main><!-- #primary -->
	<?php if ( ! bp_is_user() && ! bp_is_group_single() && ! bp_is_group_create() && get_theme_mod( 'buddypress_sidebar_option' ) == 'right' || ! bp_is_user() && ! bp_is_group_single() && ! bp_is_group_create() && get_theme_mod( 'buddypress_sidebar_option' ) == 'both' ) : ?>
		<aside id="secondary" class="primary-sidebar widget-area">
			<div class="sticky-sidebar">
				<?php buddyx()->display_buddypress_right_sidebar(); ?>
			</div>
		</aside>
	<?php endif; ?>

	<?php do_action( 'buddy_after_content' ); ?>
<?php
get_footer();