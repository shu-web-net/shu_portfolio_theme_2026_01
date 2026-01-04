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


    <div class="page-privacy-body u-margin-top-30">

      <div class="page-privacy-text">


        <!-- privacy-body -->
        <div class="privacy-body">
          <?php the_content(); // 本文の表示 
          ?>

        </div><!-- privacy-body -->


      </div>
    </div>

  </div>
</main>

<?php get_footer(); ?>