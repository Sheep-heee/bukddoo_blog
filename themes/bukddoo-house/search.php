<?php get_template_part('include/header'); ?>

<main>
  <div class="inner">
    <section class="contents-container">
      <?php get_template_part('components/sort-buttton'); ?>

      <?php
      $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;

      $include_notice = isset($_GET['include_notice']);
      $include_review = isset($_GET['include_review']);

      $excluded_slugs = ['notice-on-edge', 'rambling-about-work', 'i-have-to-update'];
      $included_slugs = ['too-many-complaints', 'just-life', 'eat-a-snack'];

      if ($include_notice) $included_slugs[] = 'notice-on-edge';
      if ($include_review) $included_slugs[] = 'rambling-about-work';

      $included_cat_ids = array();
      foreach ($included_slugs as $slug) {
        $term = get_category_by_slug($slug);
        if ($term) $included_cat_ids[] = $term->term_id;
      }

      $args = array(
        'post_type'      => 'post',
        's'              => get_search_query(),
        'posts_per_page' => 6,
        'paged'          => $paged,
        'category__in'   => $included_cat_ids,
      );

      $search_query = new WP_Query($args);

      if ($search_query->have_posts()) :
        echo '<ul class="search-post-list">';
        while ($search_query->have_posts()) : $search_query->the_post();
          get_template_part('components/list-post-card');
        endwhile;
        echo '</ul>';

        echo '<div class="pagination-wrap">';
        echo paginate_links(array(
          'total'   => $search_query->max_num_pages,
          'current' => $paged,
          'mid_size' => 2,
          'prev_text' => '<i class="fa-solid fa-angles-left"></i>',
          'next_text' => '<i class="fa-solid fa-angles-right"></i>',
        ));
        echo '</div>';

      else :
        get_template_part('components/empty-bowl');
      endif;

      wp_reset_postdata();
      ?>
    </section>
    <?php get_template_part('include/sidebar'); ?>
  </div>
</main>

<?php get_template_part('include/footer'); ?>