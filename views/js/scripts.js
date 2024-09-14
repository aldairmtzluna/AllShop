if (document.querySelector("#container-slider")) {
  setInterval('fntExecuteSlide("next")', 5000);
}
//------------------------------ LIST SLIDER -------------------------
if (document.querySelector(".listslider")) {
  let link = document.querySelectorAll(".listslider li a");
  link.forEach(function (link) {
    link.addEventListener("click", function (e) {
      e.preventDefault();
      let item = this.getAttribute("itlist");
      let arrItem = item.split("_");
      fntExecuteSlide(arrItem[1]);
      return false;
    });
  });
}

function fntExecuteSlide(side) {
  let parentTarget = document.getElementById("slider");
  let elements = parentTarget.getElementsByTagName("li");
  let curElement, nextElement;

  for (var i = 0; i < elements.length; i++) {
    if (elements[i].style.opacity == 1) {
      curElement = i;
      break;
    }
  }
  if (side == "prev" || side == "next") {
    if (side == "prev") {
      nextElement = curElement == 0 ? elements.length - 1 : curElement - 1;
    } else {
      nextElement = curElement == elements.length - 1 ? 0 : curElement + 1;
    }
  } else {
    nextElement = side;
    side = curElement > nextElement ? "prev" : "next";
  }
  //RESALTA LOS PUNTOS
  let elementSel = document
    .getElementsByClassName("listslider")[0]
    .getElementsByTagName("a");
  elementSel[curElement].classList.remove("item-select-slid");
  elementSel[nextElement].classList.add("item-select-slid");
  elements[curElement].style.opacity = 0;
  elements[curElement].style.zIndex = 0;
  elements[nextElement].style.opacity = 1;
  elements[nextElement].style.zIndex = 1;
}
// scripts de archivo headerSeller.php
//SELLER HEADER EFECTS

let rowHeader = document.querySelector("#rowHeader");
let info = document.querySelector("#info");

function infoSeller() {
  let actualStateInfo = info.style.display;
  let actualStateRow = row.style.transform;

  if (actualStateInfo == "none") {
    info.style.display = "block";
  } else if ((actualStateRow = "rotate(0deg)")) {
    rowHeader.style.transform = "rotate(180deg)";
  }
  if ((actualStateHrowHeader = "rotate(180deg)")) {
    info.style.display = "block";
  }
  if (actualStateInfo == "block") {
    rowHeader.style.transform = "rotate(0deg)";
  }
  if (actualStateInfo == "block") {
    info.style.display = "none";
  } else {
    rowHeader.style.transform = "rotate(180deg)";
  }
}

// scripts de archivo navSeller.php

let row = document.querySelector("#row");
let items = document.querySelector(".items-nav-seller");

function item() {
  let actualState = items.style.display;
  let rowState = row.style.transform;
  if (actualState == "none") {
    items.style.display = "block";
  } else if ((rowState = "rotate(0deg)")) {
    row.style.transform = "rotate(180deg)";
  }
  if ((rowState = "rotate(180deg)")) {
    items.style.display = "block";
  }
  if (actualState == "block") {
    row.style.transform = "rotate(0deg)";
  }
  if (actualState == "block") {
    items.style.display = "none";
  } else {
    row.style.transform = "rotate(180deg)";
  }
}

let rowOne = document.querySelector("#rowOne");
let itemsOne = document.querySelector(".one");

function itemOne() {
  let actualStateOne = itemsOne.style.display;
  let rowStateOne = rowOne.style.transform;
  if (actualStateOne == "none") {
    itemsOne.style.display = "block";
  } else if ((rowStateOne = "rotate(0deg)")) {
    rowOne.style.transform = "rotate(180deg)";
  }
  if ((rowStateOne = "rotate(180deg)")) {
    itemsOne.style.display = "block";
  }
  if (actualStateOne == "block") {
    rowOne.style.transform = "rotate(0deg)";
  }
  if (actualStateOne == "block") {
    itemsOne.style.display = "none";
  } else {
    rowOne.style.transform = "rotate(180deg)";
  }
}

let rowTwo = document.querySelector("#rowTwo");
let itemsTwo = document.querySelector(".two");

