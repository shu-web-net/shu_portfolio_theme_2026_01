<!-- すべての記事を番号をつけて表示するページネーション -->

<?php
if (isset($args['my_query']) && isset($args['paged'])) {
  $my_query = $args['my_query'];
  $paged = $args['paged'];
}
?>
<!-- ページネーション -->
<?php if (isset($my_query) && isset($paged) && $my_query->max_num_pages > 1) : // 全ページ数が1より大きい場合のみ表示 
?>
  <div class="pagination-archive">
    <?php echo paginate_links(
      array(
        'total' => $my_query->max_num_pages, // 全ページ数
        'current' => $paged, // 現在のページ番号
        "end_size" => 1,
        "mid_size" => 1,
        "prev_next" => true,
        "prev_text" => "<i class='fa-solid fa-angles-left'></i>", // 修正
        "next_text" => "<i class='fa-solid fa-angles-right'></i>", // 修正
      )
    );
    ?>
  </div>
<?php endif; ?>