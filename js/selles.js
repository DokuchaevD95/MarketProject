$(function(){
	$('#_selles').addClass('active');
    
    var product_alias = "/product.php?id=";
    
	function get_card(name, src, id, price)
	{
		return "<div class=\"col-lg-3 col-md-6 col-sm-12\">\
					<div class=\"card\" style=\"width: 18rem;\">\
						<img class=\"card-img-top\" src=\"" + src + "\" alt=\"" + name + "\" height=150 style=\"margin-left:auto; margin-right:auto; background-size: contain;\">\
						<div class=\"card-body\">\
							<a class=\"d-block btn\" href=\"" + product_alias + id + "\"><h5 class=\"card-title\">" + name + ": " + price + " <span><i class=\"fa fa-rub\"></i></span></h5></a>\
                            <div class=\"d-flex justify-content-center\">\
                                <a href=\"#\" class=\"btn btn-outline-primary\">Купить</a>\
                                <button class=\"btn btn-outline-success\"><i class=\"fa fa-shopping-basket\"></i></button>\
                            </div>\
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

	function paginate_left(e)
	{
        step = 8;
        console.log(e);
        count = sessionStorage.getItem("count");
		start = sessionStorage.getItem("start");
        step = sessionStorage.getItem("step");
        start = start < step ?0:start-step;
        
	}	

	function paginate_right(e)
	{
        step = 8;
        console.log(e);
        count = sessionStorage.getItem("count");
		start = sessionStorage.getItem("start");
        if(start + step <= count)
        {
            $('#_right').attr('disabled', 'true');
            return false;
        }
        else
        {
            start = start + step;
            step = (start + step) <= count ? step : count - start - step;
            $('#_right').attr('disabled', 'true');
            $('#_left').attr('disabled', 'true');
            post('get_last_products.php', "start=" + start + "&count=" + step).then(function(data){
                console.log(data);
            });
        }
	}

	get('count_no_selled_products.php').then(
		function(data)
		{
			data = JSON.parse(data);
			sessionStorage.setItem('count', data.count);
            let count = data.count;
            console.log(data.count)
			let step = 8;
            let start = 0;
            sessionStorage.setItem('start', start);
            let content = $('#_row_content');
            if((start+step)>count)
            {
                step = count;
                console.log("msg");    
                $('#_right').attr('disabled', 'true');
                $('#_left').attr('disabled', 'true');
                post('get_last_products.php', 'start=' + start + "&count=" + step).then(function(data){
                    data = JSON.parse(data);
                    console.log(data);
                    for(let i = 0; i < data.length; i++)
                    {
                        $(get_card(data[i].name, data[i].img, data[i].id, data[i].price)).appendTo(content);    
                    }
                });
            }
            else
            {
                $('#_right').attr('disabled', 'true');
                $('#_left').attr('disabled', 'true');
                
            }
		}
	).then(
		function()
		{
            
		}
	);

});