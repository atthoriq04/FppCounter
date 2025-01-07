import { requestAjax } from "./function/fetch.js";
import { counter } from "./function/elementCreation.js";
import { phpArray } from "./function/function.js";
import { createLinkList } from "./function/elementCreation.js";

document.addEventListener("DOMContentLoaded", () => {
  const selectedData = JSON.parse(sessionStorage.getItem("selectedCat"));
  const counterList = JSON.parse(sessionStorage.getItem("counterList"));
  const isArchive = JSON.parse(sessionStorage.getItem("isArchive"));
  if (!selectedData) {
    alert("You are not supposed to be here");
    window.location.href = "counter.php";
  }
  const header = document.getElementById("header");
  header.innerHTML = "Counter Category : " + selectedData["Category"];
  // const dataSender = document.getElementById("Data-Sender");
  const grid = document.getElementById("grid");
  const title = document.getElementById("title");
  const logLists = document.getElementById("logLists");
  // const counterList = phpArray(dataSender.getAttribute("data-latCounter"));
  const listed = selectedData["cat_id"];
  const options = {
    year: "numeric", // Example: '2025'
    month: "long", // Example: 'January'
    day: "2-digit", // Example: '06'
    hour: "2-digit", // Example: '01'
    minute: "2-digit", // Example: '14'
    hour12: true, // 12-hour clock with AM/PM
  };
  const now = new Date();
  // Format the date
  let formattedDate = now.toLocaleString("en-GB", options); // 'en-GB' for the format 'DD Month YYYY, HH:mm AM/PM'
  // Replace " at" with a comma
  formattedDate = formattedDate.replace(" at", ",");

  // Replace "am" with "AM" and "pm" with "PM"
  formattedDate = formattedDate.replace(/am/g, "AM").replace(/pm/g, "PM");
  const breakpoints = {
    sm: 576, // Small (Smartphone)
    md: 768, // Medium (Tablet)
    lg: 992, // Large (Desktop)
  };
  function updateElementClassBasedOnWidth(element) {
    if (window.innerWidth >= breakpoints.lg) {
      // Large screens (Desktop)
      element.classList.remove("col-3", "col-6");
      element.classList.add("col-2");
    } else if (window.innerWidth >= breakpoints.md) {
      // Medium screens (Tablet)
      element.classList.remove("col-2", "col-6");
      element.classList.add("col-3");
    } else if (window.innerWidth >= breakpoints.sm) {
      // Small screens (Smartphone)
      element.classList.remove("col-2", "col-3");
      element.classList.add("col-6");
    } else {
      // Smaller than small screen
      element.classList.remove("col-2", "col-3", "col-6");
      element.classList.add("col-6");
    }
  }
  function addData(data) {
    grid.innerHTML = ""; // Clear previous content

    const filteredData = data.filter((item) => listed.includes(item.Cat));
    console.log(filteredData);

    filteredData.sort((a, b) => b.count - a.count);
    // Loop through each element in the filtered data
    filteredData.forEach((element) => {
      const item = counter(
        element.countId,
        element.Name,
        "../assets/images/" + element["Image"],
        element.count,
        element.Logs,
        element.Last_Update,
        isArchive
      );

      grid.appendChild(item);

      // Apply responsive classes to each item
      updateElementClassBasedOnWidth(item);
    });

    // Reattach event listeners to newly created buttons (if applicable)
    attachEventListeners();
  }

  // Optionally, add an event listener for window resizing to update classes dynamically
  window.addEventListener("resize", () => {
    // Apply the responsive classes to each item in the grid
    const items = document.querySelectorAll(".col");
    items.forEach((item) => {
      updateElementClassBasedOnWidth(item);
    });
  });
  addData(counterList);

  function attachEventListeners() {
    document.querySelectorAll(".btn-secondary").forEach((button) => {
      button.addEventListener("click", function () {
        const act = this.textContent.trim(); // "+" or "-"
        const card = this.closest(".card");
        const itemId = card.querySelector(".id").getAttribute("data-id");
        const log = card.querySelector(".id").getAttribute("data-log");

        const quantityElement = card.querySelector(".value");
        const footer = card.querySelector(".cardFooter");
        let currentQuantity = parseInt(quantityElement.textContent);
        const newQuantity =
          act === "+" ? currentQuantity + 1 : currentQuantity - 1;
        const date = formattedDate;

        if (newQuantity >= 1) {
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
                const updatedData = JSON.parse(data.updatedData);
                sessionStorage.setItem(
                  "counterList",
                  JSON.stringify(updatedData)
                );
                addData(updatedData);
              } else {
                alert("Upload failed: " + data.message);
              }
            })
            .catch((error) => {
              console.error("Error uploading the data:", error);
              alert(error);
            });
        }
      });
    });
  }
  document.querySelectorAll(".log").forEach((link) => {
    link.addEventListener("click", (event) => {
      event.preventDefault(); // Prevent default action if necessary (e.g., for anchor tags)

      const id = link.getAttribute("data-id");
      const name = link.getAttribute("data-name");
      const datas = `id=${encodeURIComponent(id)}&act=${encodeURIComponent(
        "getLog"
      )}`;

      requestAjax("../data/control/request.php", datas)
        .then((data) => {
          logLists.innerHTML = "";
          const logs = phpArray(data.updatedData);
          logs.sort((a, b) => b.id - a.id);
          title.innerHTML = name + "'s Counter Logs";
          title.classList.add("mb-4");
          let x = 1;
          logs.forEach((log) => {
            logLists.appendChild(
              createLinkList(x, name, log.count, log.createTime)
            );
            x++;
          });

          // Handle successful data retrieval here (e.g., update the UI)
        })
        .catch((error) => {
          console.error("Error handling request:", error);
          // Handle the error (already alerted in requestAjax)
        });
    });
  });

  document.title = selectedData["Category"] + " Counter Category";
});
