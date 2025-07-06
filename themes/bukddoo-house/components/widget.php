<?php
$type = $args['type'] ?? '';
$current_month = date('n');

if ($type === 'menu') {
  $menu_list = json_decode(file_get_contents(get_template_directory() . '/assets/data/random-menus.json'), true);
  $menu = $menu_list[array_rand($menu_list)];
  $comment = $menu['comment'];
  $comment_id = 'menu-comment';
}

if ($type === 'seasonal') {
  $seasonal_all = json_decode(file_get_contents(get_template_directory() . '/assets/data/seasonal-foods.json'), true);

  $filtered = array_filter($seasonal_all, function ($item) use ($current_month) {
    return in_array((int)$current_month, $item['months'] ?? []);
  });

  $filtered = array_values($filtered);
  shuffle($filtered);
  $items = array_slice($filtered, 0, 2);
  $comment = $items[0]['comment'] ?? '';
  $comment_id = 'seasonal-comment';
  }
?>

<div class="widget-box" data-widget-type="<?= esc_attr($type) ?>">
<div class="widget-main-content">
    <h3 class="widget-title">
      <?php if ($type === 'menu'): ?>
      오늘 뭐 먹지?
      <?php elseif ($type === 'seasonal'): ?>
        <?= $current_month ?>월이 제철!
      <?php endif; ?>
    </h3>
  
    <div class="widget-content">
      <?php if ($type === 'menu' && isset($menu)): ?>
        <p class="menu-text"><?= esc_html($menu['name']) ?></p>
        <button class="refresh-btn" aria-label="다시 추천"><i class="fa-solid fa-arrow-rotate-right"></i></button>
      <?php elseif ($type === 'seasonal' && !empty($items)): ?>
        <ul class="seasonal-list">
          <?php foreach ($items as $item): ?>
            <li data-comment="<?= esc_attr($item['comment']) ?>">
              <span class="menu-text"><?= esc_html($item['name']) ?></span>
              <div class="food-icon">
                <img src="/assets/icons/seasonal/<?= esc_attr($item['icon']) ?>" alt="<?= esc_attr($item['name']) ?>">
              </div>
            </li>
          <?php endforeach; ?>
        </ul>
      <?php endif; ?>
    </div>
</div>
  <div class="item-comment">
    <i class="fa-regular fa-comment-dots"></i>
    <span id="<?= esc_attr($comment_id) ?>"> <?= esc_html($comment) ?></span></div>
</div>