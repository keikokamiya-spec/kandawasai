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

function kandawasai_enqueue_assets() {
	wp_enqueue_style(
		'kandawasai-destyle',
		'https://cdn.jsdelivr.net/npm/destyle.css@1.0.15/destyle.css',
		array(),
		'1.0.15'
	);

	wp_enqueue_style(
		'kandawasai-style',
		get_stylesheet_uri(),
		array( 'kandawasai-destyle' ),
		wp_get_theme()->get( 'Version' )
	);
}
add_action( 'wp_enqueue_scripts', 'kandawasai_enqueue_assets' );

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

function kandawasai_register_theme_rewrites() {
	$views = array( 'commitment', 'diary', 'question', 'guidance', 'info' );

	foreach ( $views as $view ) {
		add_rewrite_rule( '^' . $view . '/?$', 'index.php?kandawasai_view=' . $view, 'top' );
	}
}
add_action( 'init', 'kandawasai_register_theme_rewrites' );

function kandawasai_theme_query_vars( $vars ) {
	$vars[] = 'kandawasai_view';
	return $vars;
}
add_filter( 'query_vars', 'kandawasai_theme_query_vars' );

function kandawasai_flush_theme_rewrites() {
	kandawasai_register_theme_rewrites();
	flush_rewrite_rules();
}
add_action( 'after_switch_theme', 'kandawasai_flush_theme_rewrites' );

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
					'key'           => 'field_kandawasai_sweet_image',
					'label'         => '和菓子画像',
					'name'          => 'sweet_image',
					'type'          => 'image',
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

function kandawasai_current_view() {
	$view = get_query_var( 'kandawasai_view' );

	if ( is_post_type_archive( 'sweets' ) || is_singular( 'sweets' ) ) {
		return 'sweets';
	}

	if ( ! empty( $view ) ) {
		return $view;
	}

	if ( is_front_page() || is_home() ) {
		return 'home';
	}

	return '';
}

function kandawasai_nav_link( $view ) {
	if ( 'home' === $view ) {
		return home_url( '/' );
	}

	if ( 'sweets' === $view ) {
		$archive_link = get_post_type_archive_link( 'sweets' );
		return $archive_link ? $archive_link : home_url( '/sweets/' );
	}

	return home_url( '/' . $view . '/' );
}

function kandawasai_nav_class( $view ) {
	return kandawasai_current_view() === $view ? ' is-current' : '';
}

function kandawasai_get_image_url( $post_id ) {
	if ( has_post_thumbnail( $post_id ) ) {
		return get_the_post_thumbnail_url( $post_id, 'large' );
	}

	if ( function_exists( 'get_field' ) ) {
		$acf_image = get_field( 'sweet_image', $post_id );
		if ( ! empty( $acf_image ) ) {
			return $acf_image;
		}
	}

	return 'https://kandawasai.com/wp-content/uploads/2023/09/top_item_01.jpg';
}

function kandawasai_render_site_header() {
	?>
	<header id="front_header">
		<div class="w_1140 front_header_flex">
			<div class="front_header_logo">
				<a href="<?php echo esc_url( kandawasai_nav_link( 'home' ) ); ?>">
					<img src="https://kandawasai.com/wp-content/uploads/2023/09/logo.png" alt="かんだ和彩" />
				</a>
			</div>
			<div class="front_header_icon_box">
				<ul class="front_header_icon">
					<li>
						<a href="https://twitter.com/kandawasai" target="_blank" rel="noreferrer">
							<img src="https://kandawasai.com/wp-content/uploads/2023/09/x.png" alt="X" style="width: 25px; margin-top: 4px" />
							<p>エックス<br />(Twitter)</p>
						</a>
					</li>
					<li>
						<a href="https://www.facebook.com/kandawasai/" target="_blank" rel="noreferrer">
							<img src="https://kandawasai.com/wp-content/uploads/2023/09/fa9fa6b46ee2d59c22070aecd2b1baf7.png" alt="Facebook" />
							<p>Facebook</p>
						</a>
					</li>
					<li>
						<a href="https://www.instagram.com/kandawasai/?hl=ja" target="_blank" rel="noreferrer">
							<img src="https://kandawasai.com/wp-content/uploads/2023/09/52016d74f32660f61b6b8fc498f2838b.png" alt="Instagram" />
							<p>Instagram</p>
						</a>
					</li>
					<li>
						<a href="https://kandawasai.raku-uru.jp/" target="_blank" rel="noreferrer">
							<img src="https://kandawasai.com/wp-content/themes/twentytwenty/assets/images/cart_icon.png" alt="オンラインショップ" />
							<p>オンラインショップ</p>
						</a>
					</li>
				</ul>
			</div>
		</div>

		<nav class="front_header_nav">
			<ul class="front_header_nav_item">
				<li><a class="header_nane_item<?php echo esc_attr( kandawasai_nav_class( 'home' ) ); ?>" href="<?php echo esc_url( kandawasai_nav_link( 'home' ) ); ?>">ホーム</a></li>
				<li><a class="header_nane_item front_header_nav2<?php echo esc_attr( kandawasai_nav_class( 'commitment' ) ); ?>" href="<?php echo esc_url( kandawasai_nav_link( 'commitment' ) ); ?>">こだわり</a></li>
				<li><a class="header_nane_item front_header_nav3<?php echo esc_attr( kandawasai_nav_class( 'sweets' ) ); ?>" href="<?php echo esc_url( kandawasai_nav_link( 'sweets' ) ); ?>">和菓子紹介</a></li>
				<li><a class="header_nane_item front_header_nav4<?php echo esc_attr( kandawasai_nav_class( 'diary' ) ); ?>" href="<?php echo esc_url( kandawasai_nav_link( 'diary' ) ); ?>">かんだ和彩日記</a></li>
				<li><a class="header_nane_item front_header_nav5<?php echo esc_attr( kandawasai_nav_class( 'question' ) ); ?>" href="<?php echo esc_url( kandawasai_nav_link( 'question' ) ); ?>">よくある質問</a></li>
				<li><a class="header_nane_item front_header_nav6<?php echo esc_attr( kandawasai_nav_class( 'guidance' ) ); ?>" href="<?php echo esc_url( kandawasai_nav_link( 'guidance' ) ); ?>">店舗案内</a></li>
			</ul>
		</nav>

		<div class="hamburger-menu">
			<input type="checkbox" id="menu-btn-check" />
			<label for="menu-btn-check" class="menu-btn"><span></span></label>
			<div class="menu-content">
				<ul>
					<li><a href="<?php echo esc_url( kandawasai_nav_link( 'home' ) ); ?>">ホーム</a></li>
					<li><a href="<?php echo esc_url( kandawasai_nav_link( 'commitment' ) ); ?>">こだわり</a></li>
					<li><a href="<?php echo esc_url( kandawasai_nav_link( 'sweets' ) ); ?>">和菓子紹介</a></li>
					<li><a href="<?php echo esc_url( kandawasai_nav_link( 'diary' ) ); ?>">かんだ和彩日記</a></li>
					<li><a href="<?php echo esc_url( kandawasai_nav_link( 'question' ) ); ?>">よくある質問</a></li>
					<li><a href="<?php echo esc_url( kandawasai_nav_link( 'guidance' ) ); ?>">店舗案内</a></li>
					<li><a href="<?php echo esc_url( kandawasai_nav_link( 'info' ) ); ?>">お問い合わせ</a></li>
					<li><a href="https://kandawasai.raku-uru.jp/" target="_blank" rel="noreferrer">オンラインショップ</a></li>
				</ul>
			</div>
		</div>
	</header>
	<?php
}

