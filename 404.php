<?php
/*
Template Name: 404 Not Found
*/
?>


<!-- header.phpのHTMLなどを読み込む -->
<?php get_header(); ?>


<main class="error-section">
  <div class="error-content">
    <!-- Glitch 404 -->
    <h1 class="error-title" data-text="404">404</h1>

    <p class="error-subtitle">System.Error(Page_Not_Found)</p>

    <!-- Code Mockup -->
    <div class="error-code-wrapper">
      <div class="code-mockup">
        <div class="code-mockup__header">
          <div class="code-mockup__dot"></div>
          <div class="code-mockup__dot"></div>
          <div class="code-mockup__dot"></div>
          <span style="margin-left:10px; font-size:0.8rem; color:#666">console — zsh</span>
        </div>
        <div class="code-mockup__body">
          <span class="code-line"><span class="cl-purple">const</span> <span class="cl-blue">targetUrl</span> = <span class="cl-string">"<?php echo get_pagenum_link(); ?>"</span>;</span>
          <span class="code-line"><span class="cl-purple">if</span> (!<span class="cl-blue">exists</span>(targetUrl)) {</span>
          <span class="code-line" style="padding-left: 1.2em;"><span class="cl-purple">throw</span> <span class="cl-purple">new</span> <span class="cl-blue">Error</span>(<span class="cl-string">"404: Page not found"</span>);</span>
          <span class="code-line">}</span>
          <br>
          <span class="code-line"><span class="cl-red">> Uncaught Error: 404: Page not found</span></span>
          <span class="code-line"><span class="cl-gray">at /var/www/html/server.js:404:12</span></span>
          <span class="code-line"><span class="cl-green">> initiating_recovery_sequence...</span><span style="animation: blink 1s infinite">_</span></span>
        </div>
      </div>
    </div>

    <div class="error-text">
      <p>アクセスしようとしたページは削除されたか、<br>URLが変更されている可能性があります。</p>
    </div>

    <a href="/" class="btn btn--primary">
      Return to Home
    </a>
  </div>
</main>

<!-- footer.phpのHTMLなどを読み込む -->
<?php get_footer(); ?>