
function cmd_page_right()
{
	var scroll_position = J('div#film_queue').scrollLeft();
	J('div#film_queue').animate({
		scrollLeft: (scroll_position + 200)
	} , 800);
}


function cmd_page_left()
{
	var scroll_position = J('div#film_queue').scrollLeft();
	J('div#film_queue').animate({
		scrollLeft: (scroll_position - 200)
	} , 800);
}


J(document).ready(function(){
	J('div#film_list_right').click(function()
	{
		cmd_page_right();
	});
	
	J('div#film_list_left').click(function()
	{
		cmd_page_left();
	});
});