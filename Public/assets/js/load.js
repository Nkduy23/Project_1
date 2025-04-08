function loadComponent(componentId, filePath) {
  fetch(filePath)
    .then((response) => response.text())
    .then((data) => {
      document.getElementById(componentId).innerHTML = data;
    })
    .catch((error) => console.error(`Lỗi khi tải ${filePath}:`, error));
}

loadComponent("header", "../Views/partials/header.html");
loadComponent("footer", "../Views/partials/footer.html");
loadComponent("launcher", "../Views/partials/launcher.html");
