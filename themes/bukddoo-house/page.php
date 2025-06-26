<?php //home ?>
<?php get_template_part('include/header'); ?>

<main>
  <div class="main-container inner">
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
              <h3>📌 소리있는 아우성</h3>
              <div class="marker"></div>
            </div>
            <a href="<?= esc_url($notice['permalink']) ?>">
              <div class="notice-post-info">
                <div class="notice-text">
                  <div class="notice-post-title-area">
                    <h4 class="notice-post-title"><?= esc_html($notice['title']) ?></h4>
                    <p class="notice-date"><?= esc_html($notice['date']) ?></p>
                  </div>
                  <p class="notice-excerpt"><?= esc_html($notice['excerpt']) ?></p>
                </div>
                <?php
                  $images = $notice['images'];
                  $total = count($images);
                  
                  if ($total === 1) {
                    echo '<div class="notice-images row-image">';
                    echo '<div class="image-wrap">' . $images[0] . '</div>';
                    echo "</div>";
                  } elseif ($total <= 4) {
                    echo '<div class="notice-images row-image">';
                    foreach ($images as $img) {
                      echo '<div class="image-wrap">' . $img . '</div>';
                    }
                    echo "</div>";
                  } else {
                    echo '<div class="notice-images grid-image">';

                    echo '<div class="image-wrap main-image">' . $images[0] . '</div>';

                    if ($total === 5) {
                      for ($i = 1; $i <= 4; $i++) {
                        echo '<div class="image-wrap sub-image">' . $images[$i] . '</div>';
                      }

                    } else {
                      for ($i = 1; $i <= 3; $i++) {
                        echo '<div class="image-wrap sub-image">' . $images[$i] . '</div>';
                      }
                      $remain = $total - 4; // 총 4장만 출력했으므로
                      echo '<div class="image-wrap sub-image notice-image-box">+' . $remain . '</div>';
                    }

                    echo '</div>';
                  }
                  ?>
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
      <div class="gallery">
        <?php render_work_section(5, "home"); ?>
      </div>
    </section>
    <section class="who-is-bukddoo">
      <div class="title introduce">
        벅뚜가 뉘신지?
      </div>
      <div class="introduce-contact">
        <div class="first-block profile">
          <div class="profile-area">
            <div class="img-box no-bg">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/profile.png" alt="profile image">
            </div>
            <div class="intro_text_area">
              <div class="desc_group">
                <p>뚜벅이. 직장인. 수인분당선을 영원히 기다림.</p>
                <p>글 쓰고 그림 그리고 디자인하고 영상 편집하고 코드 치는, 하고 싶은게 너무 많음.</p>
                <p>말 없는 조용한 학생으로 살아와 그 반동으로 지금은 계속 주절주절.</p>
                <p>서른 되기 전에 대통령 선거 3번 치룸. (오버스펙)</p>
                <p>주식, 코인, 부동산, 술, 담배, 커피 관심無. 맑은 정신의 노동 소득만이 최고의 가치.</p>
              </div>
            </div>
          </div>
          <div class="qna-area">
            <button class="qna-item">
              <i class="fa-solid fa-comment"><span>Q</span></i>
              <span class="question-text">뭐하시는 분이세요?</span>
              <div class="answer-box">
                본업은 이것저것하는 디자이너입니다. (직장인)
              </div>
            </button>
            <button class="qna-item">
              <i class="fa-solid fa-comment"><span>Q</span></i>
              <span class="question-text">MBTI 뭐에요?</span>
              <div class="answer-box">
                INTJ 입니다. (MBTI과몰입금지)
              </div>
            </button>
            <button class="qna-item">
              <i class="fa-solid fa-comment"><span>Q</span></i>
              <span class="question-text">술담커 안하면 어케 살아요?</span>
              <div class="answer-box">
                제 피는 얼큰수육국밥입니다.
              </div>
            </button>
          </div>
        </div>
        <div class="contact">
          <div class="contact-text-area">
            <h3>도적이 되고 싶은 자는<br />나에게...</h3>
            <p class="sub-text">형법 제329조(절도) : 타인의 재물을 절취한 자는 6년 이하의 징역 또는 1천만원 이하의 벌금에 처한다.</p>
          </div>
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
    </section>
  </div>
</main>

<?php get_template_part('include/footer'); ?>