// 더 이상 사용하지 않음 (페이지네이션으로 전환됨)

document.addEventListener("DOMContentLoaded", function () {
  const loadMoreBtn = document.querySelector(".more-text-group");
  const postList = document.querySelector(".category-post-list");

  if (!loadMoreBtn || !postList) return;

  loadMoreBtn.addEventListener("click", function () {
    const page = parseInt(this.dataset.page, 10);
    const category = this.dataset.category;
    const max = parseInt(this.dataset.max, 10);

    this.disabled = true;
    this.textContent = "불러오는 중...";

    const formData = new FormData();
    formData.append("action", "load_category_posts");
    formData.append("page", page + 1);
    formData.append("category", category);

    fetch(ajaxObj.ajaxurl, {
      method: "POST",
      body: formData,
    })
      .then((res) => res.text())
      .then((html) => {
        if (html.trim()) {
          postList.insertAdjacentHTML("beforeend", html);

          const nextPage = page + 1;
          const newPostCount = nextPage * 6;

          if (newPostCount >= max) {
            loadMoreBtn.remove();
          } else {
            loadMoreBtn.dataset.page = nextPage;
            loadMoreBtn.disabled = false;
            loadMoreBtn.textContent = "더 보기";
          }
        } else {
          loadMoreBtn.remove();
        }
      });
  });
});
