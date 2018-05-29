$(function()
	{
		let product_alias = "product.php?id=";

		let content = $('#_chat');

		function get_comment(id, title, body, user)
		{
			return "<a href=\"#\" class=\"list-group-item list-group-item-action flex-column align-items-start border border-secondary rounded\">\
                    	<div class=\"d-flex w-100 justify-content-between\" >\
                        	<h5 class=\"mb-1\">" + title + "</h5>\
                        	<small>" + time +"</small>\
                      	</div>\
                      	<p class=\"mb-1\">" + body + "</p>\
                      	<small>" + user + "</small>\
                   	</a>";
		}


	});