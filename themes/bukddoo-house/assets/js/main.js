// TODO: 모바일에서는 공지사항 블럭을 .main-content 상단으로 이동시킬 것
// 참고: PC에선 footer 바로 위에 있음
// 조건: window.innerWidth <= 768px 기준으로 판단

document.addEventListener('DOMContentLoaded', () => {
const title = document.querySelector('.notice-text');
const excerpt = document.querySelector('.notice-excerpt')

if (excerpt && title)
  excerpt.addEventListener('mouseenter', () => {
    title.classList.add('excerpt-hover');
  });
  excerpt.addEventListener('mouseleave', () => {
    title.classList.remove('excerpt-hover');
  })
});