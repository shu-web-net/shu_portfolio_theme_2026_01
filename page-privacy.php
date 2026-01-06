<?php
/*
Template Name: privacy-policy
*/
?>

<?php get_header(); ?>

<main class="page-privacy-main">
  <div class="page-privacy-inner">
    <?php $args = array(
      "heading-jp" => "プライバシーポリシー",
      "heading-en" => "Privacy Policy",
    ) ?>
    <?php get_template_part("template-parts/c-heading-h1", null, $args) ?>


    <!-- page-privacy-body -->
    <div class="page-privacy-body">
      <div class="page-privacy-text">
        <div class="privacy-body">
          <?php the_content(); // 本文の表示 
          ?>
        </div>
      </div>
    </div>
    <!-- /page-privacy-body -->


  </div>
</main>

<?php get_footer(); ?>