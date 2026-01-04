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
  <header class="header" id="js-header">
    <div class="header__container" id="js-header__container">
      <!-- サイトのトップページのみサイトタイトルロゴをh1にし、下層ページでは別にh1を置けるようにする -->
      <?php if (is_front_page() || is_home()) : ?>
        <h1 class="site-title"><a href="<?php echo home_url('/'); ?>" class="site-title-link">しゅう【Webサイト制作/コーダー】<br class="site-title_br" />のPortfolio Site</a></h1>
      <?php else : ?>
        <p class="site-title"><a href="<?php echo home_url('/'); ?>" class="site-title-link">しゅう【Webサイト制作/コーダー】<br class="site-title_br" />のPortfolio Site</a></p>
      <?php endif; ?>


      <!-- PC版nav -->
      <nav class="header__nav-pc-container">
        <ul class="header__nav-list-pc">
          <li class="header__nav-list-pc-item is-home">
            <a href="<?php echo home_url("/profile"); ?>" class="header__nav-list-pc-item-link">

              <span class="header__nav-list-pc-text">自己紹介</span>
            </a>
          </li>

          <li class="header__nav-list-pc-item">
            <a href="<?php echo home_url('/works'); ?>" class="header__nav-list-pc-item-link">


              <span class="header__nav-list-pc-text">制作物一覧</span>
            </a>
          </li>
          <li class="header__nav-list-pc-item">
            <a href="<?php echo home_url('/blog'); ?>" class="header__nav-list-pc-item-link">


              <span class="header__nav-list-pc-text">ブログ一覧</span>
            </a>
          </li>
          <li class="header__nav-list-pc-item">
            <a href="https://x.com/shu_web_net" target="_blank" rel="noopener" class="header__nav-list-pc-item-link">
              <span class="header__nav-list-pc-text">X【Twitter】</span>
            </a>
          </li>
          <!-- <li class="header__nav-list-pc-item">
            <a href="https://lin.ee/SVDSqDK" target="_blank" rel="noopener" class="header__nav-list-pc-item-link">
              <span class="header__nav-list-pc-text">公式ライン</span>
            </a>
          </li> -->
          <li class="header__nav-list-pc-item is-contact">
            <a href="<?php echo home_url('/contact'); ?>" class="header__nav-list-pc-item-link ">
              <span class="header__nav-list-pc-text">お問い合わせ</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- ハンバーガーメニューボタン -->
      <button
        type="button"
        id="js-header__nav-sp-button"
        class="header__nav-sp-button">
        <span class="header__nav-sp-button-line"></span>
        <span class="header__nav-sp-button-line"></span>
        <span class="header__nav-sp-button-line"></span>
      </button>
    </div>
    <!-- \\PC版nav -->

    <!-- スマホ版nav -->
    <nav class="header__nav-container-sp" id="js-header__nav-sp">
      <ul class="header__nav-list-sp">
        <li class="header__nav-list-sp-item">
          <a href="<?php echo home_url("/profile"); ?>" class="header__nav-list-sp-item-link">
            <span class="header__nav-list-sp-text">自己紹介</span>
          </a>
        </li>

        <li class="header__nav-list-sp-item">
          <a href="<?php echo home_url('/works'); ?>" class="header__nav-list-sp-item-link">
            <span class="header__nav-list-sp-text">制作物一覧</span>
          </a>
        </li>
        <li class="header__nav-list-sp-item">
          <a href="<?php echo home_url('/blog'); ?>" class="header__nav-list-sp-item-link">
            <span class="header__nav-list-sp-text">ブログ一覧</span>
          </a>
        </li>
        <li class="header__nav-list-sp-item">
          <a href="https://x.com/shu_web_net" target="_blank" rel="noopener" class="header__nav-list-sp-item-link">
            <span class="header__nav-list-sp-text">X【Twitter】</span>
          </a>
        </li>
        <!-- <li class="header__nav-list-sp-item">
          <a href="https://lin.ee/SVDSqDK" target="_blank" rel="noopener" class="header__nav-list-sp-item-link">
            <span class="header__nav-list-sp-text">公式ライン</span>
          </a>
        </li> -->
        <li class="header__nav-list-sp-item is-contact">
          <a href="<?php echo home_url('/contact'); ?>" class="header__nav-list-sp-item-link">
            <span class="header__nav-list-sp-text">お問い合わせ</span>
          </a>
        </li>
      </ul>
    </nav>
  </header>