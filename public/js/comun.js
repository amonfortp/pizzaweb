var correo;
var direccion;

var inputCheck = document.getElementsByClassName("check");
calcularPrecio();

//Añade un evento onchange en los checkbox para realizar cierta accion cada vez que alguien iteractua con ellas
for (var i = 0; i < inputCheck.length; i++) {
  if (inputCheck[i].checked == true) {
    inputCheck[i].parentElement.style.backgroundColor = "#2ec4b586";
  }

  inputCheck[i].onchange = function () {
    if (this.checked == true) {
      this.parentElement.style.backgroundColor = "#2ec4b586";
      document.getElementById("ingrediente" + this.id).hidden = false;
    } else {
      this.parentElement.style.backgroundColor = "#fdfffc";
      document.getElementById("ingrediente" + this.id).hidden = true;
    }

    calcularPrecio();
  };
}

//En caso de pulsar el boton para realizar el pedido solicitara una serie de datos y al final los guardara en variable para su proximo uso
document.getElementById("pedido").onclick = function () {
  var c = window.prompt("Necesitamos una cuenta de correo electrónico");
  var d;

  if (c == null || c == "") {
    alert("No se ha realizado el pedido");
  } else {
    d = window.prompt("Necesitamos una dirección");
    if (d == null || c == "") {
      alert("No se ha realizado el pedido");
    } else {
      if (confirm("¿Confirma el pedido?")) {
        alert("El pedido ha sido recivido");
        correo = c;
        direccion = d;
      } else {
        alert("No se ha realizado el pedido");
      }
    }
  }
};

//Calcula el precio de las pizzas según los ingredientes seleccionados con su 50% extra
function calcularPrecio() {
  suma = 0;
  for (var i = 0; i < inputCheck.length; i++) {
    if (inputCheck[i].checked == true) {
      console.log();
      suma += Number(document.getElementById("i" + inputCheck[i].id).value);
    }
  }
  document.getElementById("precio").innerHTML =
    "Precio: " + (suma + suma * 0.5) + "€";
}
