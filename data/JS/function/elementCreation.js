function nameSelection(id, name, image, category, SubCategory) {
  const col = document.createElement("div");
  col.classList.add("col-md-3");
  col.classList.add("mt-1");

  const cardContainer = document.createElement("div");
  cardContainer.classList.add("card");
  cardContainer.style.width = "100%";

  const cardHeader = document.createElement("div");
  cardHeader.classList.add("card-header");
  cardHeader.innerHTML = name;

  const cardBody = document.createElement("div");
  cardBody.classList.add("card-Body");

  const img = document.createElement("img");
  img.src = image;
  img.classList.add("card-img-top"); // Add the 'card-img-top' class
  img.alt = "...";

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

  cardBody.appendChild(disCategory);
  cardBody.appendChild(disSubCategory);
  cardBody.appendChild(selected);

  cardContainer.appendChild(img);
  cardContainer.appendChild(cardHeader);
  cardContainer.appendChild(cardBody);

  col.appendChild(cardContainer);
  return col;
}

export { nameSelection };