function itemTwo() {
  let actualStateTwo = itemsTwo.style.display;
  let rowStateTwo = rowTwo.style.transform;
  if (actualStateTwo == "none") {
    itemsTwo.style.display = "block";
  } else if ((rowStateTwo = "rotate(0deg)")) {
    rowTwo.style.transform = "rotate(180deg)";
  }
  if ((rowStateTwo = "rotate(180deg)")) {
    itemsTwo.style.display = "block";
  }
  if (actualStateTwo == "block") {
    rowTwo.style.transform = "rotate(0deg)";
  }
  if (actualStateTwo == "block") {
    itemsTwo.style.display = "none";
  } else {
    rowTwo.style.transform = "rotate(180deg)";
  }
}

let rowThree = document.querySelector("#rowThree");
let itemsThree = document.querySelector(".three");

function itemThree() {
  let actualStateThree = itemsThree.style.display;
  let rowStateThree = rowThree.style.transform;
  if (actualStateThree == "none") {
    itemsThree.style.display = "block";
  } else if ((rowStateThree = "rotate(0deg)")) {
    rowThree.style.transform = "rotate(180deg)";
  }
  if ((rowStateThree = "rotate(180deg)")) {
    itemsThree.style.display = "block";
  }
  if (actualStateThree == "block") {
    rowThree.style.transform = "rotate(0deg)";
  }
  if (actualStateThree == "block") {
    itemsThree.style.display = "none";
  } else {
    rowThree.style.transform = "rotate(180deg)";
  }
}

let rowFour = document.querySelector("#rowFour");
let itemsFour = document.querySelector(".four");

function itemFour() {
  let actualStateFour = itemsFour.style.display;
  let rowStateFour = rowFour.style.transform;
  if (actualStateFour == "none") {
    itemsFour.style.display = "block";
  } else if ((rowStateFour = "rotate(0deg)")) {
    rowFour.style.transform = "rotate(180deg)";
  }
  if ((rowStateFour = "rotate(180deg)")) {
    itemsFour.style.display = "block";
  }
  if (actualStateFour == "block") {
    rowFour.style.transform = "rotate(0deg)";
  }
  if (actualStateFour == "block") {
    itemsFour.style.display = "none";
  } else {
    rowFour.style.transform = "rotate(180deg)";
  }
}

let rowFive = document.querySelector("#rowFive");
let itemsFive = document.querySelector(".five");

function itemFive() {
  let actualStateFive = itemsFive.style.display;
  let rowStateFive = rowFive.style.transform;
  if (actualStateFive == "none") {
    itemsFive.style.display = "block";
  } else if ((rowStateFive = "rotate(0deg)")) {
    rowFive.style.transform = "rotate(180deg)";
  }
  if ((rowStateFive = "rotate(180deg)")) {
    itemsFive.style.display = "block";
  }
  if (actualStateFive == "block") {
    rowFive.style.transform = "rotate(0deg)";
  }
  if (actualStateFive == "block") {
    itemsFive.style.display = "none";
  } else {
    rowFive.style.transform = "rotate(180deg)";
  }
}

let rowSix = document.querySelector("#rowSix");
let itemsSix = document.querySelector(".six");

function itemSix() {
  let actualStateSix = itemsSix.style.display;
  let rowStateSix = rowSix.style.transform;
  if (actualStateSix == "none") {
    itemsSix.style.display = "block";
  } else if ((rowStateSix = "rotate(0deg)")) {
    rowSix.style.transform = "rotate(180deg)";
  }
  if ((rowStateSix = "rotate(180deg)")) {
    itemsSix.style.display = "block";
  }
  if (actualStateSix == "block") {
    rowSix.style.transform = "rotate(0deg)";
  }
  if (actualStateSix == "block") {
    itemsSix.style.display = "none";
  } else {
    rowSix.style.transform = "rotate(180deg)";
  }
}

let rowSeven = document.querySelector("#rowSeven");
let itemsSeven = document.querySelector(".seven");

function itemSeven() {
  let actualStateSeven = itemsSeven.style.display;
  let rowStateSeven = rowSeven.style.transform;
  if (actualStateSeven == "none") {
    itemsSeven.style.display = "block";
  } else if ((rowStateSeven = "rotate(0deg)")) {
    rowSeven.style.transform = "rotate(180deg)";
  }
  if ((rowStateSeven = "rotate(180deg)")) {
    itemsSeven.style.display = "block";
  }
  if (actualStateSeven == "block") {
    rowSeven.style.transform = "rotate(0deg)";
  }
  if (actualStateSeven == "block") {
    itemsSeven.style.display = "none";
  } else {
    rowSeven.style.transform = "rotate(180deg)";
  }
}

//Scripts del archivo indexSeller.php

let exit = document.querySelector("#exit");
let modal = document.querySelector("#modal");
let comments = document.querySelector("#bubble-coemments");

