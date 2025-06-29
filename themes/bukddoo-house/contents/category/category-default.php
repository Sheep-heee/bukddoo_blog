<?php
$category = get_queried_object();
$slug = $category->slug;
?>

<div class="contents-container">
  <?php get_template_part('components/sort-buttton'); ?>

  <ul class="category-post-list" id="ajax-post-list">
    <?php
    $query = new WP_Query(array(
      'post_type' => 'post',
      'posts_per_page' => 6,
      'paged' => 1,
      'category_name' => $slug
    ));

    if ($query->have_posts()) :
      while ($query->have_posts()) :
        $query->the_post();
        get_template_part('components/list-post-card');
      endwhile;
      wp_reset_postdata();
    else :
      get_template_part('components/empty-bowl');
    endif;
    ?>
  </ul>

  <?php if ($query->found_posts > 6) : ?>
    <div class="load-more-wrap">
      <button class="more-text-group" data-page="1" data-category="<?php echo esc_attr($slug); ?>">
        <i class="fa-solid fa-plus"></i>
        <span>더보기</span>
      </button>
    </div>
  <?php endif; ?>
</div>