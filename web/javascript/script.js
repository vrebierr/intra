$(document).ready(function() {
	$('.ui.dropdown').dropdown();
	$('.ui.accordion').accordion();
	$('.ui.blue.button.show.form').click(function() {
		$('.form.thread').transition('slide down');
	});
});
