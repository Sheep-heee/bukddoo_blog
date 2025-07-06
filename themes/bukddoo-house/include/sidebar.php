<aside class="right-panel">
<?php
if (is_category('work-roughly')) {
  get_template_part('include/sidebar/sidebar-filter-work');
} elseif (is_search()) {
  get_template_part('include/sidebar/sidebar-filter-search');
} elseif (is_single() && in_category('work-roughly')) {
  get_template_part('include/sidebar/sidebar-detail-work');
} elseif (is_single()) {
  get_template_part('include/sidebar/sidebar-single');
} else {
  get_template_part('include/sidebar/sidebar-category');
}
?>
</aside>