function exitComSeller() {
  let actualStateModal = modal.style.display;
  if (actualStateModal == "none") {
    modal.style.display = "block";
  } else {
    modal.style.display = "none";
  }
}

function openComSeller() {
  let actualStateModal = modal.style.display;
  if (actualStateModal == "block") {
    modal.style.display = "none";
  } else {
    modal.style.display = "block";
  }
}

let exitAtt = document.querySelector("#exit-att");
let modalAtt = document.querySelector("#modal-att");

function exitAt() {
  let actualStateAtt = modalAtt.style.display;
  if (actualStateAtt == "none") {
    modalAtt.style.display = "block";
  } else {
    modalAtt.style.display = "none";
  }
}

function openAt() {
  let actualStateAtt = modalAtt.style.display;
  if (actualStateAtt == "block") {
    modalAtt.style.display = "none";
  } else {
    modalAtt.style.display = "block";
  }
}

//Scripts del archivo addProductsSeller.php

document.addEventListener("DOMContentLoaded", function () {
  // Obtén todos los enlaces con la clase "link-item-add-products"
  var links = document.querySelectorAll(".link-item-add-products");

  // Recorre todos los enlaces y agrega el evento clic a cada uno
  links.forEach(function (link) {
    link.addEventListener("click", function (event) {
      event.preventDefault(); // Evita el comportamiento predeterminado del enlace

      var target = this.getAttribute("href"); // Obtiene el atributo href del enlace
      var targetElement = document.querySelector(target); // Obtiene el elemento con el ID correspondiente

      // Calcula la posición del elemento de destino
      var offsetTop = targetElement.offsetTop;
      var offsetLeft = targetElement.offsetLeft;

      // Realiza el desplazamiento suave animado
      scrollToSmoothly(offsetTop, 800); // 800 es la duración de la animación en milisegundos
    });
  });

  // Función para realizar el desplazamiento suave
  function scrollToSmoothly(pos, duration) {
    var currentPos = window.pageYOffset; // Posición actual de desplazamiento vertical
    var start = null;

    // Función de animación
    function animation(currentTime) {
      if (start === null) start = currentTime;

      var progress = currentTime - start; // Progreso de la animación
      var ease = easeInOutQuad(
        progress,
        currentPos,
        pos - currentPos,
        duration
      ); // Cálculo de la posición actual

      window.scrollTo(0, ease); // Realiza el desplazamiento

      if (progress < duration) {
        // Continúa la animación
        requestAnimationFrame(animation);
      }
    }

    // Función de aceleración/deceleración para la animación
    function easeInOutQuad(t, b, c, d) {
      t /= d / 2;
      if (t < 1) return (c / 2) * t * t + b;
      t--;
      return (-c / 2) * (t * (t - 2) - 1) + b;
    }

    // Inicia la animación
    requestAnimationFrame(animation);
  }
});

$(document).ready(function () {
  //--------------------- SELECCIONAR FOTO PRODUCTO ---------------------
  $("#foto").on("change", function () {
    var uploadFoto = document.getElementById("foto").value;
    var foto = document.getElementById("foto").files;
    var nav = window.URL || window.webkitURL;
    var contactAlert = document.getElementById("form_alert");

    if (uploadFoto != "") {
      var type = foto[0].type;
      var name = foto[0].name;
      if (type != "image/jpeg" && type != "image/jpg" && type != "image/png") {
        contactAlert.innerHTML =
          '<p class="errorArchivo">El archivo no es válido.</p>';
        $("#img").remove();
        $(".delPhoto").addClass("notBlock");
        $("#foto").val("");
        return false;
      } else {
        contactAlert.innerHTML = "";
        $("#img").remove();
        $(".delPhoto").removeClass("notBlock");
        var objeto_url = nav.createObjectURL(this.files[0]);
        $(".prevPhoto").append("<img id='img' src=" + objeto_url + ">");
        $(".upimg label").remove();
      }
    } else {
      alert("No selecciono foto");
      $("#img").remove();
    }
  });

  $(".delPhoto").click(function () {
    $("#foto").val("");
    $(".delPhoto").addClass("notBlock");
    $("#img").remove();
  });
});

