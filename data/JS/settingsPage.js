import { sendAjax } from "./function/fetch.js";
import { phpArray } from "./function/function.js";
import { changeNavbar } from "./function/navbarSetting.js";
document.addEventListener("DOMContentLoaded", () => {
  const imageInput = document.getElementById("imageInput");
  const cropContainer = document.getElementById("cropContainer");
  const imagePreview = document.getElementById("imagePreview");
  const cropBtn = document.getElementById("cropBtn");
  const categoryModal = document.getElementById("categoryModal");
  const addNewModal = document.getElementById("addNewModal");
  const modalTitle = addNewModal.querySelector(".modal-title");
  const inputField = addNewModal.querySelector("#inputField");
  const inputLabel = addNewModal.querySelector("#inputLabel");
  const form = addNewModal.querySelector("form");
  const submitButton = addNewModal.querySelector("#submitButton");
  const overview = document.querySelectorAll(".overview"); // Select all elements with the given class
  const namelists = document.querySelectorAll(".namelists");
  const editName = document.getElementById("editName");
  const editCategory = document.getElementById("editCategory");
  const editSubCat = document.getElementById("editSubcat");
  const uploadBtn = document.getElementById("editButton");
  const uploadForm = document.getElementById("uploadForm");
  const editmodal = document.getElementById("editNameModal");
  const modalButton = document.getElementsByClassName("modalButton");
  let cropper;
  overview.forEach((element) => {
    element.remove(); // Remove each element
  });
  let catID = null;
  let categoryName;

  const breakpoints = {
    sm: 576, // Small (Smartphone)
    lg: 1280, // Large (Desktop)
  };
  namelists.forEach((element) => {
    if (window.innerWidth >= breakpoints.lg) {
      // Large screens (Desktop)
      element.classList.remove("col-6");
      element.classList.add("col-4");
    } else if (
      window.innerWidth <= breakpoints.lg &&
      window.innerWidth >= breakpoints.sm
    ) {
      console.log("tab");
      // Medium screens (Tablet)
      element.classList.remove("col-4");
      element.classList.add("col-md-4");
    } else if (window.innerWidth <= breakpoints.sm) {
      // Small screens (Smartphone)
      element.classList.remove("col-4");
      element.classList.add("col-6");
    } else {
      alert("ASd");
      // Smaller than small screen
      element.classList.remove("col-4", "col-6");
    }
  });
  //Edit Name Modal
  let name;
  document.querySelectorAll(".edit").forEach((button) => {
    button.addEventListener("click", (event) => {
      event.preventDefault;
      editmodal.classList.remove("hidden");
      name = phpArray(button.getAttribute("data-name"));
      editName.value = name.Name + "(" + name.id + ")";
      editName.disabled = true;
      editCategory.value = name.Cat;
      console.log(name.Image);
      editCategory.innerHTML = name.Category;
      const subcategories = phpArray(button.getAttribute("data-sub"));
      editSubCat.innerHTML = "";
      subcategories.forEach((element) => {
        const subs = document.createElement("option");
        subs.value = element.sub_id;
        subs.innerHTML = element.SubCategory;
        if (element.id_cat === name.Cat) {
          editSubCat.appendChild(subs);
          if (element.sub_id === name.Sub) {
            subs.selected = true; // Set this option as selected
          }
        }
      });
    });
  });

  // Handle image selection (either crop or no crop)
  imageInput.addEventListener("change", function (event) {
    const file = event.target.files[0];

    if (!file) {
      // If no file is selected, allow default image upload
      console.log("Using default image: default.png");
      uploadBtn.style.display = "inline-block"; // Make the upload button visible
      return;
    }

    // If an image is selected, show the preview and crop option
    const reader = new FileReader();
    reader.onload = function (e) {
      imagePreview.src = e.target.result;
      cropContainer.style.display = "block";
      cropBtn.style.display = "inline-block";
      uploadBtn.style.display = "none"; // Hide the upload button initially

      // Scroll to the crop container
      cropContainer.scrollIntoView({ behavior: "smooth", block: "center" });

      if (cropper) {
        cropper.destroy();
      }
      cropper = new Cropper(imagePreview, {
        aspectRatio: 1, // Adjust as needed
        viewMode: 2,
      });
    };
    reader.readAsDataURL(file);
  });
  let croppedURL;
  // Handle crop button click
  cropBtn.addEventListener("click", function () {
    if (cropper) {
      const canvas = cropper.getCroppedCanvas({
        width: 600, // Adjust as needed
        height: 600,
      });

      canvas.toBlob((blob) => {
        const croppedFile = new File([blob], "cropped_image.jpg", {
          type: "image/jpeg",
        });

        // Add the cropped image to the FormData
        const dataTransfer = new DataTransfer();
        dataTransfer.items.add(croppedFile);
        imageInput.files = dataTransfer.files; // Set the input files

        // Update the preview with the cropped image
        croppedURL = URL.createObjectURL(blob);
        imagePreview.src = croppedURL;

        document.getElementById("image+".name.id).src = croppedURL;
        // Make the upload button visible after cropping
        uploadBtn.style.display = "inline-block";

        // Hide the crop button and reset the cropper
        cropBtn.style.display = "none";
        cropper.destroy();
        cropper = null;
      }, "image/jpeg");
    }
  });

  //Category/YearModal

  document.querySelectorAll(".modalButton").forEach((button) => {
    button.addEventListener("click", (event) => {
      addNewModal.classList.remove("hidden");
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
        catID = button.getAttribute("data-catId");
        categoryName = button.getAttribute("data-catName");
        modalTitle.textContent = "Add New Subcategory for " + categoryName;
        inputField.name = "subName";
        inputField.id = "subName";
        inputLabel.textContent = "Subcategory Name";
        form.id = "AddsubcategoryForm";
        submitButton.textContent = "Submit New Sub Category";
        submitButton.dataset.type = "subCategory";
      }
    });
  });
  addNewModal.addEventListener("show.bs.modal", (event) => {});

  //Upload Image
  uploadBtn.addEventListener("click", function (event) {
    event.preventDefault(); // Prevent the default form submission

    const formData = new FormData(uploadForm);

    // Get the user's name and replace spaces with dashes for the file name
    const userName = editName.value.trim();

    const id = userName.match(/\((\d+)\)/);
    // Check if the name input is empty or if any other required field is empty

    // Get the user's name and sanitize it to use as a file name
    let fileName = name.Image; // Replace spaces with dashes
    // Check if no file was uploaded and set a default file name
    if (!imageInput.files.length) {
      if (!confirm("No image selected. Image Wont be replaced")) {
        return; // Stop the process if the user cancels
      }
    } else {
      // Assign the file name based on the user input
      const newFile = new File([imageInput.files[0]], fileName, {
        type: imageInput.files[0].type,
      });
      formData.set("image", newFile); // Set the new file with the user input name
    }

    // Add the action parameter to specify the type of operation
    formData.append("id", id[1]);
    formData.append("fileName", name.Image);
    formData.append("subCat", editSubCat.value);
    formData.append("action", "member"); // You can change "add" to "edit" or "delete" based on the form's purpose
    formData.append("attempt", "update"); // You can change "add" to "edit" or "delete" based on the form's purpose

    // If form validation passed, send the form data via AJAX
    sendAjax("../data/control/crud.php", formData, "Settings");
  });
  /// Modal YearSub SubmitButtons
  submitButton.addEventListener("click", (event) => {
    event.preventDefault(); // Prevent form submission
    const type = submitButton.getAttribute("data-type");
    const formData = new FormData(form); // Collect form data
    formData.append("action", "yearCat");
    // Append action: 'add' to the object

    if (inputField.value === "") {
      return alert("dont be blank");
    }
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
  document.title = "Config";
  const mainBtn = document.getElementById("newCounterButton");
  const addCat = document.getElementById("addCat");
  const btnLeft = document.getElementById("btnLeft");

  let isOpen = false;

  mainBtn.addEventListener("click", () => {
    isOpen = !isOpen;

    if (isOpen) {
      // Slide up closer
      addCat.classList.remove("invisible", "opacity-0", "translate-y-0");
      addCat.classList.add("-translate-y-18", "opacity-100");

      // Slide left closer
      btnLeft.classList.remove("invisible", "opacity-0", "translate-x-0");
      btnLeft.classList.add("-translate-x-18", "opacity-100");
    } else {
      addCat.classList.add("translate-y-0", "opacity-0");
      addCat.classList.remove("-translate-y-18", "opacity-100");
      setTimeout(() => addCat.classList.add("invisible"), 300);

      btnLeft.classList.add("translate-x-0", "opacity-0");
      btnLeft.classList.remove("-translate-x-18", "opacity-100");
      setTimeout(() => btnLeft.classList.add("invisible"), 300);
    }
  });
  document.querySelectorAll(".modal").forEach((modal) => {
    modal.addEventListener("click", (e) => {
      console.log("a");
      // Check if the click is directly on the backdrop (modal container)
      if (e.target === modal) {
        modal.classList.add("hidden");
      }
    });
  });
  changeNavbar(document.querySelectorAll("#navbar-sticky a"), "Settings");
});
