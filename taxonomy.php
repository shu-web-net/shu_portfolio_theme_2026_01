<!-- header.phpのHTMLなどを読み込む -->
<?php get_header(); ?>

<main class="archive-main">
  <div class="l-inner archive-inner">
    <!-- <h1 class="archive-posts-title"></h1> -->

    <?php $args = array(
      "heading-jp" => "制作物一覧",
      "heading-en" => "Works",
    ) ?>
    <?php get_template_part("template-parts/c-heading-h1", null, $args) ?>

    <?php
    // 現在のターム（タクソノミー）の情報を取得
    $term = get_queried_object();

    // タームのスラッグを変数に代入
    $term_slug = $term->slug;

    // タームの名前を変数に代入
    $term_name = $term->name;

    // タームの説明を変数に代入
    $term_description = $term->description;

    // ここでスラッグや名前、説明を表示することもできます。
    // 例：echo '<p>タームスラッグ: ' . esc_html($term_slug) . '</p>';
    // 例：echo '<p>ターム名: ' . esc_html($term_name) . '</p>';
    // 例：echo '<p>ターム説明: ' . esc_html($term_description) . '</p>';
    ?>
    <?php echo '<div class="archive-slug-name-wrapper"><p class="archive-slug-name">' . esc_html($term_name) . '</p></div>'; ?>

    <ul class="archive-list u-margin-top-30">
      <!-- 現在のテンプレートにかかわらず、任意のループを一時的に使う
      サブループを回した後は、必ずwp_reset_postdata()を実行して、メインループに戻すイメージ -->
      <?php
      // 現在のページ番号を取得
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

      $my_query = new WP_Query(
        array(
          'post_type' => 'works', // 投稿タイプを指定
          'posts_per_page' => 9, // 1ページあたりの表示件数
          'paged' => $paged, // 現在のページ番号
          'tax_query' => array( // tax_query を使用
            array(
              'taxonomy' => 'genre', // タクソノミー名
              'field' => 'slug', // スラッグで指定
              'terms' => $term_slug, // 現在のタームのスラッグ
            ),
          ),
        )
      );
      ?>
      <?php if ($my_query->have_posts()) : ?>
        <?php while ($my_query->have_posts()) : ?>
          <?php $my_query->the_post(); ?>
          <li class="archive-item">
            <a href="<?php the_permalink(); ?>">
              <img src="<?php the_post_thumbnail_url('large'); ?>" alt="ポートフォリオ解説記事アイキャッチ画像" class="archive-item-img">
              <div class="archive-item-body">
                <h2 class="archive-item-title"><?php echo wp_trim_words(get_the_title(), 30, '…'); ?></h2>
                <p class="archive-item-excerpt">
                  <?php
                  $excerpt = get_the_excerpt();
                  $excerpt = strip_tags($excerpt, '<br>'); // brタグのみ残す
                  $excerpt = wp_trim_words($excerpt, 55, '...');
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