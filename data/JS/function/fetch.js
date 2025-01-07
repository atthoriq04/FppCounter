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

function requestAjax(url, datas) {
  return fetch(url, {
    method: "POST",
    headers: { "Content-Type": "application/x-www-form-urlencoded" },
    body: datas,
  })
    .then((response) => {
      if (!response.ok) {
        throw new Error(`HTTP error! Status: ${response.status}`);
      }
      return response.json();
    })
    .then((data) => {
      if (data.success) {
        return data;
      } else {
        alert("Upload failed: " + data.message);
        return Promise.reject(data); // Reject promise on failure for consistent error handling
      }
    })
    .catch((error) => {
      console.error("Error uploading the data:", error);
      alert("Error: " + error.message);
      throw error; // Rethrow error for the calling context
    });
}
export { sendAjax, requestAjax };
