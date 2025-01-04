import { requestAjax } from "./function/fetch.js";
import { counter } from "./function/elementCreation.js";
import { phpArray } from "./function/function.js";

document.addEventListener("DOMContentLoaded", () => {
  const selectedData = JSON.parse(sessionStorage.getItem("selectedCat"));
  if (!selectedData) {
    alert("You are not supposed to be here");
    window.location.href = "counter.php";
  }
  const header = document.getElementById("header");
  header.innerHTML = "Counter Category : " + selectedData["Category"];
  const dataSender = document.getElementById("Data-Sender");
  const grid = document.getElementById("grid");
  const counterList = phpArray(dataSender.getAttribute("data-latCounter"));
  const listed = selectedData["cat_id"];

  const filteredData = counterList.filter((item) => listed.includes(item.Cat));
  console.log(filteredData);
  filteredData.forEach((element) => {
    const item = counter(
      element.countId,
      element.Name,
      "../assets/images/" + element["Image"],
      element.count,
      element.Logs,
      element.Last_Update
    );
    grid.appendChild(item);
  });
  document.querySelectorAll(".log").forEach((link) => {
    link.addEventListener("click", function () {
      const card = this.closest(".card");
      const itemId = card.querySelector(".id").getAttribute("data-id"); // Get the item name
      requestAjax("../data/control/crud.php", itemId)
        .then((data) => {
          console.log(data); // Process the fetched data
        })
        .catch((error) => {
          console.error("Error:", error); // Handle any error
        });
    });
  });
  document.querySelectorAll(".btn-secondary").forEach((button) => {
    button.addEventListener("click", function () {
      const act = this.textContent.trim(); // "+" or "-"
      const card = this.closest(".card");
      const itemId = card.querySelector(".id").getAttribute("data-id"); // Get the item name
      const log = card.querySelector(".id").getAttribute("data-log"); // Get the item name

      const quantityElement = card.querySelector(".value"); // Quantity display
      let currentQuantity = parseInt(quantityElement.textContent);
      // Determine the new quantity
      const newQuantity =
        act === "+" ? currentQuantity + 1 : currentQuantity - 1;
      console.log(log);
      if (newQuantity >= 1) {
        // Prevent negative quantities
        // Update the quantity on the frontend
        fetch("../data/control/crud.php", {
          method: "POST",
          headers: { "Content-Type": "application/x-www-form-urlencoded" },
          body: `action=Counter&attempt=Update&item=${encodeURIComponent(
            itemId
          )}&quantity=${encodeURIComponent(
            newQuantity
          )}&log=${encodeURIComponent(log)}&act=${encodeURIComponent(act)}`,
        })
          .then((response) => response.json())
          .then((data) => {
            console.log("Upload response:", data);
            if (data.success) {
              alert("Data submitted successfully!");
              quantityElement.textContent = newQuantity;
            } else {
              alert("Upload failed: " + data.message);
            }
          })
          .catch((error) => {
            console.error("Error uploading the data:", error);
            alert(error);
          });
      }
      // Make an AJAX request to update the database
    });
  });
});
