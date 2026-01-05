<?php
/*
Template Name: Contact
*/
?>

<!-- header.phpのHTMLなどを読み込む -->
<?php get_header(); ?>
<main>
  <section class="l-container">
    <div class="page-header u-fade-in-up">
      <span class="page-header__sub">04. Contact</span>
      <h1 class="page-header__title">Get In Touch</h1>
      <div class="page-header__line"></div>
    </div>

    <div class="contact-wrapper">
      <!-- Left Side: Information -->
      <div class="contact-info u-fade-in-up" style="transition-delay: 0.1s">
        <p class="contact-info__text">
          新規プロジェクトのご依頼、開発のご相談、その他ご質問などございましたら、お気軽にお問い合わせください。<br>
          3営業日以内に返信いたします。
        </p>

        <div class="info-item">
          <div class="info-item__icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
              <polyline points="22,6 12,13 2,6"></polyline>
            </svg>
          </div>
          <div class="info-item__content">
            <h4>Email</h4>
            <a href="mailto:info@shu-web.net" class="info-item__link">
              <p>info@shu-web.net</p>
            </a>
          </div>
        </div>

        <div class="info-item">
          <div class="info-item__icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path>
            </svg>
          </div>
          <div class="info-item__content">
            <h4>Twitter (X)</h4>
            <a href="https://x.com/shu_web_net" class="info-item__link">
              <p>@Shu_Dev</p>
            </a>
          </div>
        </div>

        <div class="sns-links">
          <a href="#" class="sns-link" aria-label="GitHub">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
            </svg>
          </a>
        </div>
      </div>

      <!-- Right Side: Form -->
      <?php
      echo do_shortcode('[contact-form-7 id="a1e1d64" title="スタイリッシュデザインお問い合わせフォーム"]');
      ?>
    </div>
  </section>
</main>
<?php get_footer(); ?>