<script type="text/javascript">var $ = window.jQuery;</script><script src="<?php echo get_template_directory_uri(); ?>/assets/js/webflow.js?v=1696429158" type="text/javascript"></script>
<script type="text/javascript" src="https://kenwheeler.github.io/slick/slick/slick.js"></script>
<script>
	$(document).ready(function() {
$('#slick-wrapper').slick({
dots: false,
autoplay: true,
				autoplaySpeed: 2000,
			arrows: false,
speed: 1000,
responsive: [
{
breakpoint: 1440,
settings: {
arrows: false,
}
},
{
breakpoint: 800,
settings: {
arrows: false,
}
},
{
breakpoint: 600,
settings: {
arrows: false,
}
},
{
breakpoint: 478,
settings: {
arrows: false,
}
}
]
});
});
</script>
<script>
$(document).ready(function() {
$('.btn-sec--med').click(function() {
var apiUrl = 'https://x0pw-sykj-esxe.b2.xano.io/api:Bmubv5VR/user-consulta';
var emailValue = $('[email]').val();
var consultaValue = $('[data-five]').val();
// Crear el objeto de datos a enviar a la API
var requestData = {
email: emailValue,
dataFive: consultaValue
};
// Realizar la solicitud a la API
$.ajax({
url: apiUrl,
method: 'POST',
data: JSON.stringify(requestData),
contentType: 'application/json',
success: function(response) {
// Manejar la respuesta de la API aquí
console.log(response);
},
error: function(error) {
// Manejar el error de la solicitud aquí
console.log(error);
}
});
});
});
</script>