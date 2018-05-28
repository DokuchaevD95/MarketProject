$(function(){
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
			console.log(response);
			let content_container = $('#_content_container');
			let image_container = $('#_image_container');

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
                
			if(is_login && !response.is_selled)
				$("<div class=\"btn-group \" style=\"display:none;\" id=\"_btn_product_group\">\
					<button class=\"btn btn-primary\" id=\"_buy\">Купить <i class=\"fa fa-credit-card\"></i></button>\
					<button class=\"btn btn-success\" id=\"_favorite_product\">В корзину <i class=\"fa fa-shopping-basket\"></i></button>\
					</div>").appendTo(content_container);
            
            
            //if(is_login && response.is_selled)
                
			if(is_login)
				$("<div class=\"d-flex justify-content-center\">\
					<button class=\"btn btn-danger text-center\" id=\"_comment\">Комментировать</button>\
					</div>").appendTo('#_chat');
            
			let buy_btn = $('#_buy');
			let favorite_btn = $('#_favorite_product');
			console.log(favorite_btn);
			let comment_btn = $('#_comment');
			let btn_group = $('#_btn_product_group');

			console.log(btn_group);
			if(btn_group.length > 0)
			{
				if(!response.is_selled)
				{
					btn_group.removeAttr("style");
					buy_btn.bind('click', function(){
						let my_id = $('#_user_id').text();
						console.log(product_id);
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
				}
				else
				{
					btn_group.remove();
				}
			}
		}
		else
		{
			$('<h5 class=\"text-secondary text-center\">404 Такого товара не существует на нашем сайте :(</h5>').appendTo('#_error_status');
		}
	});
});