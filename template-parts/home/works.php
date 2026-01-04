<!-- Works Section -->
<section id="works" class="section">
  <div class="l-container">
    <div class="section__header u-fade-in-up">
      <span class="section__subtitle">02. Portfolio</span>
      <h2 class="section__title">Featured Projects</h2>
      <div style="width: 60px; height: 4px; background: var(--accent-primary); border-radius: 2px;"></div>
    </div>

    <div class="works__grid">

      <?php

      // 投稿ループ用の WP_Query
      $my_query = new WP_Query(
        array(
          'tag_slug__in' => array('pickup'), // 取得したいタグのスラッグを指定
          'posts_per_page' => 3, // 1ページあたりの表示件数
        )
      );

      if ($my_query->have_posts()) :
        while ($my_query->have_posts()) : $my_query->the_post();
      ?>
          <article class="work-card u-fade-in-up">
            <div class="work-card__image-wrapper">
              <img src="" alt="Medical Site" class="work-card__image">
              <!-- アイキャッチの表示 -->
              <?php if (has_post_thumbnail()) : ?>
                <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="制作物サムネイル" class="work-card__image">
              <?php else: ?>
                <img src="<?php echo get_template_directory_uri() ?>/assets/img/no-image/no-image.png" alt="画像が見つかりません" class="work-card__image">
              <?php endif; ?>
            </div>
            <div class="work-card__content">
              <div class="work-card__tech-stack">
                <?php
                // この投稿に紐づく標準のタグを取得
                $post_tags = get_the_tags();
                if ($post_tags) {
                  // 取得したタグをループしてリンク付きで表示
                  foreach ($post_tags as $tag) {
                    echo '<span class="tech-pill">' . esc_html($tag->name) . '</span>';
                  }
                }
                ?>
              </div>
              <h3 class="work-card__title"><?php echo get_the_title(); ?></h3>
              <p class="work-card__desc">
                <?php
                $excerpt = get_the_excerpt();
                if (mb_strlen($excerpt) > 60) {
                  $excerpt = mb_substr($excerpt, 0, 60) . '...';
                }
                echo $excerpt;
                ?>
              </p>

              <div class="work-card__links">
                <a href="" class="text-link" target="_blank" rel="noopener noreferrer">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                  </svg>
                  GitHub
                </a>
                <a href="#" class="text-link" target="_blank" rel="noopener noreferrer">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                    <polyline points="15 3 21 3 21 9"></polyline>
                    <line x1="10" y1="14" x2="21" y2="3"></line>
                  </svg>
                  Visit Site
                </a>
              </div>
            </div>
          </article>
      <?php
        endwhile;
        wp_reset_postdata(); // クエリのリセット
      else :
        echo '投稿が見つかりませんでした。';
      endif;
      ?>



      <article class="work-card u-fade-in-up">
        <div class="work-card__image-wrapper">
          <img src="https://images.unsplash.com/photo-1576091160399-112ba8d25d1d?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Medical Site" class="work-card__image">
        </div>
        <div class="work-card__content">
          <div class="work-card__tech-stack">
            <span class="tech-pill">HTML5</span>
            <span class="tech-pill">SCSS</span>
            <span class="tech-pill">JavaScript</span>
          </div>
          <h3 class="work-card__title">Dental Clinic LP</h3>
          <p class="work-card__desc">信頼感を重視した歯科医院のランディングページ。ファーストビューの離脱率を下げるアニメーション実装と、予約導線の最適化。</p>

          <div class="work-card__links">
            <a href="#" class="text-link" target="_blank" rel="noopener noreferrer">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
              </svg>
              GitHub
            </a>
            <a href="#" class="text-link" target="_blank" rel="noopener noreferrer">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                <polyline points="15 3 21 3 21 9"></polyline>
                <line x1="10" y1="14" x2="21" y2="3"></line>
              </svg>
              Visit Site
            </a>
          </div>
        </div>
      </article>

      <article class="work-card u-fade-in-up" style="transition-delay: 0.1s">
        <div class="work-card__image-wrapper">
          <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Corporate Site" class="work-card__image">
        </div>
        <div class="work-card__content">
          <div class="work-card__tech-stack">
            <span class="tech-pill">WordPress</span>
            <span class="tech-pill">PHP</span>
            <span class="tech-pill">MySQL</span>
          </div>
          <h3 class="work-card__title">Hair Salon Corporate</h3>
          <p class="work-card__desc">美容室のブランドサイト。クライアント側でスタッフ更新が容易に行えるよう、管理画面をカスタマイズ実装。</p>

          <div class="work-card__links">
            <a href="#" class="text-link" target="_blank" rel="noopener noreferrer">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
              </svg>
              GitHub
            </a>
            <a href="#" class="text-link" target="_blank" rel="noopener noreferrer">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                <polyline points="15 3 21 3 21 9"></polyline>
                <line x1="10" y1="14" x2="21" y2="3"></line>
              </svg>
              Visit Site
            </a>
          </div>
        </div>
      </article>

      <article class="work-card u-fade-in-up" style="transition-delay: 0.2s">
        <div class="work-card__image-wrapper">
          <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Dashboard App" class="work-card__image">
        </div>
        <div class="work-card__content">
          <div class="work-card__tech-stack">
            <span class="tech-pill">Next.js</span>
            <span class="tech-pill">TypeScript</span>
          </div>
          <h3 class="work-card__title">SaaS Dashboard UI</h3>
          <p class="work-card__desc">管理画面のUIコンポーネント実装。Atomic Designに基づいた再利用性の高い設計と、ダークモード対応。</p>

          <div class="work-card__links">
            <a href="#" class="text-link" target="_blank" rel="noopener noreferrer">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
              </svg>
              GitHub
            </a>
            <a href="#" class="text-link" target="_blank" rel="noopener noreferrer">
              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                <polyline points="15 3 21 3 21 9"></polyline>
                <line x1="10" y1="14" x2="21" y2="3"></line>
              </svg>
              Visit Site
            </a>
          </div>
        </div>
      </article>
    </div>

    <div class="journal__view-all u-fade-in-up">
      <a href="works.html" class="view-all-link">View All Projects -></a>
    </div>
  </div>
</section>