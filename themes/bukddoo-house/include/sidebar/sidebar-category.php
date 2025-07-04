<div class="list-side-content">
  <div class="category-info">
    <h3 class="category-title"><?php single_cat_title(); ?></h3>
    <p class="category-description"><?php echo category_description(); ?></p>
  </div>

  <?php get_template_part('components/widget', null, ['type' => 'menu']); ?>
  <?php get_template_part('components/widget', null, ['type' => 'seasonal']); ?>
</div>