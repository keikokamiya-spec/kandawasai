Kandawasai Sweets Theme
=======================

アップロード手順
1. WordPress管理画面の「外観 > テーマ > 新規追加 > テーマのアップロード」を開く
2. `kandawasai-sweets-theme.zip` を選択してアップロード
3. 有効化

内容
- `sweets` カスタム投稿タイプ登録
- ACF が有効なら `sweet_image`, `sweet_price`, `sweet_season` をコード登録
- `archive-sweets.php` に和菓子一覧ループを実装
- `single-sweets.php` に個別詳細テンプレートを実装

補足
- 既に別の場所で `sweets` カスタム投稿タイプを登録している場合は、`functions.php` の `kandawasai_register_sweets_cpt()` を削除してください。
- ACF Pro / ACF が未インストールでもテーマは動きますが、ACFフィールド値は空になります。
