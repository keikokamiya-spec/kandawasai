<?php
/**
 * Main theme template.
 *
 * @package Kandawasai_Sweets_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$view = kandawasai_current_view();
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'view-' . $view ); ?>>
<?php wp_body_open(); ?>
<?php kandawasai_render_site_header(); ?>

<?php if ( is_singular( 'post' ) ) : ?>
	<main id="site-content" class="page-main">
		<?php if ( have_posts() ) : ?>
			<?php while ( have_posts() ) : ?>
				<?php the_post(); ?>
				<article <?php post_class( 'page-article' ); ?>>
					<?php kandawasai_render_page_title( get_the_title() ); ?>
					<div class="post-inner thin">
						<div class="entry-content single-sweets__body">
							<?php if ( has_post_thumbnail() ) : ?>
								<p class="single-sweets__image"><?php the_post_thumbnail( 'large' ); ?></p>
							<?php endif; ?>
							<?php the_content(); ?>
							<?php kandawasai_render_contact_box(); ?>
						</div>
					</div>
				</article>
			<?php endwhile; ?>
		<?php endif; ?>
	</main>
<?php elseif ( 'commitment' === $view ) : ?>
	<main id="site-content" class="page-main">
		<article class="page-article">
			<?php kandawasai_render_page_title( 'こだわり' ); ?>
			<div class="post-inner thin">
				<div class="entry-content">
					<section id="commitment_01">
						<div class="fixed_ttl"><h2>ごあいさつ</h2></div>
						<div class="commitment_01_content_1">
							<div class="commitment_01_logo">
								<img src="https://kandawasai.com/wp-content/uploads/2023/09/concept_logo.png" alt="かんだ和彩" />
							</div>
							<div class="commitment_01_content_1_txt">
								<p>「人間国宝」「宮内庁御用達」その言葉に憧れ、そんな職人になりたいと小さい頃から漠然と思っていました。あるとき、テレビで宮内庁御用達の和菓子職人さんが、工芸菓子の松を作っているのを見てこの世界に興味を持ちました。</p>
								<p>千葉の『菓匠 白妙』(TVチャンピオンV5）の高橋弘光さんの元で5年の修行後、故・長尾美樹夫氏の表現や感性に憧れ、京都の『京菓匠 游月』へ入社。息子の長尾真吾さんの元で11年、和菓子を見つめ直し、満を持して地元熊谷での和菓子店の開業となりました。</p>
							</div>
						</div>
						<div class="commitment_01_content_2">
							<div class="commitment_01_content_2_txt">
								<h3>京都での修行…</h3>
								<p>修業というのは、どの世界も同じだと思いますが、話し方、返事の仕方、立ち方、食べ方、物の運び方など細かく指導されます。そうして、きちんとした社会人として成長していくことが修業だと思っています。ただお菓子を作ること、仕事を覚えることが修業ではありません。人としての成長が、いいものを作る、きちんとしたものを作る…ということに繋がっているのだと思います。</p>
							</div>
							<div class="commitment_01_content_2_img">
								<img src="https://kandawasai.com/wp-content/uploads/2023/09/concept_img.png" alt="京都での修行" />
							</div>
						</div>
						<div class="commitment_01_content_3">
							<h3>京都の和菓子</h3>
							<p>「楽しむ」ということだと思います。お客様も楽しみますし、作り手も楽しみます。京都はそのものをそっくりには作りません。抽象的な表現を好みます。見ただけではよくわからないものも、その名前(菓名)を聞いて、考え、想像する。目で見て、耳で聞いて、そこにそれぞれの世界が生まれる。そんな和菓子の楽しみ方を皆さんと出来たら最高です。</p>
						</div>
					</section>
					<?php kandawasai_render_contact_box(); ?>
				</div>
			</div>
		</article>
	</main>
<?php elseif ( 'question' === $view ) : ?>
	<main id="site-content" class="page-main">
		<article class="page-article">
			<?php kandawasai_render_page_title( 'よくある質問' ); ?>
			<div class="post-inner thin">
				<div class="entry-content">
					<section id="question" class="fixed_w_1000">
						<ul class="question_item">
							<li><div class="question_item_a"><h3><span><img src="https://kandawasai.com/wp-content/uploads/2023/09/a_icon-8.png" alt="" /></span>最大何個までお願いできますか？</h3></div><div class="question_item_q"><p><span><img src="https://kandawasai.com/wp-content/uploads/2023/09/q_icon-8.png" alt="" /></span>日々の売れ行きを見て製造数を決めていますので、数量が多く必要な場合は前もってご連絡いただければ対応致します。</p></div></li>
							<li><div class="question_item_a"><h3><span><img src="https://kandawasai.com/wp-content/uploads/2023/09/a_icon-8.png" alt="" /></span>駐車場はありますか？</h3></div><div class="question_item_q"><p><span><img src="https://kandawasai.com/wp-content/uploads/2023/09/q_icon-8.png" alt="" /></span>小さめですが、店の隣に1台分ございます。</p></div></li>
							<li><div class="question_item_a"><h3><span><img src="https://kandawasai.com/wp-content/uploads/2023/09/a_icon-8.png" alt="" /></span>カードは使えますか？</h3></div><div class="question_item_q"><p><span><img src="https://kandawasai.com/wp-content/uploads/2023/09/q_icon-8.png" alt="" /></span>申し訳ございません。現金のみとなっております。</p></div></li>
							<li><div class="question_item_a"><h3><span><img src="https://kandawasai.com/wp-content/uploads/2023/09/a_icon-8.png" alt="" /></span>領収証をもらうことはできますか？</h3></div><div class="question_item_q"><p><span><img src="https://kandawasai.com/wp-content/uploads/2023/09/q_icon-8.png" alt="" /></span>はい。承っております。</p></div></li>
							<li><div class="question_item_a"><h3><span><img src="https://kandawasai.com/wp-content/uploads/2023/09/a_icon-8.png" alt="" /></span>メッセージカードはありますか？</h3></div><div class="question_item_q"><p><span><img src="https://kandawasai.com/wp-content/uploads/2023/09/q_icon-8.png" alt="" /></span>申し訳ございません。取り扱っておりません。</p></div></li>
							<li><div class="question_item_a"><h3><span><img src="https://kandawasai.com/wp-content/uploads/2023/09/a_icon-8.png" alt="" /></span>のしはお願いできますか？</h3></div><div class="question_item_q"><p><span><img src="https://kandawasai.com/wp-content/uploads/2023/09/q_icon-8.png" alt="" /></span>はい。承っております。</p></div></li>
							<li><div class="question_item_a"><h3><span><img src="https://kandawasai.com/wp-content/uploads/2023/09/a_icon-8.png" alt="" /></span>名入れはお願いできますか？</h3></div><div class="question_item_q"><p><span><img src="https://kandawasai.com/wp-content/uploads/2023/09/q_icon-8.png" alt="" /></span>はい、スタッフにて手書きさせて頂きます。</p></div></li>
							<li><div class="question_item_a"><h3><span><img src="https://kandawasai.com/wp-content/uploads/2023/09/a_icon-8.png" alt="" /></span>ギフトラッピングは行っていますか？</h3></div><div class="question_item_q"><p><span><img src="https://kandawasai.com/wp-content/uploads/2023/09/q_icon-8.png" alt="" /></span>申し訳ございません。リボンなどのご用意は現在ありません。</p></div></li>
							<li><div class="question_item_a"><h3><span><img src="https://kandawasai.com/wp-content/uploads/2023/09/a_icon-8.png" alt="" /></span>発送はしてもらえますか？</h3></div><div class="question_item_q"><p><span><img src="https://kandawasai.com/wp-content/uploads/2023/09/q_icon-8.png" alt="" /></span>はい。商品により発送できない物もございますのでご相談ください。</p></div></li>
							<li><div class="question_item_a"><h3><span><img src="https://kandawasai.com/wp-content/uploads/2023/09/a_icon-8.png" alt="" /></span>おいしく食べる方法などありますか？</h3></div><div class="question_item_q"><p><span><img src="https://kandawasai.com/wp-content/uploads/2023/09/q_icon-8.png" alt="" /></span>お菓子にはそれぞれ特徴がありますので、お気軽にスタッフへお尋ねください。お電話でも構いません。</p></div></li>
							<li><div class="question_item_a"><h3><span><img src="https://kandawasai.com/wp-content/uploads/2023/09/a_icon-8.png" alt="" /></span>現在、売っていないお菓子を作ってもらうことはできますか？</h3></div><div class="question_item_q"><p><span><img src="https://kandawasai.com/wp-content/uploads/2023/09/q_icon-8.png" alt="" /></span>出来る限り対応させていただきます。手に入らない材料もある場合がございますので、まずは一度ご相談ください。</p></div></li>
						</ul>
					</section>
					<?php kandawasai_render_contact_box(); ?>
				</div>
			</div>
		</article>
	</main>
<?php elseif ( 'guidance' === $view ) : ?>
	<main id="site-content" class="page-main">
		<article class="page-article">
			<?php kandawasai_render_page_title( '店舗案内' ); ?>
			<div class="post-inner thin">
				<div class="entry-content">
					<section id="guidance" class="fixed_w_1000">
						<div class="fixed_ttl"><h2>和菓子処 かんだ和彩</h2></div>
						<div class="guidance_flex">
							<div class="guidance_img"><img src="https://kandawasai.com/wp-content/themes/twentytwenty/assets/images/about01-2.jpg" alt="店舗案内" /></div>
							<div class="guidance_info_item">
								<dl><dt>住所</dt><dd>埼玉県熊谷市箱田1丁目6-8</dd></dl>
								<dl><dt>電話番号</dt><dd>048-514-9214</dd></dl>
								<dl><dt>営業時間</dt><dd>10：00～17：00</dd></dl>
								<dl><dt>定休日</dt><dd>火曜日、水曜日</dd></dl>
								<dl><dt>アクセス</dt><dd>上熊谷駅より徒歩6分</dd></dl>
							</div>
						</div>
					</section>
					<section id="guidance_access" class="fixed_w_1000">
						<div class="fixed_ttl"><h2>アクセス</h2></div>
						<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d25774.944045439384!2d139.38157300000003!3d36.145427!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x601f29c923e08261%3A0x2c8ece0d24d79362!2z5ZKM6I-T5a2Q5YemIOOBi-OCk-OBoOWSjOW9qSDln7znjonnnIosLfuII!5e0!3m2!1sja!2sjp!4v1694453359140!5m2!1sja!2sjp" width="100%" height="450" style="border: 0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</section>
					<?php kandawasai_render_contact_box(); ?>
				</div>
			</div>
		</article>
	</main>
<?php elseif ( 'info' === $view ) : ?>
	<main id="site-content" class="page-main">
		<article class="page-article">
			<?php kandawasai_render_page_title( 'お問い合わせ' ); ?>
			<div class="post-inner thin">
				<div class="entry-content">
					<section id="info_page" class="fixed_w_1000">
						<div class="info_page_01">
							<p class="info_page_01_p">この度は、和菓子処 かんだ和彩のホームページをご覧いただき誠に有難うございます。<br />商品のご予約の場合は、お電話は1日前、メールでのお問い合わせは2日前までを目安にご予約をお願いいたします。</p>
						</div>
						<div class="info_page_tell">
							<div class="fixed_ttl"><h2>お電話でご予約の場合</h2></div>
							<div class="info_page_tell_area"><p class="info_page_tell_area_p">048-514-9214</p></div>
						</div>
						<div class="info_page_maill">
							<div class="fixed_ttl"><h2>メールでご予約の場合</h2></div>
							<p class="info_page_maill_p">ご予約の場合は、商品名と個数を「お問い合わせ内容」へご記入ください。</p>
							<div class="info_page_mail">
								<form action="#" method="post">
									<label>お名前<span>(必須)</span><input type="text" name="your-name" /></label>
									<label>フリガナ<span>(必須)</span><input type="text" name="your-kana" /></label>
									<label>メールアドレス<span>(必須)</span><input type="email" name="your-email" /></label>
									<label>電話番号<span>(必須)</span><input type="tel" name="your-tel" /></label>
									<label>FAX番号<input type="text" name="your-fax" /></label>
									<label>お問い合わせ内容<textarea name="your-message"></textarea></label>
									<input type="submit" value="送信" />
								</form>
							</div>
						</div>
					</section>
				</div>
			</div>
		</article>
	</main>
<?php elseif ( 'diary' === $view ) : ?>
	<main id="site-content" class="page-main">
		<article class="page-article">
			<?php kandawasai_render_page_title( 'かんだ和彩日記' ); ?>
			<div class="post-inner thin">
				<div class="entry-content">
					<div class="team-2-box_inner_flex">
						<div class="team-2-box_inner_01">
							<ul class="team-2-box_inner_nav">
								<li><a href="#diary-posts"><span></span>活動報告</a></li>
								<li><a href="#diary-posts"><span></span>新作和菓子</a></li>
								<li><a href="#diary-posts"><span></span>季節の上生菓子</a></li>
								<li><a href="#diary-posts"><span></span>お知らせ</a></li>
							</ul>
						</div>
						<div class="team-2-box_inner_02" id="diary-posts">
							<?php
							$diary_query = new WP_Query(
								array(
									'post_type'      => 'post',
									'posts_per_page' => 10,
									'paged'          => max( 1, get_query_var( 'paged' ) ),
								)
							);
							?>
							<?php if ( $diary_query->have_posts() ) : ?>
								<?php while ( $diary_query->have_posts() ) : ?>
									<?php $diary_query->the_post(); ?>
									<div class="team-2-box">
										<a class="team_flex" href="<?php the_permalink(); ?>">
											<div class="team-2-pic"><img src="<?php echo esc_url( kandawasai_get_image_url( get_the_ID() ) ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" /></div>
											<div class="team_flex_ttl">
												<div class="team-2-pic_dateTime"><p><?php echo esc_html( get_the_date( 'Y年n月j日' ) ); ?></p></div>
												<div class="team-2-content"><h5><?php the_title(); ?></h5></div>
											</div>
										</a>
									</div>
								<?php endwhile; ?>
								<div class="pnavi"><?php echo wp_kses_post( paginate_links( array( 'total' => $diary_query->max_num_pages ) ) ); ?></div>
								<?php wp_reset_postdata(); ?>
							<?php else : ?>
								<p class="sweets-archive__empty">まだ日記は登録されていません。</p>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</article>
	</main>
<?php else : ?>
	<main id="main_content">
		<div class="slideBox" aria-label="メインビジュアル">
			<img class="item1" src="https://kandawasai.com/wp-content/uploads/2023/09/mv02-scaled.jpg" alt="" />
			<img class="item1" src="https://kandawasai.com/wp-content/uploads/2023/09/mv01-scaled.jpg" alt="" />
			<img class="item1" src="https://kandawasai.com/wp-content/uploads/2023/09/mv03-scaled.jpg" alt="" />
			<img class="item1" src="https://kandawasai.com/wp-content/uploads/2023/09/mv04-scaled.jpg" alt="" />
		</div>

		<section id="hello" class="hello_bg">
			<div class="w_1140 hello_flex">
				<div class="hello_img_box">
					<img src="https://kandawasai.com/wp-content/uploads/2023/09/top_item_01.jpg" alt="和菓子" />
				</div>
				<div class="hello_txt_box">
					<div class="hello_txtbox_flex">
						<div class="hello_txtbox_flex_txtarea">
							<p>和菓子をもっと気軽にお召し上がりいただきたい。そんな想いで熊谷に和菓子屋を開きました。京都で修行を積んだ店主が毎日心を込めて和菓子をお作りしております。是非一度お召し上がりください。</p>
						</div>
						<div class="hello_txtbox_flex_ttlarea">
							<div class="hello_txtbox_flex_ttlarea_ttl">
								<img src="https://kandawasai.com/wp-content/uploads/2023/09/ttl_01.png" alt="ご挨拶" />
							</div>
							<div class="more btn_616">
								<button class="more_btn">
									<a href="<?php echo esc_url( kandawasai_nav_link( 'commitment' ) ); ?>">
										<img src="https://kandawasai.com/wp-content/themes/twentytwenty/assets/images/ttl_btn-3_2.png" alt="かんだ和彩のこだわり" />
										<p class="more_btn_ttl more_btn_ttl_safsri_01">かんだ和彩のこだわり</p>
									</a>
								</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="diary">
			<div class="w_960 diary_flex">
				<div class="diary_ttlarea">
					<div class="diary_ttl"><h2>和菓子紹介</h2></div>
					<div class="more_dg">
						<button class="more_dg_btn">
							<a href="<?php echo esc_url( kandawasai_nav_link( 'sweets' ) ); ?>">
								<img src="https://kandawasai.com/wp-content/uploads/2023/09/dang_btn.png" alt="一覧を見る" />
							</a>
						</button>
					</div>
				</div>
				<div class="diary_item">
					<?php
					$front_sweets = new WP_Query(
						array(
							'post_type'      => 'sweets',
							'posts_per_page' => 6,
						)
					);
					?>
					<?php if ( $front_sweets->have_posts() ) : ?>
						<?php while ( $front_sweets->have_posts() ) : ?>
							<?php
							$front_sweets->the_post();
							$sweet_season = function_exists( 'get_field' ) ? get_field( 'sweet_season' ) : '';
							?>
							<div class="front_post_box">
								<a class="front_post_box_link" href="<?php the_permalink(); ?>">
									<div class="front_post_box_img">
										<img src="<?php echo esc_url( kandawasai_get_image_url( get_the_ID() ) ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" />
									</div>
									<div class="front_post_box_dateTime"><p><?php echo esc_html( get_the_date( 'Y/n/j' ) ); ?></p></div>
									<div class="front_post_content"><h5><?php echo esc_html( trim( $sweet_season . ' ' . get_the_title() ) ); ?></h5></div>
								</a>
							</div>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					<?php else : ?>
						<p class="sweets-archive__empty">和菓子データを登録するとここに表示されます。</p>
					<?php endif; ?>
				</div>
			</div>
		</section>

		<section id="store">
			<div class="store_flex">
				<div class="store_flex_txtarea">
					<div class="news_flex_box_ttl"><h2>店舗情報</h2></div>
					<div class="store_flex_txt">
						<h3>和菓子処 かんだ和彩</h3>
						<p class="store_flex_txt01">16年の修行の中、和菓子を見つめ直し、満を持して地元熊谷で開業。「和菓子が好きじゃない」人にこそ食べてもらいたい。笑顔が生まれる「美味しい」和菓子を目標に心を込めてお作りしております。</p>
						<p class="store_flex_txt02">〒360-0014 埼玉県熊谷市箱田1丁目6-8<br />営業時間 ： 10：00～17：00<br />定休日 ： 火曜日、水曜日<br />電話番号 ： 048-514-9214</p>
					</div>
				</div>
				<div class="store_flex_imgarea">
					<div class="store_flex_img">
						<img src="https://kandawasai.com/wp-content/themes/twentytwenty/assets/images/top_item_04-a.jpg" alt="和菓子処 かんだ和彩" />
					</div>
					<ul class="store_iocon_flex">
						<li><a href="https://twitter.com/kandawasai" target="_blank" rel="noreferrer"><img src="https://kandawasai.com/wp-content/uploads/2023/09/x.png" alt="X" style="width: 25px; margin-top: 4px" /><p>エックス<br />(Twitter)</p></a></li>
						<li><a href="https://www.facebook.com/kandawasai/" target="_blank" rel="noreferrer"><img src="https://kandawasai.com/wp-content/uploads/2023/09/fa9fa6b46ee2d59c22070aecd2b1baf7.png" alt="Facebook" /><p>Facebook</p></a></li>
						<li><a href="https://www.instagram.com/kandawasai/?hl=ja" target="_blank" rel="noreferrer"><img src="https://kandawasai.com/wp-content/uploads/2023/09/52016d74f32660f61b6b8fc498f2838b.png" alt="Instagram" /><p>Instagram</p></a></li>
					</ul>
				</div>
			</div>
		</section>

		<div class="footer_slid">
			<ul class="footer_sliditem">
				<li><img src="https://kandawasai.com/wp-content/uploads/2023/09/footer_slid_01.jpg" alt="" /></li>
				<li><img src="https://kandawasai.com/wp-content/uploads/2023/09/footer_slid_02.jpg" alt="" /></li>
				<li><img src="https://kandawasai.com/wp-content/uploads/2023/09/footer_slid_03.jpg" alt="" /></li>
				<li><img src="https://kandawasai.com/wp-content/uploads/2023/09/footer_slid_04.jpg" alt="" /></li>
				<li><img src="https://kandawasai.com/wp-content/uploads/2023/09/footer_slid_05.jpg" alt="" /></li>
				<li><img src="https://kandawasai.com/wp-content/uploads/2023/09/footer_slid_06.jpg" alt="" /></li>
				<li><img src="https://kandawasai.com/wp-content/uploads/2023/09/footer_slid_07.jpg" alt="" /></li>
			</ul>
			<ul class="footer_sliditem" aria-hidden="true">
				<li><img src="https://kandawasai.com/wp-content/uploads/2023/09/footer_slid_01.jpg" alt="" /></li>
				<li><img src="https://kandawasai.com/wp-content/uploads/2023/09/footer_slid_02.jpg" alt="" /></li>
				<li><img src="https://kandawasai.com/wp-content/uploads/2023/09/footer_slid_03.jpg" alt="" /></li>
				<li><img src="https://kandawasai.com/wp-content/uploads/2023/09/footer_slid_04.jpg" alt="" /></li>
				<li><img src="https://kandawasai.com/wp-content/uploads/2023/09/footer_slid_05.jpg" alt="" /></li>
				<li><img src="https://kandawasai.com/wp-content/uploads/2023/09/footer_slid_06.jpg" alt="" /></li>
				<li><img src="https://kandawasai.com/wp-content/uploads/2023/09/footer_slid_07.jpg" alt="" /></li>
			</ul>
		</div>
	</main>
<?php endif; ?>

<?php kandawasai_render_site_footer(); ?>
<?php wp_footer(); ?>
</body>
</html>
