<?php
/**
 * Archive template for sweets CPT.
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
<body <?php body_class( 'archive-sweets' ); ?>>
<?php wp_body_open(); ?>

<main class="sweets-archive">
	<h1 class="sweets-archive__title"><?php post_type_archive_title(); ?></h1>

	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : ?>
			<?php
			the_post();

			$sweet_price  = get_field( 'sweet_price' );
			$sweet_season = get_field( 'sweet_season' );
			$acf_image    = get_field( 'sweet_image' );
			$image_url    = '';

			if ( has_post_thumbnail() ) {
				$image_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
			} elseif ( ! empty( $acf_image ) ) {
				$image_url = $acf_image;
			} else {
				$image_url = get_template_directory_uri() . '/assets/images/no-image.jpg';
			}
			?>
			<div class="team-2-box">
				<a class="team_flex" href="<?php echo esc_url( get_permalink() ? get_permalink() : '#' ); ?>">
					<div class="team-2-pic">
						<img
							src="<?php echo esc_url( $image_url ); ?>"
							class="attachment-index_thumbnail size-index_thumbnail wp-post-image"
							alt="<?php echo esc_attr( get_the_title() ); ?>"
						/>
					</div>
					<div class="team_flex_ttl">
						<div class="team-2-pic_dateTime">
							<p>
								<?php echo esc_html( get_the_date( 'Y年n月j日' ) ); ?>
								<?php if ( ! empty( $sweet_price ) ) : ?>
									<span><?php echo esc_html( $sweet_price ); ?></span>
								<?php endif; ?>
							</p>
						</div>
						<div class="team-2-content">
							<h5>
								<?php if ( ! empty( $sweet_season ) ) : ?>
									<?php echo esc_html( $sweet_season ); ?>
									<?php echo esc_html( ' ' ); ?>
								<?php endif; ?>
								<?php the_title(); ?>
							</h5>
						</div>
					</div>
				</a>
			</div>
		<?php endwhile; ?>
		<?php the_posts_pagination(); ?>
	<?php else : ?>
		<p class="sweets-archive__empty">和菓子データはまだ登録されていません。</p>
	<?php endif; ?>
</main>

<?php wp_footer(); ?>
</body>
</html>
