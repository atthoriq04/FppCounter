document.addEventListener("DOMContentLoaded", function () {
  const imageInput = document.getElementById("imageInput");
  const cropContainer = document.getElementById("cropContainer");
  const imagePreview = document.getElementById("imagePreview");
  const cropBtn = document.getElementById("cropBtn");
  const uploadBtn = document.getElementById("uploadBtn");
  const nameInput = document.getElementById("name"); // User's name input
  const uploadForm = document.getElementById("uploadForm");
  let cropper;

  // Initially, make the upload button visible
  uploadBtn.style.display = "inline-block";

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

    // Check if the name input is empty or if any other required field is empty
    if (userName === "") {
      return alert("Data can't be blank. Please enter a name.");
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

    // If form validation passed, send the form data via AJAX
    fetch("../data/functions/crud.php", {
      method: "POST",
      body: formData,
    })
      .then((response) => response.json())
      .then((data) => {
        console.log("Upload response:", data);
        if (data.success) {
          alert("Data submitted successfully!");
        } else {
          alert("Upload failed: " + data.message);
        }
      })
      .catch((error) => {
        console.error("Error uploading the data:", error);
        alert("An error occurred during upload.");
      });
  });
});
