<section class="lists-posts">
  <div class="lists-posts-inner l-inner u-margin-top-50">
    <?php $args = array(
      "heading-jp" => "ブログ一覧",
      "heading-en" => "Blog",
      "link" => "/blog",
    ) ?>
    <?php get_template_part("template-parts/c-heading", "link", $args) ?>


    <!-- searchform.phpファイルに記述されたコードを読み込む -->
    <!-- php search-form html widget template
        php search-form css widget template と組み合わせて使う -->
    <?php get_search_form(); ?>


    <ul class="lists-posts-list u-margin-top-30">
      <?php
      $my_query = new WP_Query(
        array(
          'post_type' => 'post',
          'posts_per_page' => 6,
        )
      );
      ?>
      <?php if ($my_query->have_posts()) : ?>
        <?php while ($my_query->have_posts()) : ?>
          <?php $my_query->the_post(); ?>
          <li class="lists-posts-item hidden-element">
            <a href="<?php the_permalink(); ?>">
              <img src="<?php the_post_thumbnail_url('full'); ?>" alt="ブログ投稿アイキャッチ画像" class="lists-posts-item-img">
              <div class="lists-posts-item-body">
                <h2 class="lists-posts-item-title"><?php echo wp_trim_words(get_the_title(), 30, '…'); ?></h2>
                <p class="lists-posts-item-excerpt">
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
  </div>
</section>