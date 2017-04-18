<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package zeiss
 */

?>
<script type="text/javascript">
/////map
function initMap() {
	var map = new google.maps.Map(document.getElementById('map'), {
		center: {lat: 55.73868745, lng: 37.6203391},
		scrollwheel: false,
		zoom: 17
	});

	var myLatLng = {lat: 55.73868745, lng: 37.6203391};///Отметка на карте

	// Create a marker and set its position.
	var marker = new google.maps.Marker({
		map: map,
		position: myLatLng,
		title: 'Мы тут!'
	});
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyANBr7lOkCDfxSCrfLBwXWKbDDhhxTZDTk&callback=initMap"	async defer></script>
<?php wp_footer(); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#js__calculator").submit(function() { //устанавливаем событие отправки для формы с id=form
		var form_data = $(this).serialize(); //собераем все данные из формы
			$.ajax({
				type: "POST", //Метод отправки
				url: "<?bloginfo('template_url')?>/inc/send.php", //путь до php фаила отправителя
				data: form_data,
				success: function() {
					//код в этом блоке выполняется при успешной отправке сообщения
					alert("Ваше сообщение отпрвлено!");
				}
			});
			return false;
		});
	});
</script>
<script type="text/javascript">
$(document).ready(function(){
	$(".data").mask("99/99/9999");
	$(".tel").mask("+7(999)-999-9999");
	$(".cpf").mask("999.999.999-99");
	$(".cnpj").mask("99.999.999/9999-99");
});
</script>
</body>
</html>
