<?php get_template_part('include/header'); ?>

<div class="main-container">
  <div class="inner-container">
      <main class="contents-container">
        <?php if ( in_category('work-roughly') ) {
        get_template_part('contents/category/category-work-roughly');
      } else {
        get_template_part('contents/category/category-default');
      } ?>
      </main>
      <?php get_template_part('include/sidebar'); ?>
  </div>
</div>

<?php get_template_part('include/footer'); ?>