$(document).ready(function () {
  //--------------------- SELECCIONAR VIDEO DEL PRODUCTO ---------------------
  $("#videos").on("change", function () {
    var uploadvideos = document.getElementById("videos").value;
    var videos = document.getElementById("videos").files;
    var nav = window.URL || window.webkitURL;
    var contactAlert = document.getElementById("form_alert");

    if (uploadvideos != "") {
      var type = videos[0].type;
      var name = videos[0].name;
      if (type != "image/jpeg" && type != "image/jpg" && type != "image/png") {
        contactAlert.innerHTML =
          '<p class="errorArchivo">El archivo no es válido.</p>';
        $("#vds").remove();
        $(".delVideos").addClass("notBlockVideos");
        $("#videos").val("");
        return false;
      } else {
        contactAlert.innerHTML = "";
        $("#vds").remove();
        $(".delVideos").removeClass("notBlockVideos");
        var objeto_url = nav.createObjectURL(this.files[0]);
        $(".prevVideos").append("<img id='vds' src=" + objeto_url + ">");
        $(".upvds label").remove();
      }
    } else {
      alert("No selecciono video");
      $("#vds").remove();
    }
  });

  $(".delVideos").click(function () {
    $("#videos").val("");
    $(".delVideos").addClass("notBlockVideos");
    $("#vds").remove();
  });
});

$(document).ready(function () {
  //--------------------- SELECCIONAR VIDEO DEL PRODUCTO ---------------------
  $("#videoss").on("change", function () {
    var uploadvideoss = document.getElementById("videoss").value;
    var videoss = document.getElementById("videoss").files;
    var nav = window.URL || window.webkitURL;
    var contactAlert = document.getElementById("form_alert");

    if (uploadvideoss != "") {
      var type = videoss[0].type;
      var name = videoss[0].name;
      if (type != "image/jpeg" && type != "image/jpg" && type != "image/png") {
        contactAlert.innerHTML =
          '<p class="errorArchivo">El archivo no es válido.</p>';
        $("#vdss").remove();
        $(".delVideoss").addClass("notBlockVideoss");
        $("#videoss").val("");
        return false;
      } else {
        contactAlert.innerHTML = "";
        $("#vdss").remove();
        $(".delVideoss").removeClass("notBlockVideoss");
        var objeto_url = nav.createObjectURL(this.files[0]);
        $(".prevVideoss").append("<img id='vdss' src=" + objeto_url + ">");
        $(".upvdss label").remove();
      }
    } else {
      alert("No selecciono video");
      $("#vdss").remove();
    }
  });

  $(".delVideoss").click(function () {
    $("#videoss").val("");
    $(".delVideoss").addClass("notBlockVideoss");
    $("#vdss").remove();
  });
});

$(document).ready(function () {
  //--------------------- SELECCIONAR VIDEO DEL PRODUCTO ---------------------
  $("#videosss").on("change", function () {
    var uploadvideosss = document.getElementById("videosss").value;
    var videosss = document.getElementById("videosss").files;
    var nav = window.URL || window.webkitURL;
    var contactAlert = document.getElementById("form_alert");

    if (uploadvideosss != "") {
      var type = videosss[0].type;
      var name = videosss[0].name;
      if (type != "image/jpeg" && type != "image/jpg" && type != "image/png") {
        contactAlert.innerHTML =
          '<p class="errorArchivo">El archivo no es válido.</p>';
        $("#vdsss").remove();
        $(".delVideosss").addClass("notBlockVideosss");
        $("#videosss").val("");
        return false;
      } else {
        contactAlert.innerHTML = "";
        $("#vdsss").remove();
        $(".delVideosss").removeClass("notBlockVideosss");
        var objeto_url = nav.createObjectURL(this.files[0]);
        $(".prevVideosss").append("<img id='vdsss' src=" + objeto_url + ">");
        $(".upvdsss label").remove();
      }
    } else {
      alert("No selecciono video");
      $("#vdsss").remove();
    }
  });

  $(".delVideosss").click(function () {
    $("#videosss").val("");
    $(".delVideosss").addClass("notBlockVideosss");
    $("#vdsss").remove();
  });
});

