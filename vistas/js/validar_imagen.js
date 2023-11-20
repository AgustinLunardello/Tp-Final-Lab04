$("#imagen_producto").change(function () {
  var imagenLogo = this.files[0];

  if (imagenLogo["type"] != "image/jpeg" && imagenLogo["type"] != "image/png") {
    $("#imagen_producto").val("");
    Swal.fire({
      title: "Error al subir la imagen",
      text: "¡La imagen debe estar en formato JPG o PNG!",
      icon: "error",
      confirmButtonText: "¡Cerrar!",
    });
  } else if (imagenLogo["size"] > 1000000) {
    $("#imagen_producto").val("");
    Swal.fire({
      title: "Error al subir la imagen",
      text: "¡La imagen no debe pesar más de 1MB!",
      icon: "error",
      confirmButtonText: "¡Cerrar!",
    });
  } else {
    var datosImagen = new FileReader();
    datosImagen.readAsDataURL(imagenLogo);
    $(datosImagen).on("load", function (event) {
      var rutaImagen = event.target.result;
      $(".previsualizarLogo").attr("src", rutaImagen);
    });
  }
});
