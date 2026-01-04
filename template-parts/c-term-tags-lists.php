  <!-- タームの表示 -->
  <?php
  $terms = get_the_terms(get_the_ID(), 'genre'); // タクソノミー名を指定

  if ($terms && ! is_wp_error($terms)) :
    echo '<div class="term-tags single-tags">';
    foreach ($terms as $term) {
      $term_link = get_term_link($term->term_id, 'genre'); // タームの投稿一覧ページへのリンクを取得
      if (! is_wp_error($term_link)) { // リンクがエラーでないか確認
        echo '<a class="term-tag single-tag-link" href="' . esc_url($term_link) . '">' . esc_html($term->name) . '</a>';
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