<?php

// 明示的に指定して有効にするWordPressの組み込み機能
function my_theme_setup()
{
  add_theme_support("post-thumbnails");
  add_theme_support("automatic_feed_links"); // () は不要
  add_theme_support("title-tag");
  add_theme_support("html5", array("search-form", "comment-form", "comment-list", "gallery", "caption", "style", "script"));
}
add_action("after_setup_theme", "my_theme_setup");




// style、scriptの読み込み
// index.phpのhead内に、pp wp_head(); を記述
// footer.phpのbody末尾に、pp wp_footer(); を記述
// マップとか不要なのは消す
function my_script_init()
{
  // 外部ライブラリ（CDN）
  // 1. Font Awesome
  $font_awesome_url = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css';
  wp_enqueue_style("font-awesome", $font_awesome_url, array(), "6.5.1", "all");
  // 2. Swiper CSS
  wp_enqueue_style("swiper-css", "https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css", array(), "11", "all"); // ハンドル名を変更 (swiper-jsと区別)

  // Webフォント
  // 3. Google Fonts
  $google_fonts_url = 'https://fonts.googleapis.com/css2?family=M+PLUS+Rounded+1c&family=Noto+Sans+JP:wght@100..900&display=swap';
  wp_enqueue_style('google-fonts', $google_fonts_url, array(), null);
  // 4. Typekit (Adobe Fonts) - コメントアウトされている

  // テーマのスタイルシート
  // 5. テーマのstyle.css
  wp_enqueue_style("my-style", get_template_directory_uri() . "/assets/css/style.css", array(), filemtime(get_theme_file_path("assets/css/style.css")), "all"); // ハンドル名を変更 (my-scriptと区別)

  // JavaScript
  // 6. Swiper JS (CDN) - ここで読み込むように変更
  wp_enqueue_script('swiper-js', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', array(), '11', true); // 依存なし, バージョン11, フッター読み込み

  // 7. テーマのscript.js (jQuery と Swiper JS に依存) - 依存関係に 'swiper-js' を追加
  wp_enqueue_script('my-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery', 'swiper-js'), filemtime(get_theme_file_path("assets/js/script.js")), true); // ハンドル名を変更, 依存関係に swiper-js を追加
}
add_action("wp_enqueue_scripts", "my_script_init");

// nameとidは他と重複しなければ何でも設定可能
// function my_widget_init()
// {
//   register_sidebar(
//     array(
//       "name" => "サイドバー",
//       "id" => "sidebar",
//       "description" => "サイドバーのウィジェットエリアです。",
//       "before_widget" => '<div id="%1s" class="widget %2s">',
//       "after_widget" => "</div>",
//       "before_title" => '<div class="widget-title">',
//       "after_title" => "</div>"
//     )
//   );
// }
// add_action("widgets_init", "my_widget_init");

// archiveページの有効化
function post_has_archive($args, $post_type)
{
  if ('post' == $post_type) {
    $args['rewrite'] = true;
    $args['has_archive'] = 'blog'; //任意のスラッグ名
  }
  return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);

// ユーザープロフィールに独自の項目を追加します
function user_contactMethods_filter($items)
{
  $items['twitter']  = 'Twitter (URL)';
  $items['youtube']  = 'YouTube (URL)';
  return $items;
}
add_filter('user_contactMethods', 'user_contactMethods_filter');

// プラグイン自動更新通知メール停止
add_filter('auto_plugin_update_send_email', '__return_false');
// テーマ自動更新通知メール停止
add_filter('auto_theme_update_send_email', '__return_false');

// 下記はWordPressコアの自動更新に関するメールを停止します。
// セキュリティ更新の通知も含まれるため、無効化する際はご注意ください。
// add_filter('auto_core_update_send_email', '__return_false');

/**
 * カスタムフィールドから取得したURLのドメイン部分を、現在のサイトのドメインに動的に置き換えます。
 *
 * 開発環境で入力したURLを本番環境で自動的に正しいURLに変換する際などに使用します。
 * 例: 'http://localhost/sample' -> 'https://example.com/sample'
 *
 * @param string $field_name カスタムフィールド名。
 * @param int|false $post_id 投稿ID。省略した場合は現在の投稿から取得します。
 * @return string|null 変換後のURL。URLが無効、またはフィールドが存在しない場合は null を返します。
 */
