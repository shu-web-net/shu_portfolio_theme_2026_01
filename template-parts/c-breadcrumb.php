<!-- プラグインのBreadcrumb NavXTの関数。
 Breadcrumb NavXTインストール必要なので注意！ -->
  <!-- breadcrumb -->
  <?php if (function_exists("bcn_display")) : ?>
    <div class="breadcrumb">
       <?php bcn_display(); ?>
    </div>
  <?php endif; ?><!-- /breadcrumb -->