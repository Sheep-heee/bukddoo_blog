// TODO: 모바일에서는 공지사항 블럭을 .main-content 상단으로 이동시킬 것
// 참고: PC에선 footer 바로 위에 있음
// 조건: window.innerWidth <= 768px 기준으로 판단

const input = document.getElementById("searchInput");
const clearBtn = document.getElementById("clearButton");

clearBtn.addEventListener("click", () => {
  input.value = "";
  input.focus();
});