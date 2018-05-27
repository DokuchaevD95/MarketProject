$(function(){
	var product_alias = "/product.php?id=";

	function get_carousel_item(src, name, price, is_active, id)
	{
		return "<div class=\"carousel-item " + (is_active ? "active": "") + "\">\
					<a class=\"text-white font-italic\" href=\"" + product_alias + id + "\"><img class=\"d-block w-100\" src=\"" + src + "\" alt=\"" + name + "\"></a>\
						<div class=\"carousel-caption d-none d-md-block\">\
							<h5>" + name + "</h5>\
							<p>" + price + " <i class=\"fa fa-rub\"></i></p>\
						</div>\
				</div>";
	}
	function get_carousel_indicator(numb, is_active)
	{
		 return "<li data-target=\"#carouselExampleIndicators\" data-slide-to=\"" + numb + "\"" + (is_active ? " class=\"active\"": "") + "></li>";
	}

	var count_product = 0;
	var max_count = 5;
	$.get("count_no_selled_products.php", function(response){
		response = JSON.parse(response);
		if(!response.error)
		{
			count_product = response.count;
			console.log(response.count);
			let start = count_product < max_count ? 0 :count_product - max_count;
			max_count = count_product < max_count ? count_product : max_count;
			console.log(start);

			$.post('get_last_products.php', {'start': start, 'count': max_count}, function(_response){
			_response = JSON.parse(_response);
			if(_response.error)
			{
				alert(_response.error);
			}
			else
			{
				console.log(_response);
				let content = $('#_carousel_content');
				let indicator = $('#_carousel_indicator');
				for(let i = 0; i < _response.length; i++)
				{
					$(get_carousel_indicator(i, (i == 0 ? true: false))).appendTo(indicator);
					$(get_carousel_item(_response[i].img,_response[i].name, _response[i].price, (i == 0 ? true: false), _response[i].id)).appendTo(content);
				}
			}
		});
		}
		else alert(_response.error);
	});
});