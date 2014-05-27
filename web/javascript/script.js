$(document).ready(function() {
	$('.ui.dropdown').dropdown();
	$('.ui.selection.dropdown').dropdown();
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
    var date = new Date();
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();
    var h = {};
    $("#calendar").fullCalendar({
        header: h,
        selectable: true,
        editable: true,
        draggable: true,
        droppable: false
    });

	$(".elearning_menu").click(function (){
		var $i = $(this).attr("id");
		var $el = $('.elearning_content#' + $i);
		$('.elearning_content').hide();
		$el.show();
	});
});
