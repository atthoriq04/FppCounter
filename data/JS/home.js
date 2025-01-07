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
      console.log(lists);
      ranks.appendChild(createRanksHead());
      link.style.visibility = "hidden";
      Object.entries(lists)
        .slice(0, 15)
        .forEach(([key, value], index) => {
          ranks.appendChild(
            createLinkList(1, value.Name, value.SubCategory, value.grandTotal)
          );
        });
      const closes = document.getElementById("close+" + cat_id);
      console.log(closes);
      closes.style.visibility = "visible";
      closes.addEventListener("click", (e) => {
        e.preventDefault;
        reloads();
        closes.style.visibility = "hidden";
        link.style.visibility = "visible";
      });
    });
  });

  function reloads() {
    const elements = document.querySelectorAll(".ranks");
    elements.forEach((element) => {
      element.innerHTML = "";
    });
  }

  document.title = "FPP Counter Home";
});
