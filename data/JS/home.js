import { phpArray } from "./function/function.js";
import { createLinkList, createRanksHead } from "./function/elementCreation.js";
document.addEventListener("DOMContentLoaded", () => {
  document.querySelectorAll(".detailLink").forEach((link) => {
    link.addEventListener("click", (event) => {
      event.preventDefault();
      const cat_id = event.currentTarget.dataset.cat;
      const lists = phpArray(event.currentTarget.dataset.name);
      const ranks = document.getElementById("rankList+" + cat_id);
      ranks.innerHTML = "";
      ranks.appendChild(createRanksHead());
      console.log(ranks);
      Object.entries(lists)
        .slice(0, 15)
        .forEach(([key, value], index) => {
          ranks.appendChild(createLinkList(1, value));
        });
    });
  });
});
