<?php get_template_part('include/header'); ?>

<main class="main-container">
  <?php if ( in_category('work') ) {
  get_template_part('single-work-roughly');
} else {
  get_template_part('single-default');
} ?>
</main>

<?php get_template_part('include/footer'); ?>