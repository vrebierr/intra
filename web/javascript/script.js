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
	$(".part").popup();
	$(".donught.chart").knob({
		readOnly:true,
		fgColor:"#6ECFF5"
	});

	$('.show.activities').click(function() {
		if ($(this).attr("class") == "show activities")
			$(this).attr("class", "show activities active");
		else
			$(this).attr("class", "show activities");
		if ($(this).parents('tbody').children(".hidden."+$(this).attr("data-text")).length != 0)
			$(this).parents('tbody').children(".hidden."+$(this).attr("data-text")).attr("class", ""+$(this).attr("data-text"));
		else
			$(this).parents('tbody').children("."+$(this).attr("data-text")).attr("class", "hidden "+$(this).attr("data-text"));
	});

	$('.directory_option').click(function ()
	{
		$(location).attr('href', "./?range="+$(this).attr("data-text"));
	});
});
