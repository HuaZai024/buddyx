<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package buddyx
 */

namespace BuddyX\Buddyx;

get_header();

buddyx()->print_styles( 'buddyx-content' );

?>
	<?php do_action( 'buddyx_before_content' ); ?>

	<main id="primary" class="site-main">
		<?php get_template_part( 'template-parts/content/error', '404' ); ?>
	</main><!-- #primary -->
	
	<?php do_action( 'buddyx_after_content' ); ?>
<?php
get_footer();
