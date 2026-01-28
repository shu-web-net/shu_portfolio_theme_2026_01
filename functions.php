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



function my_script_init()
{
  // 外部ライブラリ（CDN）
  $font_awesome_url = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css';
  wp_enqueue_style("font-awesome", $font_awesome_url, array(), "6.5.1", "all");

  // Webフォント
  $google_fonts_url = 'https://fonts.googleapis.com/css2?family=Fira+Code:wght@300;400;600&family=Noto+Sans+JP:wght@400;500;700&display=swap';
  wp_enqueue_style('google-fonts', $google_fonts_url, array(), null);

  // テーマのスタイルシート
  wp_enqueue_style("my-style", get_template_directory_uri() . "/assets/css/style.css", array(), filemtime(get_theme_file_path("assets/css/style.css")), "all");

  // JavaScript
  wp_enqueue_script('my-script', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), filemtime(get_theme_file_path("assets/js/script.js")), true);
}
add_action("wp_enqueue_scripts", "my_script_init");

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
// add_filter('auto_core_update_send_email', '__return_false');

/**
 * カスタムフィールドから取得したURLのドメイン部分を、現在のサイトのドメインに動的に置き換え *
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

  // ボットならカウントしない
  if (is_bot()) {
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

// Contact Form 7で自動挿入されるpタグ、brタグを無効化
add_filter('wpcf7_autop_or_not', '__return_false');