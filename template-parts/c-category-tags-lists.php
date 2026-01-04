  <!-- カテゴリーの表示 -->
  <?php
  $categories = get_the_category(); // 投稿に紐づくカテゴリーを取得
  if ($categories && !is_wp_error($categories)) :
    echo '<div class="category-tags single-tags">';
    foreach ($categories as $category) {
      $category_link = get_category_link($category->term_id); // カテゴリーのアーカイブページへのリンクを取得
      if (!is_wp_error($category_link)) { // リンクがエラーでないか確認
        echo '<a class="category-tag single-tag-link" href="' . esc_url($category_link) . '">' . esc_html($category->name) . '</a>';
      }
    }
    echo '</div>';
  endif;
  ?>
  <!-- タグの表示 -->
  <?php
  $tags = get_the_tags(); // 投稿に紐づくタグを取得
  if ($tags && !is_wp_error($tags)) :
    echo '<div class="tag-tags single-tags">';
    foreach ($tags as $tag) {
      $tag_link = get_tag_link($tag->term_id); // タグのアーカイブページへのリンクを取得
      if (!is_wp_error($tag_link)) { // リンクがエラーでないか確認
        echo '<a class="tag-tag single-tag-link" href="' . esc_url($tag_link) . '">' . esc_html($tag->name) . '</a>';
      }
    }
    echo '</div>';
  endif;
  ?>