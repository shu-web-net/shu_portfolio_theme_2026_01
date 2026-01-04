<!-- header.phpのHTMLなどを読み込む -->
<?php get_header(); ?>

<main class="page-index-main">
  <?php get_template_part("template-parts/p-mv-slider") ?>

  <?php get_template_part("template-parts/p-lists-works") ?>

  <?php get_template_part("template-parts/p-lists-posts") ?>

  <?php get_template_part("template-parts/p-tags-list") ?>

  <?php get_template_part("template-parts/p-x-follow-me") ?>
  <!-- <?php get_template_part("template-parts/p-line") ?> -->


</main>
<?php get_footer(); ?>