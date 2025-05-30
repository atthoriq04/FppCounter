document.addEventListener("DOMContentLoaded", function () {
  const toggleButton = document.querySelector(
    '[data-collapse-toggle="navbar-sticky"]'
  );
  const menu = document.getElementById("navbar-sticky");

  // Toggle menu on button click
  toggleButton.addEventListener("click", function (event) {
    event.stopPropagation(); // Prevent it from triggering the document click
    menu.classList.toggle("hidden");
  });

  // Close menu if clicked outside
  document.addEventListener("click", function (event) {
    const isClickInsideMenu = menu.contains(event.target);
    const isClickOnButton = toggleButton.contains(event.target);

    if (!isClickInsideMenu && !isClickOnButton) {
      menu.classList.add("hidden");
    }
  });
  // Active menu toggle (optional)

  //   block py-2 px-3 text-white bg-blue-700 rounded-sm md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500
});