$(document).ready(function () {
  //--------------------- SELECCIONAR VIDEO DEL PRODUCTO ---------------------
  $("#video").on("change", function () {
    var uploadvideo = document.getElementById("video").value;
    var video = document.getElementById("video").files;
    var nav = window.URL || window.webkitURL;
    var contactAlert = document.getElementById("form_alert");

    if (uploadvideo != "") {
      var type = video[0].type;
      var name = video[0].name;
      if (type != "video/mp4") {
        contactAlert.innerHTML =
          '<p class="errorArchivo">El archivo no es válido.</p>';
        $("#vd").remove();
        $(".delVideo").addClass("notBlockVideo");
        $("#video").val("");
        return false;
      } else {
        contactAlert.innerHTML = "";
        $("#vd").remove();
        $(".delVideo").removeClass("notBlockVideo");
        var objeto_url = nav.createObjectURL(this.files[0]);
        $(".prevVideo").append("<img id='vd' src=" + objeto_url + ">");
        $(".upvd label").remove();
      }
    } else {
      alert("No selecciono video");
      $("#vd").remove();
    }
  });

  $(".delVideo").click(function () {
    $("#video").val("");
    $(".delVideo").addClass("notBlockVideo");
    $("#vd").remove();
  });
});


function subcategory() {
  let category = document.getElementById("category");
  let electronic = document.getElementById("electronic");
  let mensFootwear = document.getElementById("mensFootwear");
  let womensFootwear = document.getElementById("womensFootwear");
  let videoGames = document.getElementById("videoGames");
  let health = document.getElementById("health");
  let watches = document.getElementById("watches");
  let beauty = document.getElementById("beauty");
  let home = document.getElementById("home");
  let sports = document.getElementById("sports");
  let cars = document.getElementById("cars");
  let womenswear = document.getElementById("womenswear");
  let menswear = document.getElementById("menswear");
  let trips = document.getElementById("trips");
  let books = document.getElementById("books");
  let pets = document.getElementById("pets");
  let stationery = document.getElementById("stationery");
  let kits = document.getElementById("kits");
  let appliances = document.getElementById("appliances");
  let basicContainer = document.getElementById("basic");
  let sizes = document.getElementById("sizes");

  if (category.value === '1') {
    electronic.style.display = 'block';
  }else {
    electronic.style.display = 'none';
  }

   if (category.value === '2') {
    mensFootwear.style.display = 'block';
    sizes.style.display = 'block';
  }else {
    mensFootwear.style.display = 'none';
    sizes.style.display = 'none';
  }

   if (category.value === '3') {
    womensFootwear.style.display = 'block';
    sizes.style.display = 'block';
  }else {
    womensFootwear.style.display = 'none';
  }

   if (category.value === '4') {
    videoGames.style.display = 'block';
  }else {
    videoGames.style.display = 'none';
  }

   if (category.value === '5') {
    health.style.display = 'block';
  }else {
    health.style.display = 'none';
  }

   if (category.value === '6') {
    watches.style.display = 'block';
  }else {
    watches.style.display = 'none';
  }

   if (category.value === '7') {
    beauty.style.display = 'block';
  }else {
    beauty.style.display = 'none';
  }

   if (category.value === '8') {
    home.style.display = 'block';
  }else {
    home.style.display = 'none';
  }

   if (category.value === '9') {
    sports.style.display = 'block';
  }else {
    sports.style.display = 'none';
  }

   if (category.value === '10') {
    cars.style.display = 'block';
  }else {
    cars.style.display = 'none';
  }

   if (category.value === '11') {
    womenswear.style.display = 'block';
  }else {
    womenswear.style.display = 'none';
  }

   if (category.value === '12') {
    menswear.style.display = 'block';
  }else {
    menswear.style.display = 'none';
  }

   if (category.value === '13') {
    trips.style.display = 'block';
  }else {
    trips.style.display = 'none';
  }

   if (category.value === '14') {
    books.style.display = 'block';
  }else {
    books.style.display = 'none';
  }

   if (category.value === '15') {
    pets.style.display = 'block';
  }else {
    pets.style.display = 'none';
  }

   if (category.value === '16') {
    stationery.style.display = 'block';
  }else {
    stationery.style.display = 'none';
  }

   if (category.value === '19') {
    kits.style.display = 'block';
  }else {
    kits.style.display = 'none';
  }

   if (category.value === '21') {
    appliances.style.display = 'block';
  }else {
    appliances.style.display = 'none';
  }


let actualStateSubcategoryElectronic = electronic.style.display;
let actualStateSubcategoryMensFootwear = mensFootwear.style.display;
let actualStateSubcategoryWomensFootwear = womensFootwear.style.display;
let actualStateSubcategoryVideoGames = videoGames.style.display;
let actualStateSubcategoryHealth = health.style.display;
let actualStateSubcategoryWatches = watches.style.display;
let actualStateSubcategoryBeauty = beauty.style.display;
let actualStateSubcategoryHome = home.style.display;
let actualStateSubcategorySports = sports.style.display;
let actualStateSubcategoryCars = cars.style.display;
let actualStateSubcategoryWomenswear = womenswear.style.display;
let actualStateSubcategoryMenswear = menswear.style.display;
let actualStateSubcategoryTrips = trips.style.display;
let actualStateSubcategoryBooks = books.style.display;
let actualStateSubcategoryPets = pets.style.display;
let actualStateSubcategoryStationery = stationery.style.display;
let actualStateSubcategoryKits = kits.style.display;
let actualStateSubcategoryAppliances = appliances.style.display;
let actualStateSize = sizes.style.display;

  if (actualStateSubcategoryElectronic == "block") {
    basicContainer.style.height = "960px";
  }

  if (actualStateSubcategoryMensFootwear == "block") {
    basicContainer.style.height = "960px";
  }

  if (actualStateSubcategoryWomensFootwear == "block") {
    basicContainer.style.height = "960px";
  }

  if (actualStateSubcategoryVideoGames == "block") {
    basicContainer.style.height = "960px";
  }

  if (actualStateSubcategoryBeauty == "block") {
    basicContainer.style.height = "960px";
  }

  if (actualStateSubcategoryAppliances == "block") {
    basicContainer.style.height = "960px";
  }

  if (actualStateSubcategoryKits == "block") {
    basicContainer.style.height = "960px";
  }

  if (actualStateSubcategoryStationery == "block") {
    basicContainer.style.height = "960px";
  }

  if (actualStateSubcategoryTrips == "block") {
    basicContainer.style.height = "960px";
  }

  if (actualStateSubcategoryBooks == "block") {
    basicContainer.style.height = "960px";
  }

  if (actualStateSubcategoryPets == "block") {
    basicContainer.style.height = "960px";
  }

  if (actualStateSubcategoryMenswear == "block") {
    basicContainer.style.height = "960px";
  }

  if (actualStateSubcategoryWomenswear == "block") {
    basicContainer.style.height = "960px";
  }

  if (actualStateSubcategorySports == "block") {
    basicContainer.style.height = "960px";
  }

  if (actualStateSubcategoryCars == "block") {
    basicContainer.style.height = "960px";
  }

  if (actualStateSubcategoryHome == "block") {
    basicContainer.style.height = "960px";
  }

  if (actualStateSubcategoryWatches == "block") {
    basicContainer.style.height = "960px";
  }

  if (actualStateSubcategoryHealth == "block") {
    basicContainer.style.height = "960px";
  }

  if (actualStateSize == "block") {
    basicContainer.style.height = "1020px";
  }
}

