<?php get_template_part('include/header'); ?>

<main>
  <div class="inner">
    <?php if ( in_category('work-roughly') ) {
      get_template_part('contents/category/category-work-roughly');
    } else {
      get_template_part('contents/category/category-default');
    } ?>
    <?php get_template_part('include/sidebar'); ?>
  </div>
</main>

<?php get_template_part('include/footer'); ?>