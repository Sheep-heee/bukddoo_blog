<?php
$category = get_queried_object();
$slug = $category->slug;

$paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;

$query = new WP_Query(array(
  'post_type'      => 'post',
  'posts_per_page' => 6,
  'paged'          => $paged,
  'category_name'  => $slug,
));
?>

<div class="contents-container">
  <?php get_template_part('components/sort-buttton'); ?>

  <ul class="category-post-list">
    <?php
    if ($query->have_posts()) :
      while ($query->have_posts()) :
        $query->the_post();
        get_template_part('components/list-post-card');
      endwhile;
    else :
      get_template_part('components/empty-bowl');
    endif;
    ?>
  </ul>

  <?php
  if ($query->max_num_pages > 1) :
    echo '<div class="pagination-wrap">';
    echo paginate_links(array(
      'total'     => $query->max_num_pages,
      'current'   => $paged,
      'mid_size'  => 2,
      'prev_text' => '<i class="fa-solid fa-angles-left"></i>',
      'next_text' => '<i class="fa-solid fa-angles-right"></i>',
    ));
    echo '</div>';
  endif;

  wp_reset_postdata();
  ?>
</div>