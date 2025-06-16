<?php get_template_part('include/header'); ?>

<main class="main-container">
  <section>
    <article class="inner-container">
      <div class="contents_feed post">
        <div class="six">
          <h4>최신형 투덜거림</h4>
          <div class="complaints-content">
            <?php render_category_section("too-many-complaints", "large", 1, "main-large-list"); ?>
          </div>
        </div>
        <div class="four">
          <div class="life">
            <h4>그냥 사는 사람의 근황</h4>
            <div class="life-contents">
              <?php render_category_section("just-life", "small", 2, "main-small-list"); ?>
            </div>
          </div>
          <div class="media">
            <h4>최근에 찍먹한 미디어</h4>
            <div class="media-content">
              <?php render_category_section("eat-a-snack", "small", 1, "main-small-list"); ?>
            </div>
          </div>
        </div>
      </div>
    </article>
  </section>
  <section>
    <article class="inner-container">
      <div class="contents_feed about">
        <div class="three">
          <?php $notice = get_latest_notice_data(); ?>
          <?php if ($notice): ?>
            <a href="<?= esc_url($notice['permalink']) ?>">
              <article class="notice-post">
                <h3>📌 내 거친 생각과 불안한 공지</h3>
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
                    <h4 class="notice-title"><?= esc_html($notice['title']) ?></h4>
                    <p class="notice-date"><?= esc_html($notice['date']) ?></p>
                  </div>
                  <p class="notice-excerpt"><?= esc_html($notice['excerpt']) ?></p>
                </div>
              </article>
            </a>
          <?php endif; ?>
        </div>
        <div class="seven">
          <div class="introduction">
            <div class="img-box no-bg">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/profile.png" alt="profile image">
            </div>
            <div class="intro_text_area">
              <h3 class="small_title">벅뚜가 뉘신지?</h3>
              <div class="desc_group">
                <p>뚜벅이. 직장인. 수인분당선을 영원히 기다림.</p>
                <p>글 쓰고 그림 그리고 디자인하고 영상 편집하고 코드 치는, 하고 싶은게 너무 많음.</p>
                <p>말 없는 조용한 학생으로 살아와 그 반동으로 지금은 계속 주절주절.</p>
                <p>서른 되기 전에 대통령 선거 3번 치룸. (오버스펙)</p>
                <p>주식, 코인, 부동산, 술, 담배, 커피 관심無. 맑은 정신의 노동 소득만이 최고의 가치.</p>
              </div>
            </div>
          </div>
          <div class="contact">
            <h3 class="small_title">도적이 되고 싶은 자는 나에게...</h3>
            <ul class="contact_item">
              <a href="mailto:sheephi0609&#64;gmail.com">
                <li>
                  <i class="fa-regular fa-envelope"></i>
                  <p>sheephi0609&#64;gmail.com</p>
                </li>
              </a>
                <a href="https://x.com/rolling_bukddoo" target="_blank" rel="noopener noreferrer">
                  <li>
                    <i class="fa-brands fa-x-twitter"></i>
                    <p>@rolling_bukddoo</p>
                  </li>
                </a>
                <a href="https://www.instagram.com/rolling_bukddoo" target="_blank" rel="noopener noreferrer">
                  <li>
                    <i class="fa-brands fa-instagram"></i>
                    <p>rolling_bukddoo</p>
                  </li>
                </a>
            </ul>
          </div>
        </div>
      </div>
    </article>
  </section>
</main>

<?php get_template_part('include/footer'); ?>