<!-- mv  -->
<section class="mv">
  <p class="site-description">あなたのためのウェブサイトを<br class="u-pc-hidden" />作成、改良いたします</p>
  
  <!-- Slider main container -->
  <div class="swiper mv__slider" id="js-mv__slider">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper mv__slider-wrapper">
      <?php
      $my_query = new WP_Query(
        array(
          'post_type'      => 'works',
          'posts_per_page' => -1,
        )
      );
      ?>
      <?php if ($my_query->have_posts()) : ?>
        <?php while ($my_query->have_posts()) : ?>
          <?php $my_query->the_post(); ?>
          <div class="swiper-slide">
            <img class="mv__slider-slide-img" src="<?php the_post_thumbnail_url('full'); ?>" alt="ポートフォリオ解説記事アイキャッチ画像" width="2320" height="1040" loading="lazy">
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
    </div>
    <!-- If we need pagination -->
    <div class="swiper-pagination mv__slider-pagination"></div>

    <!-- If we need navigation buttons -->
    <div class="swiper-button-prev mv__slider-prev" aria-label="前の画像へ">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path d="M512 256A256 256 0 1 0 0 256a256 256 0 1 0 512 0zM271 135c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-87 87 87 87c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0L167 273c-9.4-9.4-9.4-24.6 0-33.9L271 135z" />
      </svg>
    </div>
    <div class="swiper-button-next mv__slider-next" aria-label="次の画像へ">
      <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
        <path d="M0 256a256 256 0 1 0 512 0A256 256 0 1 0 0 256zM241 377c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l87-87-87-87c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0L345 239c9.4 9.4 9.4 24.6 0 33.9L241 377z" />
      </svg>
    </div>
  </div>
</section>