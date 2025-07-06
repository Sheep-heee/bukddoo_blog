<div class="list-side-content">
  <div class="category-info">
    <h3 class="category-title"><?php single_cat_title(); ?></h3>
    <div class="category-description"><?php echo category_description(); ?></div>
  </div>

  <?php get_template_part('components/widget', null, ['type' => 'menu']); ?>
  <div class="seasonal-widget-area">
    <?php get_template_part('components/widget', null, ['type' => 'seasonal']); ?>
    <p>※ 출하지역에 따라 제철 날짜가 다를 수 있어요.</p>
  </div>
</div>