<section class="lists-works">
  <div class="lists-works-inner l-inner u-margin-top-50">
    <?php $args = array(
      "heading-jp" => "制作物一覧",
      "heading-en" => "Works",
      "link" => "/works",
    ) ?>
    <?php get_template_part("template-parts/c-heading", "link", $args) ?>

    <ul class="lists-works-list u-margin-top-30">
      <?php
      $my_query = new WP_Query(
        array(
          'post_type' => 'works', // 投稿タイプを指定
          'posts_per_page' => -1, // すべての投稿を取得
        )
      );
      ?>
      <?php if ($my_query->have_posts()) : ?>
        <?php while ($my_query->have_posts()) : ?>
          <?php $my_query->the_post(); ?>
          <li class="lists-works-item hidden-element">
            <a href="<?php the_permalink(); ?>">
              <img src="<?php the_post_thumbnail_url('full'); ?>" alt="ポートフォリオ解説記事アイキャッチ画像" class="lists-works-item-img">
              <div class="lists-works-item-body">
                <h2 class="lists-works-item-title"><?php echo wp_trim_words(get_the_title(), 25, '…'); ?></h2>
                <p class="lists-works-item-excerpt">
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

            // 値が存在する場合のみ、リンクと関連情報を表示
            if ($works_link) :
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
  </div>
</section>