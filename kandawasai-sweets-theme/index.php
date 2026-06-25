<?php
/**
 * Fallback template.
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
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<main class="sweets-archive">
	<h1 class="sweets-archive__title"><?php bloginfo( 'name' ); ?></h1>
	<?php if ( have_posts() ) : ?>
		<?php while ( have_posts() ) : ?>
			<?php the_post(); ?>
			<article <?php post_class(); ?>>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div><?php the_excerpt(); ?></div>
			</article>
		<?php endwhile; ?>
	<?php else : ?>
		<p class="sweets-archive__empty">投稿がありません。</p>
	<?php endif; ?>
</main>
<?php wp_footer(); ?>
</body>
</html>
