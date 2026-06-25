<?php
/**
 * Single template for sweets CPT.
 *
 * @package Kandawasai_Sweets_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'single-sweets page-main' ); ?>>
<?php wp_body_open(); ?>
<?php kandawasai_render_site_header(); ?>

<main id="site-content" class="page-main">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : ?>
			<?php
			the_post();
			$sweet_price  = function_exists( 'get_field' ) ? get_field( 'sweet_price' ) : '';
			$sweet_season = function_exists( 'get_field' ) ? get_field( 'sweet_season' ) : '';
			$image_url    = kandawasai_get_image_url( get_the_ID() );
			?>
			<article <?php post_class( 'page-article' ); ?>>
				<?php kandawasai_render_page_title( get_the_title() ); ?>
				<div class="post-inner thin">
					<div class="entry-content single-sweets__content">
						<p class="single-sweets__image"><img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>"></p>

						<?php if ( $sweet_season || $sweet_price ) : ?>
							<p class="single-sweets__meta">
								<?php if ( $sweet_season ) : ?>
									<span><?php echo esc_html( $sweet_season ); ?></span>
								<?php endif; ?>
								<?php if ( $sweet_price ) : ?>
									<span><?php echo esc_html( $sweet_price ); ?></span>
								<?php endif; ?>
							</p>
						<?php endif; ?>

						<div class="single-sweets__body">
							<?php the_content(); ?>
						</div>
						<?php kandawasai_render_contact_box(); ?>
					</div>
				</div>
			</article>
		<?php endwhile; ?>
	<?php endif; ?>
</main>

<?php kandawasai_render_site_footer(); ?>
<?php wp_footer(); ?>
</body>
</html>
