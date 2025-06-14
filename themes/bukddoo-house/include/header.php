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

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div class="wrapper">
  <header class="main-container">
    <section>
      <div class="inner-container">
        <div class="banner_container">
          다 먹고 살자고 하는 짓이다
          <div>
            <img src="#" alt="character">
            뚜벅뚜벅
          </div>
        </div>
      </div>
    </section>
    <section>
      <div class="inner-container">
        <nav class="nav-container">
          <ul class="nav-list">
            <li class="<?php if ( is_front_page() ) echo 'active'; ?>"><a href="<?php echo home_url(); ?>">HOME</a></li>
            <li class="<?php if ( is_category('too-many-complaints') ) echo 'active'; ?>"><a href="<?php echo get_category_link( get_category_by_slug('too-many-complaints')->term_id ); ?>">방구석 투덜이</a></li>
            <li class="<?php if ( is_category('just-life') ) echo 'active'; ?>"><a href="<?php echo get_category_link( get_category_by_slug('just-life')->term_id ); ?>">그냥 사는 얘기</a></li>
            <li class="<?php if ( is_category('eat-a-snack') ) echo 'active'; ?>"><a href="<?php echo get_category_link( get_category_by_slug('eat-a-snack')->term_id ); ?>">미디어 리뷰</a></li>
            <li class="<?php if ( is_category('work-roughly') ) echo 'active'; ?>"><a href="<?php echo get_category_link( get_category_by_slug('work-roughly')->term_id ); ?>">WORK</a></li>
          </ul>
          <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
            <div class="search-input-box">
              <input type="search" name="s" placeholder="뭘 찾고 있나요?" value="<?php echo is_search() ? get_search_query() : ''; ?>" />
              <button type="button" class="clear-btn"><i class="fa-solid fa-circle-xmark"></i></button>
            </div>
            <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
          </form>
        </nav>
      </div>
    </section>
  </header>