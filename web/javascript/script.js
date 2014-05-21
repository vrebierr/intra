$(document).ready(function() {
	$('.ui.dropdown').dropdown();
	$('.ui.accordion').accordion();
	$('.ui.blue.button.show.form').click(function() {
		$('.form.thread').transition('slide down');
	});
	$('.ui.blue.tiny.button.show.comment').click(function() {
		$(this).parents('.post').children('.form.comment').transition('slide down');
	});
	$('.ui.sortable').tablesort();
	$(".refresh.icon").popup();
	$(".donught.chart").knob({
		readOnly:true,
		fgColor:"#6ECFF5"
	});
});
