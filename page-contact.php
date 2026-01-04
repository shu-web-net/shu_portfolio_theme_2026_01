<?php
/*
Template Name: Contact
*/
?>

<!-- header.phpのHTMLなどを読み込む -->
<?php get_header(); ?>
<main class="contact-main">

  <?php $args = array(
    "heading-jp" => "お問い合わせ",
    "heading-en" => "Contact",
  ) ?>
  <?php get_template_part("template-parts/c-heading-h1", null, $args) ?>

  <div class="contact-body u-margin-top-30">
    <div class="contact-form">
      <?php echo do_shortcode('[contact-form-7 id="aa6aa2b" title="お問い合わせ"]'); ?>
    </div><!-- /contact-form -->
  </div><!-- /contact-body -->

  <div class="contact-privacy">Privacy Policyは<a href="<?php echo home_url("/privacy"); ?>" class="privacy-link">こちら</a></div>

  <?php get_template_part("template-parts/p-x-follow-me") ?>


  <?php get_template_part("template-parts/p-line") ?>


</main>
<?php get_footer(); ?>