function cardHeader(name) {
  const cardHeader = document.createElement("div");
  cardHeader.classList.add("card-header");
  cardHeader.innerHTML = name;
  return cardHeader;
}
function cardFooter(date) {
  // Create the card-footer div
  const cardFooter = document.createElement("div");
  cardFooter.classList.add("card-footer", "text-body-secondary"); // Add both classes
  const p = document.createElement("p");
  p.classList.add("cardFooter");
  p.innerHTML = "Last Updated : " + date;
  cardFooter.appendChild(p);
  return cardFooter;
}
function cardContainer() {
  const cardContainer = document.createElement("div");
  cardContainer.classList.add("card");
  cardContainer.style.width = "100%";
  return cardContainer;
}
function cardBody() {
  const cardBody = document.createElement("div");
  cardBody.classList.add("card-Body");
  return cardBody;
}
function cardImage(image) {
  const img = document.createElement("img");
  img.src = image;
  img.classList.add("card-img-top"); // Add the 'card-img-top' class
  img.alt = "...";
  return img;
}
function col() {
  const col = document.createElement("div");
  col.classList.add("col-sm-3");
  col.classList.add("mt-3");
  return col;
}

function nameSelection(id, name, image, category, SubCategory) {
  const body = cardBody();
  const container = cardContainer();
  const column = col();
  const disCategory = document.createElement("h5");
  disCategory.classList.add("card-title");
  disCategory.classList.add("h6");
  disCategory.innerHTML = category;

  const disSubCategory = document.createElement("h5");
  disSubCategory.classList.add("card-subtitle");
  disSubCategory.classList.add("mb-2");
  disSubCategory.classList.add("text-body-secondary");
  disSubCategory.innerHTML = SubCategory;

  const selected = document.createElement("a");
  selected.href = "#"; // Set the href attribute
  selected.classList.add("card-link"); // Add the 'card-link' class
  selected.id = "selected" + id; // Set the id attribute
  selected.style.textDecoration = "none";

  body.appendChild(disCategory);
  body.appendChild(disSubCategory);

  container.appendChild(cardImage(image));
  container.appendChild(cardHeader(name));
  container.appendChild(body);
  selected.appendChild(container);

  column.appendChild(selected);
  return column;
}

function counter(id, name, image, value, log, date, isArchive) {
  // Create the card components
  const body = cardBody();
  const container = cardContainer();
  const col = document.createElement("div");
  col.classList.add("mt-3");
  const Footer = cardFooter(date);
  const cardHeader = document.createElement("div");
  cardHeader.classList.add("card-header");

  const logHeader = document.createElement("a");
  logHeader.classList.add("log");
  logHeader.setAttribute("data-id", id);
  logHeader.setAttribute("data-bs-toggle", "modal");
  logHeader.setAttribute("data-bs-target", "#logsModal");
  logHeader.setAttribute("data-name", name);
  logHeader.href = "#";
  //  class="btn btn-primary"  data-bs-target=""
  const cardTitle = document.createElement("h5");
  cardTitle.classList.add("text-center");
  cardTitle.classList.add("id");
  cardTitle.setAttribute("data-id", id);
  cardTitle.setAttribute("data-log", log);
  cardTitle.innerHTML = name;
  if (log !== "1") {
    cardHeader.appendChild(cardTitle);
  } else {
    logHeader.appendChild(cardTitle);
    cardHeader.appendChild(logHeader);
  }

  // Create the row for the counter
  const row = document.createElement("div");
  row.classList.add("row", "text-center", "py-4", "mx-1");

  // Minus button
  const colMinus = document.createElement("div");
  colMinus.classList.add("col-4");
  const btnMinus = document.createElement("button");
  btnMinus.classList.add("btn", "btn-secondary", "m-0");
  btnMinus.style.width = "100%";
  btnMinus.textContent = "-";
  if (isArchive !== true) {
    colMinus.appendChild(btnMinus);
  }
  // Value display
  const colValue = document.createElement("div");
  colValue.classList.add("col-4", "text-center");
  const valueText = document.createElement("h5");
  valueText.classList.add("value", "m-0");
  valueText.style.background = "grey";
  valueText.textContent = value;
  colValue.appendChild(valueText);

  // Plus button
  const colPlus = document.createElement("div");
  colPlus.classList.add("col-4");
  const btnPlus = document.createElement("button");
  btnPlus.classList.add("btn", "btn-secondary", "m-0");
  btnPlus.style.width = "100%";
  btnPlus.textContent = "+";
  if (isArchive !== true) {
    colPlus.appendChild(btnPlus);
  }

  // Append the counter components to the row
  row.appendChild(colMinus);
  row.appendChild(colValue);
  row.appendChild(colPlus);

  // Build the card
  body.appendChild(row);
  container.appendChild(cardImage(image));
  container.appendChild(cardHeader);
  container.appendChild(body);
  container.appendChild(Footer);

  // Add the card to the column
  col.appendChild(container);

  return col;
}

function createLinkList(x, name, sub, total) {
  // Create the table row
  const row = document.createElement("tr");

  // Create and append the first <td> with x
  const tdIndex = document.createElement("td");
  tdIndex.classList.add("text-center");
  tdIndex.textContent = x;
  row.appendChild(tdIndex);

  // Create and append the third <td> with Name
  const tdName = document.createElement("td");
  tdName.classList.add("text-center");
  tdName.textContent = name;
  row.appendChild(tdName);

  // Create and append the fourth <td> with SubCategory
  const tdSubCategory = document.createElement("td");
  tdSubCategory.classList.add("text-center");
  tdSubCategory.textContent = sub;
  row.appendChild(tdSubCategory);

  // Create and append the fifth <td> with a static value (0)
  const tdStatic = document.createElement("td");
  tdStatic.classList.add("text-center");
  tdStatic.textContent = total;
  row.appendChild(tdStatic);

  return row;
}

function createRanksHead() {
  // Create the <thead> element
  const thead = document.createElement("thead");
  thead.classList.add("text-center");

  // Create the <tr> element
  const tr = document.createElement("tr");

  // Create the <th> elements for each column header
  const th1 = document.createElement("th");
  th1.scope = "col";
  th1.textContent = "#";

  const th2 = document.createElement("th");
  th2.scope = "col";
  th2.textContent = "Name";

  const th3 = document.createElement("th");
  th3.scope = "col";
  th3.textContent = "Sub Category";

  const th4 = document.createElement("th");
  th4.scope = "col";
  th4.textContent = "Grand Total";

  // Append the <th> elements to the <tr>
  tr.appendChild(th1);
  tr.appendChild(th2);
  tr.appendChild(th3);
  tr.appendChild(th4);

  // Append the <tr> to the <thead>
  thead.appendChild(tr);
  return thead;
}

{
  /* <div class="col-sm-4 mt-4">
        <div class="card">
            <a href="">
                <div class="card-header text-center">
                    <h3>Name</h3>
                </div>
            </a>
            <div class="card-body">
                <img src="../assets/images/中坂-美祐.jpg" class="card-img-top" alt="...">
                
            </div>
        </div> */
}

export { nameSelection, counter, createLinkList, createRanksHead };
