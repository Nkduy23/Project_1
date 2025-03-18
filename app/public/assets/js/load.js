function loadComponent(componentId, filePath) {
  fetch(filePath)
    .then((response) => response.text())
    .then((data) => {
      document.getElementById(componentId).innerHTML = data;
    })
    .catch((error) => console.error(`Lỗi khi tải ${filePath}:`, error));
}

loadComponent("header", "../views/partials/header.html");
loadComponent("footer", "../views/partials/footer.html");
loadComponent("launcher", "../views/partials/launcher.html");
