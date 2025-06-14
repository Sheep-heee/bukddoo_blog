<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>다 먹고 살자고 하는 짓이다 | BUKDDOO BLOG</title>

  <meta property="og:title" content="<?php the_title(); ?> | BUKDDOO BLOG">
  <meta property="og:description" content="<?php bloginfo('description'); ?>">
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php echo esc_url(get_permalink()); ?>">
  <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/assets/images/common/og-default-img.jpg">

  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.ico" type="favicon">

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>