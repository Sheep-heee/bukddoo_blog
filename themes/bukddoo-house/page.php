<?php //home ?>
<?php get_template_part('include/header'); ?>

<main>
  <div class="inner">
    <section class="intro-notice">
      <div class="first-block intro">
        <div class="rice-banner">
          다 먹고 살자고 하는 짓이다
          <div>
            <img src="https://placehold.co/70" alt="character">
            뚜벅뚜벅
          </div>
        </div>
        <div class="one-word-banner">
          <i class="fa-regular fa-hand-point-up"></i>
          <div class="main-word">
            <span class="large-word">복잡한 세상에서 살아남는 <?= esc_html(get_survival_tip_count()); ?>가지 방법</span>
            <span class="small-word">을 저도 알고 싶어요.</span>
          </div>
        </div>
      </div>
      <div class="notice">
        <?php $notice = get_latest_notice_data(); ?>
        <?php if ($notice): ?>
          <article class="notice-post">
            <div class="notice-title">
              <h3>📌 내 거친 생각과 불안한 공지</h3>
              <div class="marker"></div>
            </div>
            <a href="<?= esc_url($notice['permalink']) ?>">
              <div class="notice-post-info">
                <div class="notice-images">
                  <?php
                  $img_count = count($notice['images']);
                  if ($img_count <= 4) {
                    foreach ($notice['images'] as $img) {
                      echo '<div class="image-wrap">' . $img . '</div>';
                    }
                  } else {
                    for ($i = 0; $i < 3; $i++) {
                      echo '<div class="image-wrap">' . $notice['images'][$i] . '</div>';
                    }
                    $remain = $img_count - 3;
                    echo '<div class="image-wrap notice-image-box">+' . $remain . '</div>';
                  }
                  ?>
                </div>
                <div class="notice-text">
                  <div class="notice-post-title-area">
                    <h4 class="notice-post-title"><?= esc_html($notice['title']) ?></h4>
                    <p class="notice-date"><?= esc_html($notice['date']) ?></p>
                  </div>
                  <p class="notice-excerpt"><?= esc_html($notice['excerpt']) ?></p>
                </div>
              </div>
            </a>
          </article>
        <?php endif; ?>
      </div>
    </section>
    <section class="latest-post">
      <div class="first-block complaints">
        <div class="title post">
          최신형 투덜거림
          <?php
            get_template_part('components/more-link-button', null, array(
              'link' => '/category/too-many-complaints'
            ));
            ?>
        </div>
        <?php render_category_section("too-many-complaints", "large", 1); ?>
      </div>
      <div class="life">
        <div class="title post">
          그냥 사는 사람의 근황
          <?php
            get_template_part('components/more-link-button', null, array(
              'link' => '/category/just-life'
            ));
          ?>
        </div>
        <?php render_category_section("just-life", "small", 2); ?>
        <div class="title post">
          최근에 찍먹한 미디어
          <?php
            get_template_part('components/more-link-button', null, array(
              'link' => '/category/eat-a-snack'
            ));
          ?>
        </div>
        <?php render_category_section("eat-a-snack", "small", 1); ?>
      </div>
    </section>
    <section class="latest-work">
      <div class="title post">
        따끈따끈 신규 작업물
          <?php
            get_template_part('components/more-link-button', null, array(
              'link' => '/category/work-roughly',
              'text' => '더 많은 일'
            ));
          ?></div>
      <div class="gallery"></div>
    </section>
    <section class="who-is-bukddoo">
      <div class="title introduce">
        벅뚜가 뉘신지?
      </div>
      <div class="introduce-contact">
        <div class="first-block profile"></div>
        <div class="contact"></div>
      </div>
    </section>
  </div>
</main>

<?php get_template_part('include/footer'); ?>