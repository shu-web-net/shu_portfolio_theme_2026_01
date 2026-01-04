<!-- footer -->
<footer class="footer u-margin-top-100">

  <div class="footer-inner">
    <p class="footer-title">しゅう<br class="u-pc-hidden" />｜安心感を届けるWebコーダー <br class="u-pc-hidden" />Portfolio Site</p>

    <nav class="footer-nav">
      <ul class="footer-nav-list">
        <li class="footer-nav-item"><a href="<?php echo esc_url(home_url("/")); ?>">Home</a></li>
        <li class="footer-nav-item"><a href="<?php echo esc_url(home_url("/profile")); ?>">Profile</a></li>
        <li class="footer-nav-item"><a href="<?php echo esc_url(home_url("/works")); ?>">Works</a></li>
        <li class="footer-nav-item"><a href="<?php echo esc_url(home_url("/blog")); ?>">Blog</a></li>
        <li class="footer-nav-item"><a href="https://x.com/shu_web_net">X【Twitter】</a></li>
        <!-- <li class="footer-nav-item"><a href="https://lin.ee/SVDSqDK">公式Line</a></li> -->
        <li class="footer-nav-item"><a href="<?php echo esc_url(home_url("/contact")); ?>">お問い合わせ</a></li>
      </ul>
    </nav>
    <div class="footer-privacy"><a href="<?php echo home_url("/privacy"); ?>" class="privacy-link">Privacy Policy</a></div>
    <small class="copy">&copy;しゅう｜安心感を届けるWebコーダー</small>
  </div>

  <!-- topに戻るボタン -->
  <?php get_template_part("template-parts/c-to-top") ?>

</footer>


<!-- jsなどのscriptを読み込み -->
<?php wp_footer(); ?>

</body>

</html>