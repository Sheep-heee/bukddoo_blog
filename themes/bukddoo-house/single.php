<?php get_template_part('include/header'); ?>


<?php if ( in_category('work-roughly') ) : ?>
  <div class="main-container">
    <div class="inner-container">
      <main class="work-detail-container">
        <?php get_template_part('contents/single/single-work-roughly'); ?>
      </main>
      <?php get_template_part('include/sidebar'); ?>
    </div>
  </div>
<?php else : ?>
  <main class="main-container">
    <?php get_template_part('contents/single/single-default'); ?>
  </main>
<?php endif; ?>

<?php get_template_part('include/footer'); ?>