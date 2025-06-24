<?php
$link = $args['link'] ?? '#';
$text = $args['text'] ?? '더 많은 글';
?>

<a href="<?= esc_url($link); ?>">
  <div class="more-link-btn">
    <?= esc_html($text); ?>
    <i class="fa-solid fa-arrow-right"></i>
  </div>
</a>