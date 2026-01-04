<!-- header.phpのHTMLなどを読み込む -->
<?php get_header(); ?>

<?php
// 現在のページ番号を取得（WP_Query の外で取得）
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
?>

<main class="archive-main">
  <div class="l-inner archive-inner">
    <!-- 見出し変数込み -->
    <?php $args = array(
      "heading-jp" => "タグごと一覧",
      "heading-en" => "Posts by Tag",
    ) ?>
    <?php get_template_part("template-parts/c-heading-h1", null, $args) ?>

    <?php
    // 現在のタグの情報を取得
    $tag = get_queried_object();

    // タグのスラッグを変数に代入
    $tag_slug = $tag->slug;

    // タグの名前を変数に代入
    $tag_name = $tag->name;
    ?>
    <?php echo '<div class="archive-slug-name-wrapper"><p class="archive-slug-name">' . esc_html($tag_name) . '</p></div>'; ?>

    <!-- Blog投稿のループ -->
    <ul class="archive-list u-margin-top-30">
      <?php
      // 投稿ループ用の WP_Query
      $my_query = new WP_Query(
        array(
          'post_type' => 'post', // 投稿タイプを指定
          'posts_per_page' => 9, // 1ページあたりの表示件数
          'paged' => $paged, // 現在のページ番号
          'tag_id' => $tag->term_id, // 現在のタグに紐づく投稿のみを取得
        )
      );
      ?>
      <?php if ($my_query->have_posts()) : ?>
        <?php while ($my_query->have_posts()) : ?>
          <?php $my_query->the_post(); ?>
          <li class="archive-item">
            <a href="<?php the_permalink(); ?>">
              <img src="<?php the_post_thumbnail_url('large'); ?>" alt="ブログ投稿アイキャッチ画像" class="archive-item-img">
              <div class="archive-item-body">
                <h2 class="archive-item-title"><?php echo wp_trim_words(get_the_title(), 30, '…'); ?></h2>
                <p class="archive-item-excerpt">
                  <?php
                  $excerpt = get_the_excerpt();
                  $excerpt = strip_tags($excerpt, '<br>'); // brタグのみ残す
                  $excerpt = wp_trim_words($excerpt, 75, '...');
                  echo $excerpt;
                  ?>
                </p>
              </div>
            </a>
          </li>
        <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
    </ul>
    <?php get_template_part("template-parts/c-pagination-archive", null, array('my_query' => $my_query, 'paged' => $paged)); ?>
  </div>
  <?php get_template_part("template-parts/p-x-follow-me") ?>
  <!-- <?php get_template_part("template-parts/p-line") ?> -->

</main>

<!-- footer.phpのHTMLなどを読み込む -->
<?php get_footer(); ?>