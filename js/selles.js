$(function(){
	$('#_selles').addClass('active');
    let user_id = null;
    for(e of document.cookie.split('; '))
    {
        let elem_split = e.split('=');
        if(elem_split[0] == "user_id")
            user_id = parseInt(elem_split[1]);     
    }
    
    console.log(user_id);
    var product_alias = "/product.php?id=";
    
	function get_card(name, src, id, price, is_login)
	{
		return "<div class=\"col-lg-3 col-md-6 col-sm-12\">\
					<div class=\"card\" style=\"width: 18rem;\">\
						<img class=\"card-img-top\" src=\"" + src + "\" alt=\"" + name + "\" height=150 style=\"margin-left:auto; margin-right:auto;\">\
						<div class=\"card-body\">\
							<a class=\"d-block btn\" href=\"" + product_alias + id + "\"><h5 class=\"card-title\">" + name + ": " + price + " <span><i class=\"fa fa-rub\"></i></span></h5></a>\
                            " + (user_id > 0 ? "<div class=\"d-flex justify-content-center\">\
                                <button class=\"btn btn-outline-primary\" id=\"buy_" + id + "\">Купить</button>\
                                <button class=\"btn btn-outline-success\"><i class=\"fa fa-shopping-basket\"></i></button>\
                            </div>" : "" ) + "\
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
    
    function buy_btn(event)
    {
        let my_id = event.data.id;
        console.log(my_id);
        
    }
    
	function paginate_left(e)
	{
        let content = $('#_row_content');
        step = 8;
        count = parseInt(sessionStorage.getItem("count"));
		start = parseInt(sessionStorage.getItem("start"));
        start -= step;
        sessionStorage.setItem("start", start);
        if(start == 0)
        {
            $('#_left').css('display', 'none');
            post('get_last_products.php', 'start=' + start + "&count=" + step).then(function(data){
                data = JSON.parse(data);
                content.empty();
                for(let i = 0; i < data.length; i++)
                {
                    $(get_card(data[i].name, data[i].img, data[i].id, data[i].price)).appendTo(content);
                    $('#buy_' + data[i].id).bind('click', {"id": data[i].id}, buy_btn);
                }
                $('#_right').css('display', 'inline-block');
            });
        }
        else
        {
            post('get_last_products.php', 'start=' + start + "&count=" + step).then(function(data){
                data = JSON.parse(data);
                content.empty();
                for(let i = 0; i < data.length; i++)
                {
                    $(get_card(data[i].name, data[i].img, data[i].id, data[i].price)).appendTo(content);
                    $('#buy_' + data[i].id).bind('click',{"id": data[i].id}, buy_btn);
                }
                $('#_right').css('display', 'inline-block');
            });
        }
	}	

	function paginate_right(e)
	{
        let content = $('#_row_content');
        step = 8;
        count = parseInt(sessionStorage.getItem("count"));
		start = parseInt(sessionStorage.getItem("start")) + step;       
        sessionStorage.setItem("start", start)
        if(start+step>=count)
        {
            step = step - (count - start - step);
            
            $('#_right').css('display', 'none');
            post('get_last_products.php', 'start=' + start + "&count=" + step).then(function(data){
                data = JSON.parse(data);
                content.empty();
                for(let i = 0; i < data.length; i++)
                {
                    $(get_card(data[i].name, data[i].img, data[i].id, data[i].price)).appendTo(content);
                    $('#buy_' + data[i].id).bind('click', {"id": data[i].id}, buy_btn);
                }
                $('#_left').css('display', 'inline-block');
            });
        }
        else
        {
            post('get_last_products.php', 'start=' + start + "&count=" + step).then(function(data){
                data = JSON.parse(data);
                content.empty();
                for(let i = 0; i < data.length; i++)
                {
                    $(get_card(data[i].name, data[i].img, data[i].id, data[i].price)).appendTo(content);
                    $('#buy_' + data[i].id).bind('click', {"id": data[i].id}, buy_btn);
                }
                $('#_left').css('display', 'inline-block');
            });
        }
	}

	get('count_no_selled_products.php').then(
		function(data)
		{
			data = JSON.parse(data);
			sessionStorage.setItem('count', data.count);
            let count = data.count;
			let step = 8;
            let start = 0;
            sessionStorage.setItem('start', start);
            let content = $('#_row_content');
            if((start+step)>=count)
            {
                $('#_right').css('display', 'none');
                $('#_left').css('display', 'none');

                step = count;   
                post('get_last_products.php', 'start=' + start + "&count=" + step).then(function(data){
                    data = JSON.parse(data);
                    for(let i = 0; i < data.length; i++)
                    {
                        $(get_card(data[i].name, data[i].img, data[i].id, data[i].price)).appendTo(content);
                        $('#buy_' + data[i].id).bind('click', {"id": data[i].id}, buy_btn);
                    }
                });
            }
            else
            {
                $('#_right').css('display', 'inline-block');
                $('#_left').css('display', 'none');

                post('get_last_products.php', 'start=' + start + "&count=" + step).then(function(data){
                    data = JSON.parse(data);
                    for(let i = 0; i < data.length; i++)
                    {
                        $(get_card(data[i].name, data[i].img, data[i].id, data[i].price)).appendTo(content);
                        $('#buy_' + data[i].id).bind('click', {"id": data[i].id}, buy_btn);
                        console.log($('#buy_' + data[i].id));
                    }
                    $('#_right').bind('click', paginate_right);
                    $('#_left').bind('click', paginate_left);
                });
            }
		}
	).then(
		function()
		{
            
		}
	);

});