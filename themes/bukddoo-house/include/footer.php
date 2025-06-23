  <footer>
    <div class="inner">
      <div class="info">
        <div class="copyright">
          &copy;&nbsp;<?= date("Y"); ?>.&nbsp;벅뚜
          <span>|</span>
          <a href="/privacy-policy" class="privacy">개인정보 처리방침</a>
          <span>|</span>
            <ul class="footer-icon-area">
              <?php if ( !is_front_page() ) : ?>
                <a href="mailto:sheephi0609&#64;gmail.com"><i class="fa-regular fa-envelope"></i></a>
                <a href="https://x.com/rolling_bukddoo" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-x-twitter"></i></a>
                <a href="https://www.instagram.com/rolling_bukddoo" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram"></i></a>
              <?php endif; ?>
              <a href="https://github.com/Sheep-heee" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-github"></i></a>
            </ul>
          </div>
        <span class="slogan">
            규칙적인 식사와 적정 수면 시간, 철저한 위생 관리가 인간을 인간답게 만든다.
        </span>
      </div>
      <div class="log">
        <a href="/category/i-have-to-update">v 1.0.0 (250600 release)</a>
      </div>
    </div>
  </footer>
  <?php wp_footer(); ?>
</body>
</html>