document.addEventListener("DOMContentLoaded", function () {
  const tagInput = document.getElementById("tagFilterInput");
  const suggestionList = document.querySelector(".tag-suggestion-list");
  const selectedTagList = document.getElementById("selected-tag");
  let allTags = [];
  let selectedTags = [];

  fetch("/wp-admin/admin-ajax.php?action=get_all_tags")
    .then((res) => res.json())
    .then((data) => {
      allTags = data;
    });

  tagInput.addEventListener("keyup", function () {
    const keyword = this.value.trim().toLowerCase();
    suggestionList.innerHTML = "";

    if (keyword.length < 1) return;

    const filtered = allTags.filter((tag) =>
      tag.name.toLowerCase().startsWith(keyword)
    );
    filtered.forEach((tag) => {
      const li = document.createElement("li");
      li.textContent = tag.name;
      li.dataset.slug = tag.slug;
      suggestionList.appendChild(li);
    });
  });

  suggestionList.addEventListener("click", function (e) {
    if (!e.target.matches("li")) return;

    const slug = e.target.dataset.slug;
    const name = e.target.textContent;

    if (selectedTags.includes(slug) || selectedTags.length >= 5) return;

    selectedTags.push(slug);

    const tagButton = document.createElement("label");
    tagButton.className = "filter-active";
    tagButton.dataset.slug = slug;
    tagButton.innerHTML = name + " <span>&times;</span>";
    selectedTagList.appendChild(tagButton);
  });

  selectedTagList.addEventListener("click", function (e) {
    if (e.target.tagName !== "BUTTON" && e.target.tagName !== "SPAN") return;

    const button = e.target.closest("button");
    const slug = button.dataset.slug;
    selectedTags = selectedTags.filter((item) => item !== slug);
    button.remove();
  });
});
