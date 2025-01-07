import { sendAjax } from "./function/fetch.js";
import { phpArray } from "./function/function.js";
document.addEventListener("DOMContentLoaded", function () {
  const imageInput = document.getElementById("imageInput");
  const cropContainer = document.getElementById("cropContainer");
  const imagePreview = document.getElementById("imagePreview");
  const cropBtn = document.getElementById("cropBtn");
  const uploadBtn = document.getElementById("uploadBtn");
  const nameInput = document.getElementById("name"); // User's name input
  const uploadForm = document.getElementById("uploadForm");
  const category = document.getElementById("category");
  const subcat = document.getElementById("subcat");
  const sender = document.getElementById("sender");

  const subcategories = phpArray(sender.getAttribute("data-sub"));
  console.log(subcategories);
  category.addEventListener("change", (event) => {
    subcat.innerHTML = "";
    subcategories.forEach((sub) => {
      const subs = document.createElement("option");
      subs.value = sub.sub_id;
      subs.innerHTML = sub.SubCategory;
      if (sub.id_cat === category.value) {
        subcat.appendChild(subs);
      }
    });
  });

  let cropper;

  // Initially, make the upload button visible
  uploadBtn.style.display = "inline-block";
  imagePreview.style.maxWidth = "70%"; // Set the max width to 100% of the container
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
        const croppedURL = URL.createObjectURL(blob);
        imagePreview.src = croppedURL;

        // Make the upload button visible after cropping
        uploadBtn.style.display = "inline-block";

        // Hide the crop button and reset the cropper
        cropBtn.style.display = "none";
        cropper.destroy();
        cropper = null;
      }, "image/jpeg");
    }
  });

  // Handle the upload button click
  uploadBtn.addEventListener("click", function () {
    const formData = new FormData(uploadForm);

    // Get the user's name and replace spaces with dashes for the file name
    const userName = nameInput.value.trim();
    const categorySelect = document.getElementById("category");
    const subCategorySelect = document.getElementById("subcat");

    // Check if the name input is empty or if any other required field is empty
    if (
      userName === "" ||
      categorySelect.value === "0" ||
      subCategorySelect.value === "0"
    ) {
      return alert("Data can't be blank.");
    }

    // Get the user's name and sanitize it to use as a file name
    let fileName = userName.replace(/\s+/g, "-") + ".jpg"; // Replace spaces with dashes

    // Check if no file was uploaded and set a default file name
    if (!imageInput.files.length) {
      if (
        !confirm(
          "No image selected. The system will use the default image. Do you want to proceed?"
        )
      ) {
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
    formData.append("action", "member"); // You can change "add" to "edit" or "delete" based on the form's purpose
    formData.append("attempt", "addNew"); // You can change "add" to "edit" or "delete" based on the form's purpose

    // If form validation passed, send the form data via AJAX
    sendAjax("../data/control/crud.php", formData, "Settings");
  });
  document.title = "Add New Name";
});
