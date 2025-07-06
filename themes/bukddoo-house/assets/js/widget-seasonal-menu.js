document.addEventListener("DOMContentLoaded", function () {
  const seasonalList = document.querySelectorAll(".seasonal-list li");
  const seasonalComment = document.getElementById("seasonal-comment");

  if (seasonalList.length === 0 || !seasonalComment) return;

  if (seasonalList.length > 0 && seasonalComment) {
    const defaultComment = seasonalList[0].dataset.comment;
    seasonalComment.textContent = defaultComment;

    seasonalList.forEach((item) => {
      item.addEventListener("mouseenter", () => {
        const comment = item.dataset.comment;
        seasonalComment.textContent = comment;
      });
      item.addEventListener("mouseleave", () => {
        seasonalComment.textContent = defaultComment;
      });
    });
  }
});
