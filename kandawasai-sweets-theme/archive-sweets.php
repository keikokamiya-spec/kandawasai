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
	<meta name="format-detection" content="telephone=no">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'archive-sweets page-main' ); ?>>
<?php wp_body_open(); ?>
<?php kandawasai_render_site_header(); ?>
<main id="site-content" class="page-main">
	<article class="page-article">
		<?php kandawasai_render_page_title( '和菓子紹介' ); ?>
		<div class="post-inner thin">
			<div class="entry-content">
				<div class="team-2-box_inner_flex">
					<div class="team-2-box_inner_02">
						<?php if ( have_posts() ) : ?>
							<?php while ( have_posts() ) : ?>
								<?php
								the_post();

								$sweet_price  = function_exists( 'get_field' ) ? get_field( 'sweet_price' ) : '';
								$sweet_season = function_exists( 'get_field' ) ? get_field( 'sweet_season' ) : '';
								$image_url    = kandawasai_get_image_url( get_the_ID() );
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
							<div class="pnavi"><?php the_posts_pagination(); ?></div>
						<?php else : ?>
							<p class="sweets-archive__empty">和菓子データはまだ登録されていません。</p>
						<?php endif; ?>
					</div>
				</div>
				<?php kandawasai_render_contact_box(); ?>
			</div>
		</div>
	</article>
</main>
<?php kandawasai_render_site_footer(); ?>
<?php wp_footer(); ?>
</body>
</html>
