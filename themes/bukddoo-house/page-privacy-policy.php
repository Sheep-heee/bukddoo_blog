<?php get_template_part('include/header'); ?>

<main class="main-container">
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <section>
      <div class="inner-container">
        <div class="privacy-container">
          <h1><?php the_title(); ?></h1>
          <div class="content">
            <?php the_content(); ?>
          </div>
        </div>
      </div>
    </section>
  <?php endwhile; endif; ?>
</main>

<?php get_template_part('include/footer'); ?>