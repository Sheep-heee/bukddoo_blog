<?php
$search_keyword = get_search_query();
$total_found = $wp_query->found_posts;
$formatted_count = number_format($total_found);
?>

<div class="side-filter-header">
  <div class="side-filter-title-area">
    <h2 class="side-filter-headline">
      <i class="fa-solid fa-magnifying-glass"></i>&nbsp;찾았다! “<span class="accent"><?php echo esc_html($search_keyword); ?></span>”
    </h2>
    <p class="side-filter-result-count">
      <span class="accent"><?php echo $formatted_count; ?></span>개의 글이 있어요.
    </p>
  </div>
  <div class="filter-head">
    <div class="filter-icon">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/filter.svg" alt="filter icon">
    </div>
    <span>더 정밀한 검색</span>
  </div>
</div>

<form method="get" action="" class="filter-form">
  <input type="hidden" name="s" value="<?php echo esc_attr(get_search_query()); ?>" />
  <section class="filter-section">
    <h3 class="filter-title">카테고리 필터</h3>
    <div class="filter-options">
    <?php
    $filter_cats = [
      'too-many-complaints' => '방구석 투덜이',
      'just-life' => '그냥 사는 얘기',
      'eat-a-snack' => '미디어 리뷰',
      'notice-on-edge' => '공지사항',
      'rambling-about-work' => '작업 회고',
    ];
    $selected_cats = $_GET['category_filter'] ?? [];

    $default_active_slugs = ['too-many-complaints', 'just-life', 'eat-a-snack'];
    $no_filter_selected = empty($selected_cats);


    foreach ($filter_cats as $slug => $label) :
      $is_checked = (
        (is_array($selected_cats) && in_array($slug, $selected_cats)) ||
        ($no_filter_selected && in_array($slug, $default_active_slugs))
      );
      $active_class = $is_checked ? 'filter-active' : '';
    ?>
      <label class="<?php echo $active_class; ?>">
        <input type="checkbox" name="category_filter[]" value="<?php echo esc_attr($slug); ?>"
          <?php echo $is_checked ? 'checked' : ''; ?>>
        <?php echo esc_html($label); ?>
      </label>
    <?php endforeach; ?>
    </div>
  </section>

  <section class="filter-section">
    <h3 class="filter-title">작성일 필터</h3>
    <div class="filter-options">
      <?php $active_date = $_GET['date_filter'] ?? ''; ?>
      <label class="<?php echo ($active_date === '' || $active_date === 'all') ? 'filter-active' : ''; ?>">
        <input type="radio" name="date_filter" value="all" <?php checked($active_date, 'all'); if ($active_date === '') echo ' checked'; ?>> 전체
      </label>
      <label class="<?php echo ($active_date === '1week') ? 'filter-active' : ''; ?>"><input type="radio" name="date_filter" value="1week" <?php checked($active_date, '1week'); ?>> 1주일 이내</label>
      <label class="<?php echo ($active_date === '1month') ? 'filter-active' : ''; ?>"><input type="radio" name="date_filter" value="1month" <?php checked($active_date, '1month'); ?>> 1달 이내</label>
      <label class="<?php echo ($active_date === '1year') ? 'filter-active' : ''; ?>"><input type="radio" name="date_filter" value="1year" <?php checked($active_date, '1year'); ?>> 1년 이내</label>
      <label  class="<?php echo ($active_date === 'custom') ? 'filter-active' : ''; ?>"><input type="radio" name="date_filter" value="custom" <?php checked($active_date, 'custom'); ?>> 직접 입력</label>
    </div>

    <?php if (($_GET['date_filter'] ?? '') === 'custom') : ?>
    <div class="date-input-wrapper">
      <input type="date" name="start_date" value="<?php echo esc_attr($_GET['start_date'] ?? '') ?>" />
      <span>~</span>
      <input type="date" name="end_date" value="<?php echo esc_attr($_GET['end_date'] ?? '') ?>" />
    </div>
    <?php endif; ?>
  </section>

  <section class="filter-section">
    <h3 class="filter-title">검색 범위 필터</h3>
    <div class="filter-options">
      <?php $target = $_GET['search_target'] ?? ''; ?>
      <label class="<?php echo ($target === '' || $target === 'title_content') ? 'filter-active' : ''; ?>">
        <input type="radio" name="search_target" value="title_content" <?php checked($target, 'title_content'); if ($target === '') echo ' checked'; ?>> 제목 + 내용
      </label>
      <label class="<?php echo ($target === 'title') ? 'filter-active' : ''; ?>"><input type="radio" name="search_target" value="title" <?php checked($target, 'title'); ?>> 제목</label>
      <label class="<?php echo ($target === 'content') ? 'filter-active' : ''; ?>"><input type="radio" name="search_target" value="content" <?php checked($target, 'content'); ?>> 내용</label>
    </div>
  </section>

  <section class="filter-section">
    <h3 class="filter-title">태그 필터</h3>
    <input type="text" name="tag_keyword" value="<?php echo esc_attr($_GET['tag_keyword'] ?? '') ?>" placeholder="찾는 태그가 있나요?" class="tag-search-input" />
    <div class="filter-options">
      <!-- 추후: 추천 태그 리스트 자동완성으로 JS 처리 -->
    </div>
  </section>
</form>