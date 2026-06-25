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
				<section id="sweets" class="fixed_w_1000">
					<div class="sweets_introduction">
						<div class="sweets_introduction_img">
							<img src="https://kandawasai.com/wp-content/uploads/2023/09/IMG_0564.jpg" alt="和菓子紹介" />
						</div>
						<div class="sweets_introduction_txt">
							<h3>見た目で感じる四季折々の美しい和菓子</h3>
							<p>季節によって旬の素材を使うことはもちろん、目で季節を感じて楽しんでいただく和菓子。そろそろ桜の花が咲くころかな…という頃になると、桜をモチーフにした春らしいデザインの生菓子が並びます。夏になれば暑さをしのいでくれるような涼しげな和菓子、秋には紅葉の美しい色合いなどの和菓子、冬には雪の静けさや木漏れ日の暖かさを表現した和菓子が登場します。是非、四季折々にしか出会えない、様々な和菓子を見て感じ、味わっていただけますと幸いです。</p>
						</div>
					</div>
				</section>

				<section id="sweets_item" class="fixed_w_1000">
					<div class="fixed_ttl"><h2>季節の上生菓子</h2></div>
					<?php $seasonal_query = kandawasai_get_sweets_query( 'seasonal_namagashi' ); ?>
					<?php if ( $seasonal_query->have_posts() ) : ?>
						<ul class="sweets_item_flex">
							<?php while ( $seasonal_query->have_posts() ) : ?>
								<?php
								$seasonal_query->the_post();
								$image_url   = kandawasai_get_image_url( get_the_ID() );
								$description = kandawasai_get_sweet_description( get_the_ID() );
								?>
								<li>
									<div class="sweets_item_ttl"><h3><?php the_title(); ?></h3></div>
									<div class="sweets_item_img">
										<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" />
									</div>
									<p class="sweets_item_txt"><?php echo nl2br( esc_html( $description ) ); ?></p>
								</li>
							<?php endwhile; ?>
						</ul>
						<?php wp_reset_postdata(); ?>
					<?php else : ?>
						<p class="sweets-archive__empty">「表示セクション」を「季節の上生菓子」にした和菓子を追加するとここに表示されます。</p>
					<?php endif; ?>
				</section>

				<?php $standard_query = kandawasai_get_sweets_query( 'standard_wagashi' ); ?>
				<?php if ( $standard_query->have_posts() ) : ?>
					<section id="sweets_item_classic" class="fixed_w_1000">
						<div class="fixed_ttl"><h2>定番和菓子</h2></div>
						<ul class="sweets_item_classic_item">
							<?php while ( $standard_query->have_posts() ) : ?>
								<?php
								$standard_query->the_post();
								$image_url    = kandawasai_get_image_url( get_the_ID() );
								$description  = kandawasai_get_sweet_description( get_the_ID() );
								$sweet_price  = function_exists( 'get_field' ) ? get_field( 'sweet_price' ) : '';
								?>
								<li>
									<div class="sweets_item_classic_item_txtbox">
										<div class="sweets_item_classic_item_ttl"><h3><?php the_title(); ?></h3></div>
										<div class="sweets_item_classic_item_txt">
											<?php if ( '' !== $description ) : ?>
												<p><?php echo nl2br( esc_html( $description ) ); ?></p>
											<?php endif; ?>
											<?php if ( ! empty( $sweet_price ) ) : ?>
												<p><?php echo esc_html( $sweet_price ); ?></p>
											<?php endif; ?>
										</div>
									</div>
									<div class="sweets_item_classic_item_img">
										<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" />
									</div>
								</li>
							<?php endwhile; ?>
						</ul>
						<?php wp_reset_postdata(); ?>
					</section>
				<?php endif; ?>

				<?php $seasonal_wagashi_query = kandawasai_get_sweets_query( 'seasonal_wagashi' ); ?>
				<?php if ( $seasonal_wagashi_query->have_posts() ) : ?>
					<section id="sweets_item_seasonal" class="fixed_w_1000">
						<div class="fixed_ttl"><h2>季節の和菓子</h2></div>
						<ul class="sweets_item_classic_item">
							<?php while ( $seasonal_wagashi_query->have_posts() ) : ?>
								<?php
								$seasonal_wagashi_query->the_post();
								$image_url    = kandawasai_get_image_url( get_the_ID() );
								$description  = kandawasai_get_sweet_description( get_the_ID() );
								$sweet_price  = function_exists( 'get_field' ) ? get_field( 'sweet_price' ) : '';
								?>
								<li>
									<div class="sweets_item_classic_item_txtbox">
										<div class="sweets_item_classic_item_ttl"><h3><?php the_title(); ?></h3></div>
										<div class="sweets_item_classic_item_txt">
											<?php if ( '' !== $description ) : ?>
												<p><?php echo nl2br( esc_html( $description ) ); ?></p>
											<?php endif; ?>
											<?php if ( ! empty( $sweet_price ) ) : ?>
												<p><?php echo esc_html( $sweet_price ); ?></p>
											<?php endif; ?>
										</div>
									</div>
									<div class="sweets_item_classic_item_img">
										<img src="<?php echo esc_url( $image_url ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" />
									</div>
								</li>
							<?php endwhile; ?>
						</ul>
						<?php wp_reset_postdata(); ?>
					</section>
				<?php endif; ?>
				<?php kandawasai_render_contact_box(); ?>
			</div>
		</div>
	</article>
</main>
<?php kandawasai_render_site_footer(); ?>
<?php wp_footer(); ?>
</body>
</html>
