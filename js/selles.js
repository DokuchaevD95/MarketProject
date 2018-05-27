$(function(){
	$('#_selles').addClass('active');
	function get_card(name, src, id, price)
	{
		return "<div class=\"col-lg-3 col-md-6 col-sm-12\">\
					<div class=\"card\" style=\"width: 18rem;\">\
						<img class=\"card-img-top\" src=\"" + src + "\" alt=\"" + name + "\" width=150 height=150>\
						<div class=\"card-body\">\
							<h5 class=\"card-title\">" + name + ": " + price + "<span><i class=\"fa fa-rub\"></i></span></h5>\
							<a href=\"#\" class=\"btn btn-outline-primary\">Купить</a>\
							<button class=\"btn btn-outline-success\"><i class=\"fa fa-shopping-basket\"></i></button>\
						</div>\
					</div>\
				</div>";
	}

	function post(url, requestuestBody) {
	  return new Promise(function(succeed, fail) {
	    var request = new XMLHttpRequest();
	    request.open("POST", url, true);
	    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
	    request.addEventListener("load", function() {
	    if (request.status < 400)
	        succeed(request.responseText);
	    else
	        fail(new Error("Request failed: " + request.statusText));
	    });
	    request.addEventListener("error", function() {
	      fail(new Error("Network error"));
	    });
	    request.send(requestuestBody);
  		});
	}

	function get(url) {
  		return new Promise(function(succeed, fail) {
	    var request = new XMLHttpRequest();
	    request.open("GET", url, true);
	    request.addEventListener("load", function() {
	      if (request.status < 400)
	        succeed(request.response);
	      else
	        fail(new Error("Request failed: " + request.statusText));
	    });
	    request.addEventListener("error", function() {
	      fail(new Error("Network error"));
	    });
	    request.send();
  		});
	}

	function paginate_left()
	{
		
	}	

	function paginate_right()
	{

	}

	get('count_no_selled_products.php').then(
		function(data)
		{
			console.log("msg");
			data = JSON.parse(data);
			sessionStorage.setItem('count', data.count);
			let max_count = 8;
			sessionStorage.setItem('max_count', max_count);
		}
	).then(
		function()
		{

		}
	);

});