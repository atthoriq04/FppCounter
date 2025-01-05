import { sendAjax } from "./function/fetch.js";

document.addEventListener("DOMContentLoaded", () => {
  const categoryModal = document.getElementById("categoryModal");
  const addNewModal = document.getElementById("addNewModal");
  const modalTitle = addNewModal.querySelector(".modal-title");
  const inputField = addNewModal.querySelector("#inputField");
  const inputLabel = addNewModal.querySelector("#inputLabel");
  const form = addNewModal.querySelector("form");
  const submitButton = addNewModal.querySelector("#submitButton");
  const overview = document.querySelectorAll(".overview"); // Select all elements with the given class
  overview.forEach((element) => {
    element.remove(); // Remove each element
  });
  let catID = null;
  let categoryName;
  categoryModal.addEventListener("show.bs.modal", (event) => {
    const button = event.relatedTarget; // Element that triggered the modal
    categoryName = button.getAttribute("data-category"); // Get category name
    catID = button.getAttribute("data-catId"); // Get category name
    const sublist = button.getAttribute("data-sublist"); // Get sublist JSON string

    // Parse sublist JSON into an array
    const sublistArray = sublist ? JSON.parse(sublist) : [];

    // Update modal title with category name
    const modalTitle = categoryModal.querySelector(".modal-title");
    modalTitle.textContent = categoryName || "Category Name";
    console.log(sublistArray);
    const test = sublistArray.filter(
      (sublistArray) => sublistArray.id_cat == catID
    );
    // Update the sublist in the modal
    const subcategoryList = categoryModal.querySelector(".list-group");
    subcategoryList.innerHTML = ""; // Clear existing subcategories

    if (test.length !== 0) {
      test.forEach((item) => {
        const li = document.createElement("li");
        li.className = "list-group-item";
        li.textContent = item.SubCategory;
        subcategoryList.appendChild(li);
      });
    } else {
      const li = document.createElement("li");
      li.className = "list-group-item";
      li.textContent = "No Data Available";
      subcategoryList.appendChild(li);
    }
  });
  addNewModal.addEventListener("show.bs.modal", (event) => {
    const button = event.relatedTarget;
    const type = button.getAttribute("data-type");
    form.reset();
    inputField.value = "";
    console.log(catID);
    if (type === "year") {
      modalTitle.textContent = "Add New Year";
      inputField.name = "yearName";
      inputField.id = "yearName";
      inputLabel.textContent = "Year Name";
      form.id = "yearForm";
      submitButton.textContent = "Submit Year";
      submitButton.dataset.type = "year";
    } else if (type === "category") {
      modalTitle.textContent = "Add New Category";
      inputField.name = "catName";
      inputField.id = "catName";
      inputLabel.textContent = "Category Name";
      form.id = "categoryForm";
      submitButton.textContent = "Submit Category";
      submitButton.dataset.type = "category";
    } else if (type === "subcategory") {
      modalTitle.textContent = "Add New Subcategory for " + categoryName;
      inputField.name = "subName";
      inputField.id = "subName";
      inputLabel.textContent = "Subcategory Name";
      form.id = "AddsubcategoryForm";
      submitButton.textContent = "Submit New Sub Category";
      submitButton.dataset.type = "subCategory";
    }
  });
  submitButton.addEventListener("click", (event) => {
    event.preventDefault(); // Prevent form submission
    const type = submitButton.getAttribute("data-type");
    const formData = new FormData(form); // Collect form data
    formData.append("action", "yearCat");
    // Append action: 'add' to the object
    if (type === "year") {
      formData.append("attempt", "addYear");
    } else if (type === "category") {
      formData.append("attempt", "addCat");
    } else if (type === "subCategory") {
      formData.append("attempt", "addSub");
      formData.append("cat_id", catID);
    }
    sendAjax("../data/control/crud.php", formData, "Settings");
  });
});
