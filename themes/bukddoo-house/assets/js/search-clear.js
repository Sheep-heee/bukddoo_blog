const searchInput = document.getElementById("searchInput");
const clearBtn = document.getElementById("clearButton");

clearBtn.addEventListener("click", () => {
  searchInput.value = "";
  searchInput.focus();
});

const tagFilterInput = document.getElementById("tagFilterInput");
const tagFilterClearBtn = document.getElementById("tagFilter-clearButton");

tagFilterClearBtn.addEventListener("click", () => {
  tagFilterInput.value = "";
  tagFilterInput.focus();
});
