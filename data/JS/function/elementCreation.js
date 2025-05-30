function cardImageTailwind(image) {
  const img = document.createElement("img");
  img.src = image;
  img.alt = "...";
  img.className = "w-full aspect-square object-cover rounded-lg mb-3";
  return img;
}

function cardHeaderTailwind(name, id, log) {
  const header = document.createElement("div");
  header.className = "text-base font-semibold mb-3";

  const title = document.createElement("h2");
  title.className = "id";
  title.setAttribute("data-id", id);
  title.setAttribute("data-log", log);
  title.textContent = name;
  title.setAttribute("data-name", name);

  if (log === "1") {
    title.className = "id log";
    const logLink = document.createElement("a");
    logLink.className = "text-blue-500 hover:text-blue-800 ";
    logLink.href = "#";
    logLink.setAttribute("data-id", id);
    logLink.setAttribute("data-bs-toggle", "modal");
    logLink.setAttribute("data-bs-target", "#logsModal");
    logLink.appendChild(title);
    header.appendChild(logLink);
  } else {
    header.appendChild(title);
  }
  return header;
}

function cardCounterTailwind(id, value, isArchive) {
  const wrapper = document.createElement("div");
  wrapper.className = "flex justify-center items-center gap-3";

  if (!isArchive) {
    const btnMinus = document.createElement("button");
    btnMinus.className =
      "btn-secondary px-3 py-1 bg-white border border-gray-300 rounded-md text-lg font-medium hover:bg-gray-100 transition";
    btnMinus.textContent = "-";
    wrapper.appendChild(btnMinus);
  }

  const span = document.createElement("span");
  span.className = "text-lg font-bold value";
  span.id = `count-${id}`;
  span.textContent = value;
  wrapper.appendChild(span);

  if (!isArchive) {
    const btnPlus = document.createElement("button");
    btnPlus.className =
      " btn-secondary px-3 py-1 bg-white border border-gray-300 rounded-md text-lg font-medium hover:bg-gray-100 transition";
    btnPlus.textContent = "+";
    wrapper.appendChild(btnPlus);
  }

  return wrapper;
}
function nameSelection(id, name, image, category, SubCategory, log) {
  const column = document.createElement("div");
  column.className =
    "card rounded-xl p-4 text-center flex flex-col items-center w-full max-w-xs mt-3 border-1 border-gray-300 group shadow-lg/20   shadow-md p-4 hover:shadow-lg transition-all duration-300 ";

  const card = document.createElement("a");
  card.href = "#";
  card.id = "selected" + id;
  card.className = "block";
  card.style.textDecoration = "none";

  // Image section
  card.appendChild(cardImageTailwind(image));

  // Header (name with or without log modal trigger)
  card.appendChild(cardHeaderTailwind(name, id, log));

  // Body with category and subcategory
  const body = document.createElement("div");
  body.className = "text-sm text-gray-600 space-y-1";

  const disCategory = document.createElement("p");
  disCategory.className = "font-medium";
  disCategory.textContent = category;

  const disSubCategory = document.createElement("p");
  disSubCategory.className = "text-gray-500";
  disSubCategory.textContent = SubCategory;

  body.appendChild(disCategory);
  body.appendChild(disSubCategory);
  card.appendChild(body);

  column.appendChild(card);
  return column;
}

function counter(id, name, image, value, log, isArchive) {
  // Create the card components
  const card = document.createElement("div");
  card.className =
    "card rounded-xl p-4 text-center flex flex-col items-center w-full max-w-xs mt-3 border-1 border-gray-300 group shadow-lg/20 ";
  card.dataset.index = id;

  card.appendChild(cardImageTailwind(image));
  card.appendChild(cardHeaderTailwind(name, id, log));
  card.appendChild(cardCounterTailwind(id, value, isArchive));

  return card;
}

function createLinkList(x, name, sub, total) {
  // Create the table row
  const row = document.createElement("tr");

  // Create and append the first <td> with x
  const tdIndex = document.createElement("td");
  tdIndex.classList.add(
    "text-center",
    "text-sm",
    "border-b",
    "border-gray-300",
    "py-3"
  );
  tdIndex.textContent = x;
  row.appendChild(tdIndex);

  // Create and append the third <td> with Name
  const tdName = document.createElement("td");
  tdName.classList.add(
    "text-center",
    "text-sm",
    "border-b",
    "border-gray-300",
    "py-3"
  );

  tdName.textContent = name;
  row.appendChild(tdName);

  // Create and append the fourth <td> with SubCategory
  const tdSubCategory = document.createElement("td");
  tdSubCategory.classList.add(
    "text-center",
    "text-sm",
    "border-b",
    "border-gray-300",
    "py-3"
  );

  tdSubCategory.textContent = sub;
  row.appendChild(tdSubCategory);

  // Create and append the fifth <td> with a static value (0)
  const tdStatic = document.createElement("td");
  tdStatic.classList.add(
    "text-center",
    "text-sm",
    "border-b",
    "border-gray-300",
    "py-3"
  );
  tdStatic.textContent = total;
  row.appendChild(tdStatic);

  return row;
}

function createRanksHead() {
  // Create the <thead> element
  const thead = document.createElement("thead");
  thead.classList.add("text-center");

  thead.classList.add("bg-gray-100", "text-gray-700", "uppercase", "text-sm");
  // Create the <tr> element
  const tr = document.createElement("tr");

  // Create the <th> elements for each column header
  const th1 = document.createElement("th");
  th1.scope = "col";
  th1.textContent = "#";
  th1.classList.add("px-4", "py-3", "border-b", "text-left");

  const th2 = document.createElement("th");
  th2.scope = "col";
  th2.textContent = "Name";
  th2.classList.add("px-4", "py-3", "border-b", "text-left");

  const th3 = document.createElement("th");
  th3.scope = "col";
  th3.textContent = "Sub Category";
  th3.classList.add("px-4", "py-3", "border-b", "text-left");

  const th4 = document.createElement("th");
  th4.scope = "col";
  th4.textContent = "Grand Total";
  th4.classList.add("px-4", "py-3", "border-b", "text-left");

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
