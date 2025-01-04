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

function requestAjax(url, id) {
  return new Promise((resolve, reject) => {
    const data = { id: id }; // Send the ID in the body as JSON

    fetch(url, {
      method: "POST", // Use POST method
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(data), // Send the data as a JSON string
    })
      .then((response) => response.json()) // Parse the JSON response
      .then((data) => {
        if (data.error) {
          alert("Failed: " + data.message);
          reject(data); // Reject the promise with the error data
        } else {
          resolve(data); // Resolve the promise with the data
        }
      })
      .catch((error) => {
        console.error("Error uploading the data:", error);
        alert(error);
        reject(error); // Reject the promise with the error
      });
  });
}
export { sendAjax, requestAjax };
