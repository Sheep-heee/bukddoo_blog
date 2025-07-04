<?php
$type = $args['type'] ?? '';
$current_month = date('n');

if ($type === 'menu') {
  $menu_list = json_decode(file_get_contents(get_template_directory() . '/assets/data/random-menus.json'), true);
  $menu = $menu_list[array_rand($menu_list)];
}

if ($type === 'seasonal') {
  $seasonal_all = json_decode(file_get_contents(get_template_directory() . '/assets/data/seasonal-foods.json'), true);
  $filtered = array_filter($seasonal_all, function ($item) use ($current_month) {
  return isset($item['comment']) && strpos($item['comment'], "{$current_month}월") !== false;
  });

  $filtered = array_values($filtered);
  shuffle($filtered);
  $items = array_slice($filtered, 0, 3);
  }
?>

<div class="widget-box" data-widget-type="<?= esc_attr($type) ?>">
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
          <li>
            <img src="/assets/icons/seasonal/<?= esc_attr($item['icon']) ?>" alt="<?= esc_attr($item['name']) ?>">
            <span><?= esc_html($item['name']) ?></span>
          </li>
        <?php endforeach; ?>
      </ul>
      <p class="item-comment"><?= esc_html($items[0]['comment']) ?></p>
    <?php endif; ?>
  </div>
</div>