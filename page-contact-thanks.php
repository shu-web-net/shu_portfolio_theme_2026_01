<?php
/*
Template Name: Contact Thanks
*/
?>


<!-- header.phpのHTMLなどを読み込む -->
<?php get_header(); ?>

<main class="contact-thanks">

  <div class="l-inner">

    <div class="contact-thanks-img-container"><img src="<?php echo get_template_directory_uri() ?>/assets/img/contact-thanks/thank-you-5077738_640-min.jpg" alt="Contact thanks" class="contact-thanks-img" width="600" height="600" loading="lazy" />
      <span class="contact-thanks-img-copy">Image by <a href="https://pixabay.com/users/alexas_fotos-686414/?utm_source=link-attribution&utm_medium=referral&utm_campaign=image&utm_content=5077738">Alexa</a> from <a href="https://pixabay.com//?utm_source=link-attribution&utm_medium=referral&utm_campaign=image&utm_content=5077738">Pixabay</a></span>
    </div>

    <h1 class="contact-thanks-title">お問い合わせありがとうございます</h1>
    <p class="contact-thanks-text">3日以内にメールにて回答させていただきます。</p>
    <p class="contact-thanks-text">3日を過ぎても回答がない場合は、メールアドレスの間違いの可能性もあるため、<br />お手数ですが<a href="https://x.com/shu_web_net" class="contact-thanks-x-link">こちらのXから</a>DMで再度お問い合わせください。</p>
    <span class="back-to-home-contact-thanks"><a href="<?php echo home_url(); ?>" class="back-to-home-contact-thanks-link">ホームへ戻るにはこちら</a></span>

  </div>
</main>
<!-- footer.phpのHTMLなどを読み込む -->
<?php get_footer(); ?>
