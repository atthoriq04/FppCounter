function changeNavbar(links, docTitle) {
  links.forEach((link) => {
    if (link.innerHTML === docTitle) {
      link.classList.add("text-blue-500", "md:dark:text-blue-500");
      link.classList.remove("text-gray-900", "dark:text-white");
    }
  });
}

export { changeNavbar };
