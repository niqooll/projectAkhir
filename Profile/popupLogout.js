const asideLinks = document.querySelectorAll("aside ul li");
asideLinks.forEach((link) => {
  link.addEventListener("click", function () {
    asideLinks.forEach((l) => l.classList.remove("active"));
    this.classList.add("active");
  });
});
