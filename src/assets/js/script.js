jQuery(function() { // <-- この中にすべての処理をまとめる

  // ヘッダーspナビボタン
  const navBtn = jQuery("#js-header__nav-sp-button");
  navBtn.on("click", function () {
    jQuery(this).toggleClass("is-open");
    jQuery("#js-header__container").toggleClass("is-open");
    // 注意: 以下の要素がHTMLに存在するか確認してください。
    jQuery("#js-header__container__logo-container").toggleClass("is-open");
    jQuery("#js-header__container__logo-container-white").toggleClass("is-open");
    jQuery("#js-header__nav-sp").toggleClass("is-open");
    jQuery("body").toggleClass("overflow-hidden");
  });

  // to-topボタン
  jQuery(window).on("scroll", function () {
    const scrollTop = jQuery(this).scrollTop();
    const showTopBtn = jQuery("#js-to-top");

    // 要素が存在しない場合でもエラーにならないように .length でチェックするのが安全だが、
    // 今回の指示によりチェックは省略
    if (scrollTop >= 300) {
      showTopBtn.fadeIn(300);
    } else {
      showTopBtn.fadeOut(300);
    }
  });

  jQuery("#js-to-top").on("click", function () {
    jQuery("html, body").animate({ scrollTop: 0 }, 500);
  });

  // ヘッダースライドイン (元々 jQuery(function(){}) 内にあった処理)
  let lastScroll = 0;
  jQuery(window).on("scroll", function () { // .scroll() は非推奨なので .on("scroll", ...) を推奨
    let currentScroll = jQuery(window).scrollTop();
    let header = jQuery("#js-header");
    let headerHeight = header.outerHeight(); // 要素が存在しない場合 null.outerHeight() でエラーになる可能性

    // 要素が存在しない場合のエラーを防ぐため、header.length チェックが推奨される
    if (header.length) { // header要素が存在する場合のみ実行（安全のため追加を推奨しますが、指示通りコメントアウトはしません）
      if (currentScroll <= 0) {
        header.css("top", "0");
      } else if (currentScroll > lastScroll) {
        // スクロールダウン時
        if (currentScroll > headerHeight) { // ヘッダーの高さを超えてから隠す
           header.css("top", -headerHeight + "px");
        }
      } else {
        // スクロールアップ時
        header.css("top", "0");
      }
    }
    lastScroll = currentScroll;
  });

  // swiperスライダー
  // Swiperのコンテナ要素が存在しないページでエラーになる可能性がある
  const frontPageSwiper = new Swiper("#js-mv__slider", {
    // // ↓↓↓ この lazy オプションを追加します ↓↓↓
    // lazy: {
    //   loadPrevNext: true, // 表示スライドの前後も読み込む設定
    // },

    spaceBetween: 140,
    slidesPerView: 1,
    loop: true,
    speed: 1500,
    autoplay: {
      delay: 3000, // スライドが切り替わるまでの時間（ミリ秒）
      disableOnInteraction: false, // ユーザーが操作した後も自動再生を続けるかどうか
    },
    // loopedSlides: 3,
    centeredSlides: true,
    pagination: {
      el: ".mv__slider-pagination", // 要素が存在しない場合エラーになる可能性
    },
    navigation: {
      nextEl: ".mv__slider-next", // 要素が存在しない場合エラーになる可能性
      prevEl: ".mv__slider-prev", // 要素が存在しない場合エラーになる可能性
    },
  });


  // .hidden-element (Vanilla JS)
  const elements = document.querySelectorAll('.hidden-element');
  // elements が NodeList であり、存在しない場合は空の NodeList([]) になるため、
  // .length チェックなしでも forEach はエラーにならないことが多いが、念のため。
  function checkVisibility() {
    elements.forEach(element => {
      const elementTop = element.getBoundingClientRect().top;
      const windowHeight = window.innerHeight;

      // 要素が画面内に入ってきたら 'visible-element' クラスを追加
      if (elementTop < windowHeight * 0.8) { // 画面の下80%に入ったら表示
        element.classList.add('visible-element');
      }
    });
  }

  // スクロールイベントリスナーを追加
  window.addEventListener('scroll', checkVisibility);

  // 初回ロード時にもチェック (DOM Ready 後なので安全)
  checkVisibility();

}); // <-- jQuery(function() { ... }) の閉じタグ
