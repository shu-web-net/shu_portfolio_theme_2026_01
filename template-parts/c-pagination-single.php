  <!-- 前後投稿記事へのリンク -->
  <div class="pagination-single">
    <?php
    $prev_post = get_previous_post();
    if ($prev_post) :
    ?>
      <a href="<?php echo esc_url(get_permalink($prev_post->ID)); ?>" rel="prev" class="pagination-single-prev">
        <span>前の記事<span class="u-sp-hide">へ</span></span>
      </a>
    <?php endif; ?>
    <!-- 一覧ページのURL -->
    <a href="<?php echo home_url("/blog"); ?>" class="pagination-single-list">記事一覧</a>
    <?php
    $next_post = get_next_post();
    if ($next_post) :
    ?>
      <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" class="pagination-single-next"><span>次の記事<span class="u-sp-hide">へ</span></span></a>
    <?php endif; ?>
  </div>