<div class="contents-container">
  <form id="sort-form">
    <label for="sort-order" class="visually-hidden">정렬 방식</label>
    <select id="sort-order" name="sort">
      <option value="new" selected>최신순</option>
      <option value="old">오래된순</option>
    </select>
  </form>
  <ul class="category-post-list" id="ajax-post-list">
    <?php
    $query = new WP_Query(array(
      'post_type' => 'post',
      'posts_per_page' => 6,
      'paged' => 1,
      'category_name' => get_queried_object()->slug
    ));

    $post_count = 0;

    if ($query->have_posts()) :
      while ($query->have_posts()) :
        $query->the_post();
        get_template_part('components/list-post-card');
        $post_count++;
      endwhile;
      wp_reset_postdata();
    endif;

    $empty_slots = 6 - $post_count;
    for ($i = 0; $i < $empty_slots; $i++) {
      get_template_part('components/no-post-message');
    }
    ?>
  </ul>

  <div class="load-more-wrap">
    <button id="load-more-btn">더보기</button>
  </div>
</div>