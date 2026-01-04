<!-- header.phpのHTMLなどを読み込む -->
<?php get_header(); ?>

<main>
  <?php get_template_part("template-parts/home/hero") ?>
  <?php get_template_part("template-parts/home/about") ?>
  <?php get_template_part("template-parts/home/works") ?>
  <?php get_template_part("template-parts/home/journal") ?>
  <?php get_template_part("template-parts/home/contact") ?>



</main>
<?php get_footer(); ?>