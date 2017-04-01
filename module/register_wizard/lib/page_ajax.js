function opt_change (input)
{
	J.ajax({
		type: "POST",                   
		url: 'fin_or_del.php',
		data: 
		{
			doc_id: input
        },
		success:function(response)
		{                  
			J("span.t" + input).html(response);
        }
    });
}
//--------------------------------   
function cmd_page_up_c()
{
	var scroll_position = J('#list_no_up_and_down').scrollTop();
	J('#list_no_up_and_down').animate({
		scrollTop: (scroll_position - 130)
	} , 750);
}

/**
 * Scroll Down the window
 */
function cmd_page_down_c()
{
	var scroll_position = J('#list_no_up_and_down').scrollTop();
	J('#list_no_up_and_down').animate({
		scrollTop: (scroll_position + 130)
	} , 750);
}
/**
 * Listener, for global paging monitoring
 */
J(document).ready(function(){
	J('a#p_up').click(function()
	{
		cmd_page_up_c();
	});
	
	J('a#p_down').click(function()
	{
		cmd_page_down_c();
	});
});