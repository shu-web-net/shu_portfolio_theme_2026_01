<!-- header.phpのHTMLなどを読み込む -->
<?php get_header(); ?>

<main class="single">
  <div class="single-inner">

    <?php if (have_posts()) : ?>
      <?php while (have_posts()) : ?>
        <?php the_post(); ?>
        <h1 class="single-title"><?php the_title(); ?></h1>
        <?php get_template_part("template-parts/c-breadcrumb"); ?>


        <!-- アイキャッチの表示 -->
        <?php if (has_post_thumbnail()) : ?>
          <img src="<?php the_post_thumbnail_url('full'); ?>" class="single-thumbnail u-margin-top-30" alt="ポートフォリオ解説記事アイキャッチ画像">
        <?php else: ?>
          <img src="<?php echo get_template_directory_uri() ?>/assets/img/no-image/404-img-01.webp" alt="画像が見つかりません">
        <?php endif; ?>
        <!-- タグ類表示 -->
        <?php get_template_part("template-parts/c-term-tags-lists") ?>




        <!-- ステマ対策 -->
        <span class="stealth-marketing">当サイトはアフィリエイト広告を利用しています</span>
        <!-- single-body -->
        <div class="single-body">
          <div class="single-body-inner">
            <?php the_content(); ?>
            <!-- contents-pagination -->
            <?php get_template_part("template-parts/c-pagination-contents") ?>

          </div>
        </div>
        <!-- /single-body -->
      <?php endwhile; ?>
    <?php endif; ?>

    <?php get_template_part("template-parts/c-pagination-single") ?>

    <?php get_template_part("template-parts/p-x-follow-me") ?>
    <!-- <?php get_template_part("template-parts/p-line") ?> -->

  </div>

</main>


<!-- footer.phpのHTMLなどを読み込む -->
<?php get_footer(); ?>