<?php $title = $args; ?>
<div class="heading-link-container">
  <a href="<?php echo esc_url(home_url($title["link"])); ?>" class="heading-link">
    <h2 class="heading heading-jp"><?php echo $title["heading-jp"] ?></h2>
    <div class="heading-underline"></div>
    <p class="heading heading-en"><?php echo $title["heading-en"] ?></p>
  </a>
</div>
