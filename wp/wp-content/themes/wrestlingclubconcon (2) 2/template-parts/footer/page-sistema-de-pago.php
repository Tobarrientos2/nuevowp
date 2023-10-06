<script type="text/javascript">var $ = window.jQuery;</script><script src="<?php echo get_template_directory_uri(); ?>/assets/js/webflow.js?v=1696429158" type="text/javascript"></script>
<script>
$(document).ready(function() {
$('[data-copy]').click(function() {
var contenido = $(this).attr('data-copy');
// Crear un elemento de texto temporal
var tempElement = $('<textarea>');
tempElement.val(contenido);
// Agregar el elemento de texto al cuerpo del documento
$(document.body).append(tempElement);
// Seleccionar y copiar el contenido del texto
tempElement[0].select();
document.execCommand('copy');
// Eliminar el elemento de texto temporal
tempElement.remove();
});
});
</script>
<script>
$(document).ready(function() {
$('[data-precio]').click(function() {
var nuevoPrecio = $(this).attr('data-precio');
$('#precio').text(nuevoPrecio);
});
});
</script>
<script>
$(document).ready(function() {
$('.dropdown-form').change(function() {
var hasDataClase = $(this).is('[data-clase]');
var hasDataClase2 = $(this).is('[data-clase-2]');
if (hasDataClase || hasDataClase2) {
$('#boton-multiseleccion').prop('disabled', false);
} else {
$('#boton-multiseleccion').prop('disabled', true);
}
});
});
</script>
<script>
$(document).ready(function() {
$('.btn-prm--med').click(function() {
var apiUrl = 'https://x0pw-sykj-esxe.b2.xano.io/api:Bmubv5VR/user-pago';
var nombre = $('[named]').val();
var emailValue = $('[email]').val();
var claseValue = $('[data-one]').val();
var planValue = $('[data-two]').val();
var nombreAlumno = $('[data-three]').val();
var rutAlumno = $('[data-four]').val();
// Crear el objeto de datos a enviar a la API
var requestData = {
email: emailValue,
name: nombre,
dataOne: claseValue,
dataTwo: planValue,
dataThree: nombreAlumno,
dataFour: rutAlumno
};
// Realizar la solicitud a la API
$.ajax({
url: apiUrl,
method: 'POST',
data: JSON.stringify(requestData),
contentType: 'application/json',
success: function(response) {
},
error: function(error) {
// Manejar el error de la solicitud aquí
console.log(error);
}
});
});
});
</script>