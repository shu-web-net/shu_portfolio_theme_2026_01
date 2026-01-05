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
      <?php
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

      // カスタム投稿タイプ 'works' の記事を取得
      $my_query = new WP_Query(
        array(
          'post_type' => 'works',
          'posts_per_page' => 9,
          'paged' => $paged,
        )
      );
      ?>

      <?php if ($my_query->have_posts()) : ?>
        <?php while ($my_query->have_posts()) : ?>
          <?php $my_query->the_post(); ?>

          <!-- Works用のクラス archive-item--works を追加 -->
          <li class="archive-item archive-item--works">

            <!-- カード全体のリンク（詳細ページへ） -->
            <a href="<?php the_permalink(); ?>" class="archive-item-link">

              <!-- アイキャッチ画像 -->
              <img src="<?php the_post_thumbnail_url('large'); ?>" alt="<?php the_title(); ?>" class="archive-item-img">

              <div class="archive-item-body">
                <!-- タイトル部分にディスクリプション（抜粋）を表示 -->
                <h2 class="archive-item-title archive-item-title--works">
                  <?php
                  // 抜粋（手動入力）がある場合はそれを優先して表示
                  if (has_excerpt()) {
                    echo get_the_excerpt();
                  } else {
                    // 抜粋がない場合は本文から取得して加工（80文字制限）
                    $excerpt = get_the_content();
                    $excerpt = strip_tags($excerpt);
                    $excerpt = strip_shortcodes($excerpt);
                    if (mb_strlen($excerpt) > 80) {
                      $excerpt = mb_substr($excerpt, 0, 80) . '...';
                    }
                    echo $excerpt;
                  }
                  ?></h2>
              </div>
            </a>

            <!-- 外部リンクボタンエリア (GitHub / Site) -->
            <div class="archive-item-actions">

              <?php
              // GitHubリンク (カスタムフィールド 'github-link' を想定)
              $github_link = get_field('github-link');
              if ($github_link):
              ?>
                <a href="<?php echo esc_url($github_link); ?>" target="_blank" rel="noopener noreferrer" class="works-btn works-btn--github" aria-label="GitHub">
                  <!-- GitHub Icon -->
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                  </svg>
                  <span>GitHub</span>
                </a>
              <?php endif; ?>

              <?php
              // 制作物リンク (カスタムフィールド 'works-link' を想定)
              $works_link = get_dynamic_url_from_custom_field('works-link');
              if ($works_link) :
              ?>
                <!-- ボタンと認証情報を縦並びにするためのラッパー -->
                <div class="works-btn-group">

                  <a href="<?php echo esc_url($works_link); ?>" target="_blank" rel="noopener noreferrer" class="works-btn works-btn--site">
                    <!-- External Link Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                      <polyline points="15 3 21 3 21 9"></polyline>
                      <line x1="10" y1="14" x2="21" y2="3"></line>
                    </svg>
                    <span>Demo</span>
                  </a>

                  <!-- デモサイト用の認証情報 -->
                  <?php if (get_field('demo-site-true')) : ?>
                    <div class="demo-credentials">
                      ID: demo<br>Pass: demo
                    </div>
                  <?php endif; ?>

                </div>
              <?php endif; ?>

            </div>
          </li>
        <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
    </ul>

    <!-- ページネーション -->
    <?php get_template_part("template-parts/c-pagination-archive", null, array('my_query' => $my_query, 'paged' => $paged)); ?>

  </div>
  <?php get_template_part("template-parts/p-x-follow-me") ?>
</main>

<?php get_footer(); ?>