function kandawasai_render_site_footer() {
	?>
	<footer id="site-footer">
		<div class="section-inner footer_flex">
			<div class="footer-credits">
				<div class="footer_logo">
					<a href="<?php echo esc_url( kandawasai_nav_link( 'home' ) ); ?>">
						<img src="https://kandawasai.com/wp-content/uploads/2023/09/footer_logo.png" alt="かんだ和彩" />
					</a>
				</div>
				<div class="footer_l">
					<p>〒360-0014<br />埼玉県熊谷市箱田1丁目6-8<br />営業時間：10：00〜17：00</p>
				</div>
				<div class="footer_l_icon">
					<ul class="footer_l_icon_flex">
						<li><a href="https://twitter.com/kandawasai" target="_blank" rel="noreferrer"><img src="https://kandawasai.com/wp-content/uploads/2023/09/x.png" alt="X" style="width: 25px; margin-top: 4px" /><p>エックス<br />(Twitter)</p></a></li>
						<li><a href="https://www.facebook.com/kandawasai/" target="_blank" rel="noreferrer"><img src="https://kandawasai.com/wp-content/uploads/2023/09/fa9fa6b46ee2d59c22070aecd2b1baf7.png" alt="Facebook" /><p>Facebook</p></a></li>
						<li><a href="https://www.instagram.com/kandawasai/?hl=ja" target="_blank" rel="noreferrer"><img src="https://kandawasai.com/wp-content/uploads/2023/09/52016d74f32660f61b6b8fc498f2838b.png" alt="Instagram" /><p>Instagram</p></a></li>
					</ul>
				</div>
			</div>
			<div class="footer_nav">
				<ul class="footer_nav_flex">
					<li><a href="<?php echo esc_url( kandawasai_nav_link( 'home' ) ); ?>">ホーム</a></li>
					<li><a href="<?php echo esc_url( kandawasai_nav_link( 'commitment' ) ); ?>">こだわり</a></li>
					<li><a href="<?php echo esc_url( kandawasai_nav_link( 'sweets' ) ); ?>">和菓子紹介</a></li>
					<li><a href="<?php echo esc_url( kandawasai_nav_link( 'diary' ) ); ?>">かんだ和彩日記</a></li>
					<li><a href="<?php echo esc_url( kandawasai_nav_link( 'question' ) ); ?>">よくある質問</a></li>
					<li><a href="<?php echo esc_url( kandawasai_nav_link( 'guidance' ) ); ?>">店舗案内</a></li>
					<li><a href="<?php echo esc_url( kandawasai_nav_link( 'info' ) ); ?>">お問い合わせ</a></li>
					<li><a href="https://kandawasai.raku-uru.jp/" target="_blank" rel="noreferrer">オンラインショップ</a></li>
				</ul>
			</div>
		</div>
	</footer>
	<?php
}

function kandawasai_render_page_title( $title ) {
	?>
	<header class="entry-header has-text-align-center header-footer-group">
		<div class="entry-header-inner section-inner medium">
			<h1 class="entry-title"><?php echo esc_html( $title ); ?></h1>
		</div>
	</header>
	<?php
}

function kandawasai_render_contact_box() {
	?>
	<div class="fixed_info">
		<h2>お問い合わせはこちら</h2>
		<div class="fixed_info_tel">
			<p class="fixed_info_tel_01">営業時間：10：00～17：00<br />定休日：火曜日、水曜日</p>
			<p class="fixed_info_tel_02">048-514-9214</p>
		</div>
		<div class="fixed_info_btn">
			<button><a href="<?php echo esc_url( kandawasai_nav_link( 'info' ) ); ?>">メールフォームはこちら</a></button>
		</div>
	</div>
	<?php
}
