document.addEventListener("DOMContentLoaded", function () {
  const refreshBtn = document.querySelector(".refresh-btn");
  const menuText = document.querySelector(".menu-text");
  const menuComment = document.getElementById("menu-comment");

  if (!refreshBtn || !menuText || !menuComment) return;

  refreshBtn.addEventListener("click", () => {
    fetch("/wp-content/themes/bukddoo-house/assets/data/random-menus.json")
      .then((res) => res.json())
      .then((data) => {
        const random = data[Math.floor(Math.random() * data.length)];
        menuText.textContent = random.name;
        menuComment.textContent = random.comment;
      });
  });
});
