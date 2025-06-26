<aside class="right-panel">
  <?php
  if (is_search() || is_category('work-roughly')) {
    get_template_part('include/sidebar/sidebar-filter');
  } elseif (is_single() && in_category('work-roughly')) {
    get_template_part('include/sidebar/sidebar-detail-work');
  } else {
    get_template_part('include/sidebar/sidebar-default');
  }
?>
롸로라~~롸
</aside>