function size() {
  let size = document.getElementById('size');
  let actuaBgSize = size.style.background;
  if (actuaBgSize == 'blue') {
    size.style.backgrondColor = '#00ACF1';
  }
}

//Codigo js para productInfo.php

function changeImage(clickedImage) {
  var primaryImage = document
    .getElementById("primary-photo-product")
    .getElementsByTagName("img")[0];
  primaryImage.src = clickedImage.src;
}


//Codigo js para el buscador de header.php

function productsSearch() {
  let search = document.getElementById('search').value.trim();
  let results = document.getElementById('results');
  let server = 'http://localhost/allshop/';
  let body = document.getElementById('body');

  if (search != '') {
    fetch(server + 'controllers/searchController.php?search=' + search)
      .then(response => response.text())
      .then(data => {
        results.style.display = 'block';
        results.innerHTML = data;
      })
        .catch(error => conole.error('Error: ' + error));
  }else {
      results.style.display = 'none';
  }
}

//Codigo js para dataTables

$(document).ready(function () {
  $(".js-example-basic-single").select2();
});
$(document).ready(function () {
  $("#table").DataTable();
});

var table;
document.addEventListener("DOMContentLoaded", function () {
  tableOficios = $("#table").dataTable({
    language: {
      lengthMenu: "Ver _MENU_ regs. por pag.",
      info: "página _PAGE_ de _PAGES_",
      infoEmpty: "No se encontraron resultados",
      infoFiltered: "(filtrada de _MAX_ regs.",
      loadingRecords: "Cargando...",
      processing: "Procesando...",
      search: '<span class="glyphicon glyphicon-search"></span> Buscar ',
      zeroRecords: "No se encontraron registros que coincidan con tu busqueda",
      paginate: {
        next: "Sig.",
        previous: "Ant.",
      },
    },
    resonsieve: "true",
    bDestroy: true,
    iDisplayLength: 5,
  });
});

$("#table").DataTable();

window.addEventListener("load", function () {}, false);
