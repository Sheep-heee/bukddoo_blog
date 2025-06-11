<?php get_header(); ?>

<main class="main-container">
  <!-- 여기에 콘텐츠 영역 (홈, 카테고리, 검색 등) -->
  <section class="home-section">
    <?php get_template_part('components/post-card'); ?>
  </section>
</main>

<?php get_footer(); ?>