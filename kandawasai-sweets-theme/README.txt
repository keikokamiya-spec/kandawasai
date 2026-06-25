Kandawasai Sweets Theme
=======================

アップロード手順
1. WordPress管理画面の「外観 > テーマ > 新規追加 > テーマのアップロード」を開く
2. `kandawasai-sweets-theme.zip` を選択してアップロード
3. 有効化

内容
- `sweets` カスタム投稿タイプ登録
- ACF 無料版で `sweet_image`, `sweet_price`, `sweet_season`, `sweet_display_section`, `sweet_description` をコード登録
- `archive-sweets.php` に和菓子一覧ループを実装
- `single-sweets.php` に個別詳細テンプレートを実装

季節の上生菓子の編集
- WordPress管理画面の「和菓子 > 新規追加」または既存の和菓子を編集
- タイトル：カードのタイトル
- 和菓子画像：カードの画像
- 一覧用説明文：カードの説明文
- 表示セクション：表示したい場所を選択
  - `季節の上生菓子`
  - `定番和菓子`
  - `季節の和菓子`
- 公開または更新すると選んだセクションに表示

補足
- 既に別の場所で `sweets` カスタム投稿タイプを登録している場合は、`functions.php` の `kandawasai_register_sweets_cpt()` を削除してください。
- ACF 無料版 / ACF が未インストールでもテーマは動きますが、ACFフィールド値は空になります。
