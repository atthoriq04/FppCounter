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
  col.classList.add("col-md-3");
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
  selected.textContent = "Select";

  body.appendChild(disCategory);
  body.appendChild(disSubCategory);
  body.appendChild(selected);

  container.appendChild(cardImage(image));
  container.appendChild(cardHeader(name));
  container.appendChild(body);

  column.appendChild(container);
  return column;
}

function counter(id, name, image, value, log, date) {
  // Create the card components
  const body = cardBody();
  const container = cardContainer();
  const column = col();
  const Footer = cardFooter(date);
  const cardHeader = document.createElement("div");
  cardHeader.classList.add("card-header");

  const logHeader = document.createElement("a");
  logHeader.classList.add("log");
  logHeader.href = "#";

  const cardTitle = document.createElement("h5");
  cardTitle.classList.add("text-center");
  cardTitle.classList.add("id");
  cardTitle.innerHTML = name;
  cardTitle.setAttribute("data-id", id);
  cardTitle.setAttribute("data-log", log);
  logHeader.appendChild(cardTitle);
  cardHeader.appendChild(logHeader);

  // Create the row for the counter
  const row = document.createElement("div");
  row.classList.add("row", "text-center", "py-4", "mx-3");

  // Minus button
  const colMinus = document.createElement("div");
  colMinus.classList.add("col-4");
  const btnMinus = document.createElement("button");
  btnMinus.classList.add("btn", "btn-secondary");
  btnMinus.style.width = "100%";
  btnMinus.textContent = "-";
  colMinus.appendChild(btnMinus);

  // Value display
  const colValue = document.createElement("div");
  colValue.classList.add("col-4");
  const valueText = document.createElement("h5");
  valueText.classList.add("value");
  valueText.textContent = value;
  colValue.appendChild(valueText);

  // Plus button
  const colPlus = document.createElement("div");
  colPlus.classList.add("col-4");
  const btnPlus = document.createElement("button");
  btnPlus.classList.add("btn", "btn-secondary");
  btnPlus.style.width = "100%";
  btnPlus.textContent = "+";
  colPlus.appendChild(btnPlus);

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
  column.appendChild(container);

  return column;
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

export { nameSelection, counter };
