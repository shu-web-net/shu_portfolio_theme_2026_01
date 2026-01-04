<?php
/*
Template Name: 404 Not Found
*/
?>


<!-- header.phpのHTMLなどを読み込む -->
<?php get_header(); ?>

<main class="error-404-page">

  <div class="l-inner">

    <div class="error-404-page-img-container"><img src="<?php echo get_template_directory_uri() ?>/assets/img/404/error-404-page-img.jpg" alt="404 Not Found" class="error-404-page-img" width="600" height="600" loading="lazy" />
      <a href="https://jp.freepik.com/free-vector/oops-404-error-with-broken-robot-concept-illustration_8030430.htm">著作者：storyset／出典：Freepik</a>
    </div>
    
    <h1 class="error-404-page-title">404 Not Found</h1>
    <p class="error-404-page-text">お探しのページは見つかりませんでした。<br />URLが間違っているか、<br class="u-pc-hide" />ページが削除された可能性があります。</p>
    <span class="back-to-home-404"><a href="<?php echo home_url(); ?>" class="back-to-home-404-link">ホームへ戻るにはこちら</a></span>

  </div>
</main>
<!-- footer.phpのHTMLなどを読み込む -->
<?php get_footer(); ?>