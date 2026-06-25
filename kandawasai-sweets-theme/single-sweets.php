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
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'single-sweets' ); ?>>
<?php wp_body_open(); ?>

<main class="sweets-archive">
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : ?>
			<?php
			the_post();
			$sweet_price  = get_field( 'sweet_price' );
			$sweet_season = get_field( 'sweet_season' );
			$acf_image    = get_field( 'sweet_image' );
			$image_url    = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_ID(), 'large' ) : $acf_image;
			?>
			<article <?php post_class(); ?>>
				<h1 class="sweets-archive__title"><?php the_title(); ?></h1>

				<?php if ( ! empty( $image_url ) ) : ?>
					<p><img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>"></p>
				<?php endif; ?>

				<?php if ( $sweet_season || $sweet_price ) : ?>
					<p>
						<?php if ( $sweet_season ) : ?>
							<span><?php echo esc_html( $sweet_season ); ?></span>
						<?php endif; ?>
						<?php if ( $sweet_price ) : ?>
							<span><?php echo esc_html( $sweet_price ); ?></span>
						<?php endif; ?>
					</p>
				<?php endif; ?>

				<div>
					<?php the_content(); ?>
				</div>
			</article>
		<?php endwhile; ?>
	<?php endif; ?>
</main>

<?php wp_footer(); ?>
</body>
</html>