function get_dynamic_url_from_custom_field($field_name, $post_id = false)
{
  // カスタムフィールドからURLを取得
  $url = get_field($field_name, $post_id);

  // URLが空、または無効な形式の場合は処理を中断
  if (empty($url) || !is_string($url) || !filter_var($url, FILTER_VALIDATE_URL)) {
    return null;
  }

  // URLからパス部分（例: "/path/to/page/"）のみを抽出
  $path = wp_parse_url($url, PHP_URL_PATH);

  // 現在のサイトのドメインと抽出したパスを結合して、新しいURLを生成し、安全な形式で返す
  return esc_url(home_url($path));
}

// アクセス数カウント
// 閲覧数セット
function setPostViews($postID)
{
  // 投稿IDがなければ処理を中断
  if (!$postID) {
    return;
  }
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);

  if ($count === '') {
    // メタデータが存在しない場合は1を設定
    add_post_meta($postID, $count_key, 1);
  } else {
    // 存在する場合はインクリメント
    update_post_meta($postID, $count_key, (int)$count + 1);
  }
}

// クローラーカウントしない場合は追加
function is_bot()
{
  $ua = $_SERVER['HTTP_USER_AGENT'];

  $bot = array(
    'Googlebot',
    'Yahoo! Slurp',
    'Mediapartners-Google',
    'msnbot',
    'bingbot',
    'MJ12bot',
    'Ezooms',
    'pirst; MSIE 8.0;',
    'Google Web Preview',
    'ia_archiver',
    'Sogou web spider',
    'Googlebot-Mobile',
    'AhrefsBot',
    'YandexBot',
    'Purebot',
    'Baiduspider',
    'UnwindFetchor',
    'TweetmemeBot',
    'MetaURI',
    'PaperLiBot',
    'Showyoubot',
    'JS-Kit',
    'PostRank',
    'Crowsnest',
    'PycURL',
    'bitlybot',
    'Hatena',
    'facebookexternalhit',
    'NINJA bot',
    'YahooCacheSystem',
    'NHN Corp.',
    'Steeler',
    'DoCoMo',
  );

  foreach ($bot as $bot) {
    if (stripos($ua, $bot) !== false) {
      return true;
    }
  }

  return false;
}

// 閲覧数取得
function getPostViews($postID)
{
  $count_key = 'post_views_count';
  $count = get_post_meta($postID, $count_key, true);

  if ($count === '') { //カウントがなければ0を返す
    return "0 Views";
  }

  return $count . ' Views';
}


// 管理画面に閲覧数項目を追加する
function count_add_column($columns)
{
  $columns['views'] = '閲覧数';
  return $columns;
}


// 管理画面にページビュー数を表示する
function count_add_column_data($column, $post_id)
{
  switch ($column) {
    case 'views':
      echo getPostViews($post_id); // 閲覧数を取得する
      break;
  }
}

// 閲覧数項目を並び替えれる要素にする
function column_views_sortable($columns)
{
  $columns['views'] = 'views_sort';
  return $columns;
}

// 閲覧数クリックで並び替えを実行
function my_add_sort_by_meta($query)
{
  // 管理画面のメインクエリ以外では動作させない
  if (!is_admin() || !$query->is_main_query()) {
    return;
  }

  $orderby = $query->get('orderby');
  if ($orderby) {
    switch ($orderby) {
      case 'views_sort':
        $query->set('meta_key', 'post_views_count');
        $query->set('orderby', 'meta_value_num');
        break;
    }
  }
}

// 管理画面に閲覧数項目を追加する
add_filter('manage_posts_columns', 'count_add_column'); // 投稿ページに追加
add_filter('manage_pages_columns', 'count_add_column'); // 固定ページに追加
// add_filter('manage_works_posts_columns', 'count_add_column'); // worksでは manage_posts_columns が適用される可能性があるため、こちらは一旦コメントアウトします

// 管理画面にページビュー数を表示する
add_action('manage_posts_custom_column', 'count_add_column_data', 10, 2); // 投稿ページに追加
add_action('manage_pages_custom_column', 'count_add_column_data', 10, 2); // 固定ページに追加
// add_action('manage_works_posts_custom_column', 'count_add_column_data', 10, 2); // worksでは manage_posts_custom_column が適用される可能性があるため、こちらも一旦コメントアウトします

// 閲覧数クリックで並び替えを実行
add_action('pre_get_posts', 'my_add_sort_by_meta');
add_filter('manage_edit-post_sortable_columns', 'column_views_sortable'); // 投稿ページに追加
add_filter('manage_edit-page_sortable_columns', 'column_views_sortable'); // 固定ページに追加
add_filter('manage_edit-works_sortable_columns', 'column_views_sortable'); // カスタム投稿タイプ 'works' に追加