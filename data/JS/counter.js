import { sendAjax } from "./function/fetch.js";
import { nameSelection } from "./function/elementCreation.js";
import { phpArray } from "./function/function.js";

document.addEventListener("DOMContentLoaded", () => {
  const newCounterButton = document.getElementById("newCounterButton");
  const selector = document.getElementById("selector");
  const toEditData = document.getElementById("toEditData");
  const closeAddModal = document.getElementById("closeAddModal");
  const addCounter = document.getElementById("addCounter");
  const count = document.getElementById("count");
  const dataSender = document.getElementById("Data-Sender");
  const isArchive = dataSender.getAttribute("data-isArchive") === "true";
  const goTo = document.querySelectorAll(".gotopage");
  console.log(isArchive);
  const counterList = phpArray(dataSender.getAttribute("data-latCounter"));
  console.log(counterList);
  goTo.forEach((link) => {
    link.addEventListener("click", (event) => {
      event.preventDefault();
      sessionStorage.setItem(
        "selectedCat",
        JSON.stringify(phpArray(link.getAttribute("selected-data")))
      );
      sessionStorage.setItem("counterList", JSON.stringify(counterList));
      sessionStorage.setItem("isArchive", JSON.stringify(isArchive));
      window.location.href = "counting.php";
    });
  });
  newCounterButton.addEventListener("click", (event) => {
    const year = document.getElementById("year");
    const searchName = document.getElementById("searchName");
    const namelistArray = phpArray(
      newCounterButton.getAttribute("data-namelist")
    );
    const listed = counterList.map((item) => item.id_name);

    const filteredData = namelistArray.filter(
      (item) => !listed.includes(item.id)
    );
    searchName.addEventListener("input", (event) => {
      selector.innerHTML = "";
      for (const namelist of Object.values(filteredData)) {
        if (namelist["Name"].includes(event.target.value)) {
          const item = nameSelection(
            namelist["id"],
            namelist["Name"],
            "../assets/images/" + namelist["Image"],
            namelist["Category"],
            namelist["SubCategory"]
          );
          selector.appendChild(item);
          const selectedLink = item.querySelector("#selected" + namelist["id"]);
          if (selectedLink) {
            selectedLink.addEventListener("click", (event) => {
              searchName.value = namelist["Name"] + "(" + namelist["id"] + ")";
              searchName.disabled = true;
              toEditData.disabled = false;
              selector.innerHTML = "";
              const item = nameSelection(
                namelist["id"],
                namelist["Name"],
                "../assets/images/" + namelist["Image"],
                namelist["Category"],
                namelist["SubCategory"]
              );
              selector.appendChild(item);
            });
          }
        }
      }
    });
    closeAddModal.addEventListener("click", (event) => {
      selector.innerHTML = "";
      searchName.value = "";
      searchName.disabled = false;
      toEditData.disabled = true;
    });

    toEditData.addEventListener("click", (event) => {
      const regex = /^([^\(]+)\(([^)]+)\)$/;
      const matches = searchName.value.match(regex);
      const nameId = matches[2];
      const formData = new FormData(addCounter);
      const counts =
        typeof count === "undefined" || count === null ? null : count.value;

      formData.append("nameId", nameId);
      formData.append("action", "Counter");
      formData.append(
        "attempt",
        counts === null || counts === "" ? "addNew" : "addArchieve"
      );

      sendAjax("../data/control/crud.php", formData, "counter");
    });
  });

  //   submitButton.addEventListener("click", (event) => {
  //     event.preventDefault(); // Prevent form submission
  //     const type = submitButton.getAttribute("data-type");
  //     const formData = new FormData(form); // Collect form data
  //     formData.append("action", "yearCat");
  //     // Append action: 'add' to the object
  //     if (type === "year") {
  //       formData.append("attempt", "addYear");
  //     } else if (type === "category") {
  //       formData.append("attempt", "addCat");
  //     } else if (type === "subCategory") {
  //       formData.append("attempt", "addSub");
  //       formData.append("cat_id", catID);
  //     }
  //     sendAjax("../data/control/crud.php", formData);
  //   });
});
