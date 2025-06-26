<?php
  $context = $args['context'] ?? 'default';
  $is_home = ($context === 'home');

  $wrapper_tag = $is_home ? 'article' : 'li';
  $wrapper_class = $is_home ? 'main-post-card is-empty' : 'no-post-default is-empty';
?>

<<?= $wrapper_tag ?> class="<?= esc_attr($wrapper_class) ?>">
<div class="no-post">
  <div class="no-post-icon">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/no-post.svg" alt="글이 없어서 드러누운 뚜뚜" />
  </div>
  <div class="no-post-text">글이 없어요.</div>
</div>
</<?= $wrapper_tag ?>>