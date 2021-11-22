function habilitar() {
  nombre = document.getElementById("txt-nombre").value;
  apPaterno = document.getElementById("txt-apPaterno").value;
  apMaterno = document.getElementById("txt-apMaterno").value;
  edad = document.getElementById("txt-edad").value;
  catInteres = document.getElementById("txt-catInteres").value;
  terminos = document.getElementById("ck-terminos").checked;
  val = 0;
  if (nombre == "") {
    val++;
  }
  if (apPaterno == "") {
    val++;
  }
  if (apMaterno == "") {
    val++;
  }
  if (edad == "") {
    val++;
  }
  if (catInteres == "") {
    val++;
  }
  if (!terminos) {
    val++;
  }
  if (val == 0) {
    document.getElementById("boton").disabled = false;
  } else {
    document.getElementById("boton").disabled = true;
  }
}
document.getElementById("txt-nombre").addEventListener("keyup", habilitar);
document.getElementById("txt-apPaterno").addEventListener("keyup", habilitar);
document.getElementById("txt-apMaterno").addEventListener("keyup", habilitar);
document.getElementById("txt-edad").addEventListener("keyup", habilitar);
document.getElementById("txt-catInteres").addEventListener("change", habilitar);
document.getElementById("ck-terminos").addEventListener("change", habilitar);
