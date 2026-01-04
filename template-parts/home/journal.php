<!-- Journal Section (formerly Blog) -->
<section id="blog" class="section">
  <div class="l-container">
    <div class="section__header u-fade-in-up">
      <span class="section__subtitle">03. Insights</span>
      <h2 class="section__title">Journal</h2>
      <div style="width: 60px; height: 4px; background: var(--accent-primary); border-radius: 2px;"></div>
    </div>

    <div class="journal__list">
      <?php
      $my_query = new WP_Query(
        array(
          'post_type'      => 'post',
          'posts_per_page' => 3,
        )
      );
      ?>
      <?php if ($my_query->have_posts()) : ?>
        <?php while ($my_query->have_posts()) : ?>
          <?php $my_query->the_post(); ?>

          <a href="<?php the_permalink(); ?>" class="journal-item u-fade-in-up">
            <time class="journal-item__date" datetime="<?php the_time('c'); ?>"><?php the_time('Y.n.j'); ?></time>

            <div class="journal-item__content">
              <h3 class="journal-item__title"><?php echo wp_trim_words(get_the_title(), 40, '…'); ?></h3>

              <ul class="journal-item__tags">
                  <?php
                  $post_tags = get_the_tags();
                  if ($post_tags) {
                    foreach ($post_tags as $tag) {
                      echo '<li class="journal-item__tag">' . esc_html($tag->name) . '</li>';
                    }
                  }
                  ?>
              </ul>
            </div>

            <div class="journal-item__arrow">read.md -></div>
          </a>

        <?php endwhile; ?>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
    </div>

    <div class="journal__view-all u-fade-in-up">
      <a href="blog.html" class="view-all-link">View All Articles -></a>
    </div>
  </div>
</section>