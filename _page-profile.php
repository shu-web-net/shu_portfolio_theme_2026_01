<?php
/*
Template Name: Profile
*/
?>

<?php get_header(); ?>

<main class="page-profile-main">
  <div class="page-profile-inner">
    <?php $args = array(
      "heading-jp" => "自己紹介",
      "heading-en" => "Profile",
    ) ?>
    <?php get_template_part("template-parts/c-heading-h1", null, $args) ?>


    <div class="page-profile-body u-margin-top-30">
      <div class="page-profile-img">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/profile/プロフィール画像南国-min_png.png" alt="しゅう【Webコーダー】のプロフィール画像" class="page-profile-img-img" width="400" height="400">
      </div>
      <div class="page-profile-text">
        <p class="page-profile-text-name">しゅう<br />｜安心感を届けるWebコーダー安心感を届けるWebコーダー</p>

        <!-- profile-body -->
        <div class="profile-body">
          <?php the_content(); // 本文の表示 
          ?>
          <?php
          // 改ページを有効にするための記述
          wp_link_pages(
            array(
              'before' => '<nav class="entry-links">',
              'after' => '</nav>',
              'link_before' => '',
              'link_after' => '',
              'next_or_number' => 'number',
              'separator' => '',
            )
          );
          ?>
        </div><!-- /entry-body -->

        <?php get_template_part("template-parts/p-x-follow-me") ?>



        <!-- <?php get_template_part("template-parts/p-line") ?> -->


      </div>
    </div>

  </div>
</main>

<?php get_footer(); ?>