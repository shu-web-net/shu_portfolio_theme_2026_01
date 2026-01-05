<!-- header.phpのHTMLなどを読み込む -->
<?php get_header(); ?>

<main class="archive-main">
  <div class="l-inner archive-inner">
    <!-- 見出し変数込み -->
    <?php $args = array(
      "heading-jp" => "制作物一覧",
      "heading-en" => "Works",
    ) ?>
    <?php get_template_part("template-parts/c-heading-h1", null, $args) ?>

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
            <?php
            // 新しく作成した関数で、'works-link' のURLを動的に変換して取得
            $works_link = get_dynamic_url_from_custom_field('works-link');
            if ($works_link) : // リンクが存在する場合のみ表示
            ?>
              <div class="works-list__link-btn-wrap">
                <p class="works-list__link-btn-text">↑は解説記事付きです<br />制作物に直接とびたい方は<br /><a href="<?php echo $works_link; ?>" target="_blank" class="works-list__link-btn">【こちら】</a><br />デモサイトの場合は<br />【ID= shu】<br />【pass= pass】<br />を入力してください</p>
              </div>
            <?php endif; ?>
          </li>
        <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
    </ul>
    <!-- ページネーション -->    
    <?php get_template_part("template-parts/c-pagination-archive", null, array('my_query' => $my_query, 'paged' => $paged)); ?>

  </div>


</main>

<!-- footer.phpのHTMLなどを読み込む -->
<?php get_footer(); ?>