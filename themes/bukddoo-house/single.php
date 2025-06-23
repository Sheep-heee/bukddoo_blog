<?php get_template_part('include/header'); ?>


<?php if ( in_category('work-roughly') ) : ?>
  <main class="work-detail-container">
    <?php get_template_part('contents/single/single-work-roughly'); ?>
  </main>
  <?php get_template_part('include/sidebar'); ?>
<?php else : ?>
  <main>
    <?php get_template_part('contents/single/single-default'); ?>
  </main>
<?php endif; ?>

<?php get_template_part('include/footer'); ?>