/*Codigo js de alertas */

let exitButtons = document.getElementsByClassName("exit");
let alerts = document.querySelector(".container-form-alert");
let body = document.querySelector(".body");

for (let i = 0; i < exitButtons.length; i++) {
  exitButtons[i].addEventListener("click", function () {
    // Ocultar el elemento estableciendo su atributo "display" a "none"
    alerts.style.display = "none";
    body.style.overflow = "scroll";
  });
  if ((alerts.style.display = "block")) {
    body.style.overflow = "hidden";
  }
}
