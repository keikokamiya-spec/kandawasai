<?php
/**
 * Sweets loop example for a WordPress theme.
 *
 * 想定:
 * - カスタム投稿タイプ: sweets
 * - ACF:
 *   - sweet_image  (画像URL)
 *   - sweet_price  (テキスト)
 *   - sweet_season (テキスト)
 *
 * 使い方例:
 * template-parts や archive-sweets.php に貼り付けて使ってください。
 */

$sweets_query = new WP_Query(
	array(
		'post_type'      => 'sweets',
		'posts_per_page' => -1,
		'post_status'    => 'publish',
		'orderby'        => 'date',
		'order'          => 'DESC',
	)
);
?>

<?php if ( $sweets_query->have_posts() ) : ?>
	<?php while ( $sweets_query->have_posts() ) : ?>
		<?php
		$sweets_query->the_post();

		$sweet_price  = get_field( 'sweet_price' );
		$sweet_season = get_field( 'sweet_season' );
		$acf_image    = get_field( 'sweet_image' );
		$image_url    = '';

		if ( has_post_thumbnail() ) {
			$image_url = get_the_post_thumbnail_url( get_the_ID(), 'large' );
		} elseif ( ! empty( $acf_image ) ) {
			$image_url = $acf_image;
		}

		if ( empty( $image_url ) ) {
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
	<?php wp_reset_postdata(); ?>
<?php else : ?>
	<p>和菓子データはまだ登録されていません。</p>
<?php endif; ?>
