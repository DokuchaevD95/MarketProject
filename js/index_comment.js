$(function()
	{
		let product_alias = "product.php?id=";
		let comments_content = $('#_chat');
		let count = 5;

		function get_comment(id, title, body, user, time)
		{
			console.log(id, title, body, user, time);
			return "<a href=\"" + product_alias + id +"\" class=\"list-group-item list-group-item-action flex-column align-items-start text-left rounded-0\">\
                    <div class=\"d-flex w-100 justify-content-between\">\
                      <h5 class=\"mb-1\">" + title + "</h5>\
                      <small class=\"text-muted\">" + time + "</small>\
                    </div>\
                    <p class=\"mb-1\">" + body + "</p>\
                    <small class=\"text-muted\">" + user + "</small>\
                  </a>";
		}

		$.post('get_comments.php', {'count': count}, function(response){
			console.log(response);
			for(let i = 0; i < response.length; i++)
			{
				time = response[i].time.split('.')[0];
				console.log(time);
				$(get_comment(response[i].id, response[i].title, response[i].body, response[i].user, time)).appendTo(comments_content);
			}
		}, 'json');

	});