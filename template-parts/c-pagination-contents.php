<!-- ↓投稿個別記事に2ページ目以降がある場合のページネーション、使う時はコメント解除 -->
<?php
$pagination = wp_link_pages(
  array(
    'before' => '<div class="contents-pagination">',
    'after' => '</div>',
    'link_before' => '<span class="post-page-numbers">',
    'link_after' => '</span>',
    'next_or_number' => 'number',
    'separator' => ' ',
    'echo' => 0, // ページネーションを直接出力しない
  )
);
?>
<?php if ($pagination) : ?>
  <div class="pagination-contents-wrap">
    <p class="pagination-contents-text">Page Nav</p>
    <?php echo $pagination; ?>
  </div>
<?php endif; ?>
<!-- /contents-pagination -->
