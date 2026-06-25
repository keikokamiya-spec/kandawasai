<?php
/**
 * Theme setup for Kandawasai Sweets Theme.
 *
 * @package Kandawasai_Sweets_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function kandawasai_sweets_theme_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption', 'style', 'script' ) );
}
add_action( 'after_setup_theme', 'kandawasai_sweets_theme_setup' );

/**
 * Register custom post type: sweets.
 * Remove this if the site already registers the same CPT elsewhere.
 */
function kandawasai_register_sweets_cpt() {
	$labels = array(
		'name'               => '和菓子',
		'singular_name'      => '和菓子',
		'add_new'            => '新規追加',
		'add_new_item'       => '和菓子を追加',
		'edit_item'          => '和菓子を編集',
		'new_item'           => '新しい和菓子',
		'view_item'          => '和菓子を表示',
		'search_items'       => '和菓子を検索',
		'not_found'          => '和菓子が見つかりません',
		'not_found_in_trash' => 'ゴミ箱に和菓子はありません',
		'menu_name'          => '和菓子',
	);

	$args = array(
		'labels'        => $labels,
		'public'        => true,
		'has_archive'   => true,
		'rewrite'       => array( 'slug' => 'sweets' ),
		'menu_position' => 5,
		'menu_icon'     => 'dashicons-carrot',
		'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'show_in_rest'  => true,
	);

	register_post_type( 'sweets', $args );
}
add_action( 'init', 'kandawasai_register_sweets_cpt' );

/**
 * Optional: create ACF fields in code if ACF is active.
 */
function kandawasai_register_sweets_acf_fields() {
	if ( ! function_exists( 'acf_add_local_field_group' ) ) {
		return;
	}

	acf_add_local_field_group(
		array(
			'key'    => 'group_kandawasai_sweets',
			'title'  => '和菓子情報',
			'fields' => array(
				array(
					'key'   => 'field_kandawasai_sweet_image',
					'label' => '和菓子画像',
					'name'  => 'sweet_image',
					'type'  => 'image',
					'return_format' => 'url',
				),
				array(
					'key'   => 'field_kandawasai_sweet_price',
					'label' => '価格',
					'name'  => 'sweet_price',
					'type'  => 'text',
				),
				array(
					'key'   => 'field_kandawasai_sweet_season',
					'label' => '販売時期・季節',
					'name'  => 'sweet_season',
					'type'  => 'text',
				),
			),
			'location' => array(
				array(
					array(
						'param'    => 'post_type',
						'operator' => '==',
						'value'    => 'sweets',
					),
				),
			),
		)
	);
}
add_action( 'acf/init', 'kandawasai_register_sweets_acf_fields' );
