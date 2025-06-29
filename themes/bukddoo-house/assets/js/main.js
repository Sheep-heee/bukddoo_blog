const input = document.getElementById("searchInput");
const clearBtn = document.getElementById("clearButton");

clearBtn.addEventListener("click", () => {
  input.value = "";
  input.focus();
});

document.addEventListener("DOMContentLoaded", function () {
  const loadMoreBtn = document.querySelector(".more-text-group");

  if (!loadMoreBtn) return;

  loadMoreBtn.addEventListener("click", function () {
    const page = parseInt(this.dataset.page, 10);
    const category = this.dataset.category;

    this.disabled = true;
    this.textContent = "불러오는 중...";

    fetch("/wp-admin/admin-ajax.php", {
      method: "POST",
      headers: {
        "Content-Type": "application/x-www-form-urlencoded",
      },
      body: new URLSearchParams({
        action: "load_more_category_posts",
        page: page + 1,
        category: category,
      }),
    })
      .then((res) => res.text())
      .then((html) => {
        const postList = document.querySelector(".category-post-list");

        if (html.trim()) {
          postList.insertAdjacentHTML("beforeend", html);
          loadMoreBtn.dataset.page = page + 1;
          loadMoreBtn.disabled = false;
          loadMoreBtn.textContent = "더 보기";
        } else {
          loadMoreBtn.remove();
        }
      })
      .catch((err) => {
        console.error("AJAX 에러:", err);
        loadMoreBtn.disabled = false;
        loadMoreBtn.textContent = "더 보기";
      });
  });
});
