const searchInput = document.getElementById("searchInput");
const clearBtn = document.getElementById("clearButton");

clearBtn.addEventListener("click", () => {
  searchInput.value = "";
  searchInput.focus();
});
