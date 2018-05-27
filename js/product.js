$(function(){
	let product_id = $('#_product_id').text();
	product_id = parseInt(product_id);

	let prop = "id=" + product_id;
	$.get('get_product_from_db.php', prop, function(data){
		response = JSON.parse(data);
		console.log(response);
		let content_container = $('#_content_container');
		let image_container = $('#_image_container');

		let img_tag = "<img src=\"" + response.img + "\" class=\"rounded float-left img-fluid\" style=\"margin-right:10px;\">";
		let name_tag = "<h4 class=\"text-dark\" style=\"margin-top:7px;\">" + response.name + "</h4>";
		let description_tag = "<div class=\"text-secondary\">" + response.description + "</div>";
		let price_tag = "<h6 class=\"text-dark\">Цена: " + response.price + " <i class=\"fa fa-rub\"" + "</h6>";

		$(img_tag).appendTo(image_container);
		$(name_tag).appendTo(content_container);
		$(price_tag).appendTo(content_container);
		$(description_tag).appendTo(content_container);

		let buy_btn = $('#_buy');
		let favorite_btn = $('#_favorite');
		let comment_btn = $('#_comment');
		let btn_group = $('#_btn_product_group');

		console.log(btn_group);
		if(btn_group.length > 0)
		{
			btn_group.removeAttr("style");
			buy_btn.bind('click', function(){
				let my_id = $('#_user_id').text();
				
			});
		}
	});
});