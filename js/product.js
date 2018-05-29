$(function(){


	function get_comment(title, body, time, user, id, is_comment, is_login)
	{
		let start, end, style;
		if(is_comment)
		{
			style = " bg-info text-light";
			if(is_login)
			{
				start = "<button type=\"button\" id=\"comment_" + id + "\" data-toggle=\"modal\" data-target=\"#_modal_comment\"";
				end = "</button>";
			}
			else
			{
				start = "<div ";
				end = "</div>";
			}
		}
		else
		{
			style = "";
			start = "<div ";
			end = "</div>";
		}
		return start + "class=\"list-group-item list-group-item-action flex-column align-items-start" + style +"\">\
	    				<div class=\"d-flex w-100 justify-content-between\">\
	      					" + (is_comment ? "<h5 class=\"mb-1\">" + title + "</h5>" : "") + "\
	      					<small>" + time +"</small>\
	   					</div>\
	    				<p class=\"mb-1\">" + body + "</p>\
	    				<small>" + user + "</small>" + end;
	}

	function is_fav(id)
    {
        let fav_list = sessionStorage.getItem('favorite');
        if(!fav_list || JSON.parse(fav_list).length == 0)
            return false;
        else
        {
            fav_list = JSON.parse(fav_list);
            if(fav_list.indexOf(id) >= 0)
                return true;
            else return false;
        }
    }

	function remove_comments()
	{
		$('list-group-item').remove();
	}


	let product_id = $('#_product_id').text();
	product_id = parseInt(product_id);
    
    let my_id = null;
    for(e of document.cookie.split('; '))
    {
        let elem_split = e.split('=');
        if(elem_split[0] == "user_id")
            my_id = parseInt(elem_split[1]);     
    }
    let is_login = my_id > 0 ? true : false;
    
    
	let prop = "id=" + product_id;
	$.get('get_product_from_db.php', prop, function(data){
		response = JSON.parse(data);
		if (!response.error) 
		{
			let seller_id = response.seller;
			console.log(response);
			let content_container = $('#_content_container');
			let image_container = $('#_image_container');
			let comment_container = $('#_chat');

			let img_tag = "<img src=\"" + response.img + "\" class=\"rounded float-left img-fluid\">";
			let name_tag = "<h4 class=\"text-dark\" style=\"margin-top:7px;\">" + response.name + "</h4>";
			let description_tag = "<div class=\"text-secondary\">" + response.description + "</div>";
			let price_tag = "<h6 class=\"text-dark\">Цена: " + response.price + " <i class=\"fa fa-rub\"" + "</h6>";
			
			if(!response.is_selled && $('#_user_id').length !=0)
				$('<hr/>').prependTo(content_container);
			$(description_tag).prependTo(content_container);
			$(price_tag).prependTo(content_container);
			$(name_tag).prependTo(content_container);

			$(img_tag).prependTo(image_container);

			if(is_login && !response.is_selled && (my_id != seller_id))
				$("<div class=\"btn-group \" style=\"display:none;\" id=\"_btn_product_group\">\
					<button class=\"btn btn-primary\" id=\"_buy\">Купить <i class=\"fa fa-credit-card\"></i></button>\
					<button class=\"btn btn" + ( !is_fav(response.id) ? "-outline": "" ) + "-success\" id=\"_favorite_product\"><i class=\"fa fa-heart\"></i></button>\
					</div>").appendTo(content_container);
                
			if(is_login)
			{
				$("<div class=\"d-flex justify-content-center\">\
					<button class=\"btn btn-block btn-primary text-center\" data-toggle=\"modal\" data-target=\"#_modal_comment\" id=\"_new_comment\">Комментировать</button>\
					</div>").prependTo('#_chat');

				$('#_send_comment').bind('click', function()
					{
						let comment_id = sessionStorage.getItem('comment');
						if(comment_id)
						{
							comment_id = parseInt(comment_id);
							let comment_content = $('#_comment_text').val();
							if(comment_content == "")
							{
								$('#_comment_status').text('Ошибка, поле пустое!');
							}
							else
							{
								$.post('send_answer.php', {'comment_id': comment_id, 'user_id': my_id, 'content': comment_content}, function(send_response){
									if(send_response.status)
									{
										$('#_send_comment').prop('disabled', true);
										$('#_comment_status').text(send_response.status);
										document.location.reload();
									}
									else
									{
										$('#_comment_status').text(send_response.error);
									}
								}, 'json');
							}
						}
						else
						{
							let product_id = parseInt(sessionStorage.getItem('product_id'));
							let comment_content = $('#_comment_text').val();
							if(comment_content == "")
								$('#_comment_status').text('Ошибка, поле пустое!');
							else
							{
								$.post('send_comment.php', {'product_id': product_id, 'user_id': my_id, 'content': comment_content}, function(send_response){
									console.log(send_response);
									if(send_response.status)
									{
										$('#_send_comment').prop('disabled', true);
										document.location.reload();
										$('#_send_comment').prop('disabled', true);
									}
									else
										$('#_comment_status').text(send_response.error);
								}, 'json');
							}
						}
						sessionStorage.removeItem('comment_id');
						sessionStorage.removeItem('product_id');
					});

				$('#_new_comment').bind('click', function(){
					sessionStorage.removeItem('comment');
					sessionStorage.setItem('product_id', response.id);
					$('#_comment_status').text("");
					$('#_send_comment').prop('disabled', false);
				});
			}
            
			let buy_btn = $('#_buy');
			let favorite_btn = $('#_favorite_product');

			let comment_btn = $('#_comment');
			let btn_group = $('#_btn_product_group');

			//Комментарии
			$.post("get_comments.php", {'product_id': response.id},function(response_comment){
				response_comment = JSON.parse(response_comment);
				console.log(response_comment);
				$('.list-group-item').remove();
				console.log(response_comment);
				if(!response.error)
				{
					for(let i = 0; i <response_comment.length; i++)
					{
						$(get_comment(response.name, response_comment[i].body, response_comment[i].time.split('.')[0], response_comment[i].user, response_comment[i].id, true, is_login)).appendTo(comment_container);
						$('#comment_' + response_comment[i].id).bind('click', function(){
							sessionStorage.setItem('comment', response_comment[i].id);
							$('#_comment_status').text("");
							sessionStorage.setItem('product_id', response.id);
							$('#_send_comment').prop('disabled', false);
						});
						for(let j = 0; j < response_comment[i].answers.length; j++)
							$(get_comment(null, response_comment[i].answers[j].body, response_comment[i].answers[j].time.split('.')[0], response_comment[i].answers[j].user, false, false, is_login)).appendTo(comment_container);
					}
				}
			});
		

			// Основа карточки товара
			if(btn_group.length > 0)
			{
				if(!response.is_selled)
				{
					btn_group.removeAttr("style");
					buy_btn.bind('click', function(){
						let my_id = $('#_user_id').text();
						$.post('buy_product.php', {'user_id': my_id, 'product_id': product_id}, function(resp){
								resp = JSON.parse(resp);
								if(!resp.error)
								{
                                    alert("Продавец: " + resp.login + "\nНомер телефона: " + resp.phone);
									buy_btn.attr('disabled', 'true');
									favorite_btn.attr('disabled', 'true');
                                    buy_btn.css('display', 'none');
									favorite_btn.css('display', 'none');
                                    $("<div>Продавец: " + resp.login + "</div><div>Номер телефона: " + resp.phone + "</div>").appendTo(content_container);
								}
								else
								{
									alert(resp.error);
								}
							});
						});

					favorite_btn.bind('click', function()
					{
						let prod_id = response.id;
				        let fav_list = sessionStorage.getItem('favorite');
				        console.log(fav_list);
				        if(!fav_list || JSON.parse(fav_list).length == 0)
				        {
				            fav_list = [prod_id];
				            sessionStorage.setItem("favorite", JSON.stringify(fav_list));
				            $('#_favorite_product').removeClass('btn-outline-success');
				            $('#_favorite_product').addClass('btn-success');
				        }
				        else
				        {
				            fav_list = JSON.parse(fav_list);
				            if(fav_list.indexOf(prod_id) >= 0)
				            {
				                fav_list.splice(fav_list.indexOf(prod_id), 1);
				                sessionStorage.setItem("favorite", JSON.stringify(fav_list))
				                $('#_favorite_product').removeClass('btn-success');
				                $('#_favorite_product').addClass('btn-outline-success');
				            }
				            else
				            {
				                fav_list.push(prod_id);
				                sessionStorage.setItem("favorite", JSON.stringify(fav_list))
				                $('#_favorite_product').removeClass('btn-outline-success');
				                $('#_favorite_product').addClass('btn-success');
				            }
				        }
					});
				}
			}
			else
			{
				btn_group.remove();
				if(my_id == response.buyer)
				{
					$.post('get_seller.php', {'product_id': product_id}, function(resp){
						resp = JSON.parse(resp);
						if(!resp.error)
						{
                            $("<hr/><div>Продавец: " + resp.login + "</div><div>Номер телефона: " + resp.phone + "</div>").appendTo(content_container);
						}
						else
						{
							alert(resp.error);
						}
					});
				}
				if(my_id == response.seller)
				{
					$.post('get_buyer.php', {'product_id': product_id}, function(resp){
						resp = JSON.parse(resp);
						if(!resp.error)
						{
                            $("<hr/><div>Покупатель: " + resp.login + "</div><div>Номер телефона: " + resp.phone + "</div>").appendTo(content_container);
						}
						else
						{
							if(!resp.error == "Нет покупателя!")
								alert(resp.error);
						}
					});
				}
			}
		}
		else
		{
			$('<h5 class=\"text-secondary text-center\">404 Такого товара не существует на нашем сайте :(</h5>').appendTo('#_error_status');
		}
	});
});