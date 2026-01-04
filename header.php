<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shu | Web Developer Portfolio</title>

  <!-- favicon -->
  <link rel="icon" href="<?php echo get_template_directory_uri() ?>/assets/img/profile/プロフィール画像スタイリッシュ.ico" type="image/x-icon" />
  <!-- appleのアイコンはpngで指定必須 -->
  <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri() ?>/assets/img/profile/プロフィール画像スタイリッシュ.ico" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@300;400;600&family=Noto+Sans+JP:wght@400;500;700&display=swap" rel="stylesheet">

  <?php wp_head(); ?>
</head>

<body>
  <!-- ツールバー表示時に上部にマージン追加してツールバーとかぶるの予防 -->
  <?php if (is_admin_bar_showing()) : ?>
    <style type="text/css">
      .header {
        margin-top: 32px;
      }

      @media screen and (max-width: 780px) {
        .header {
          margin-top: 46px;
        }
      }

      @media screen and (max-width: 600px) {
        #wpadminbar {
          position: fixed !important;
        }
      }
    </style>
  <?php endif; ?>


  <!-- ページのアクセス数カウント -->
  <?php if (!is_user_logged_in() && !is_bot()) {
    setPostViews(get_the_ID());
  } ?>
  <!-- ヘッダー -->

  <!-- Background Elements -->
  <div class="bg-effect__noise"></div>
  <div class="bg-effect__grid"></div>
  <div class="bg-glow bg-glow--primary"></div>
  <div class="bg-glow bg-glow--secondary"></div>

  <header class="header">
    <div class="header__logo">
      <span class="header__logo-sub">~/</span>Shu<span class="header__logo-accent">_Portfolio</span>
    </div>

    <!-- Desktop Nav -->
    <nav class="nav-desktop">
      <ul class="nav-desktop__list">
        <li><a href="#about" class="nav-desktop__link">01. About</a></li>
        <li><a href="#works" class="nav-desktop__link">02. Works</a></li>
        <li><a href="#blog" class="nav-desktop__link">03. Blog</a></li>
        <li><a href="#contact" class="nav-desktop__link">04. Contact</a></li>
        <li>
          <a href="https://twitter.com" target="_blank" rel="noopener noreferrer" class="nav-desktop__link nav-desktop__link--icon-only" aria-label="X (Twitter)">
            <svg viewBox="0 0 24 24" fill="currentColor" style="width: 18px; height: 18px; margin-top: 2px;">
              <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"></path>
            </svg>
          </a>
        </li>
      </ul>
    </nav>

    <!-- Hamburger Button -->
    <button class="hamburger" aria-label="Menu">
      <span class="hamburger__line"></span>
      <span class="hamburger__line"></span>
      <span class="hamburger__line"></span>
    </button>
  </header>

  <!-- Mobile Nav Overlay -->
  <nav class="nav-mobile">
    <ul class="nav-mobile__list">
      <li><a href="#about" class="nav-mobile__link">01. About</a></li>
      <li><a href="#works" class="nav-mobile__link">02. Works</a></li>
      <li><a href="#blog" class="nav-mobile__link">03. Blog</a></li>
      <li><a href="#contact" class="nav-mobile__link">04. Contact</a></li>
      <li>
        <a href="https://twitter.com" target="_blank" rel="noopener noreferrer" class="nav-mobile__link" style="display:inline-flex; align-items:center; gap:10px;">
          Twitter
          <svg viewBox="0 0 24 24" fill="currentColor" style="width: 24px; height: 24px;">
            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"></path>
          </svg>
        </a>
      </li>
    </ul>
  </nav>