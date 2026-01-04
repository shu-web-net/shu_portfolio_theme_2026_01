<div class="all-tags-list-wrap">
  <p class="all-tags-list-title">Blogタグ一覧</p>
    <ul class="all-tags-list">
        <?php
        // 全てのタグを取得
        $all_tags = get_tags();

        if (!empty($all_tags)) {
            foreach ($all_tags as $tag) {
                echo '<li class="all-tags-item"><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a></li>';
            }
        } else {
            echo '<li class="all-tags-item">タグがありません</li>';
        }
        ?>
    </ul>
</div>
