function sendAjax(url, formData, loc) {
  fetch(url, {
    method: "POST",
    body: formData,
  })
    .then((response) => response.json())
    .then((data) => {
      console.log("Upload response:", data);
      if (data.success) {
        alert("Data submitted successfully!");
        window.location = loc + ".php";
      } else {
        alert("Upload failed: " + data.message);
      }
    })
    .catch((error) => {
      console.error("Error uploading the data:", error);
      alert(error);
    });
}

export { sendAjax };
