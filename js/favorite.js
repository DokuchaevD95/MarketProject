$(function(){
	$('#_favorite').addClass('active');
    let user_id = null;
    for(e of document.cookie.split('; '))
    {
        let elem_split = e.split('=');
        if(elem_split[0] == "user_id")
            user_id = parseInt(elem_split[1]);     
    }
    if(user_id <= 0)
	    window.location.replace('index.php');
    
    console.log(user_id);
    var product_alias = "/product.php?id=";

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

	function get_card(name, src, id, price, seller)
	{
		return "<div class=\"col-lg-3 col-md-6 col-sm-12\">\
					<div class=\"card\" style=\"height: 35vh;\">\
						<img class=\"card-img-top\" src=\"" + src + "\" alt=\"" + name + "\" height=120 style=\"margin-left:auto; margin-right:auto;\">\
						<div class=\"card-body\">\
							<a class=\"d-block btn\" href=\"" + product_alias + id + "\"><h5 class=\"card-title\">" + name + ": " + price + "<span><i class=\"fa fa-rub\"></i></span></h5></a>\
                            " + (user_id > 0 && user_id != seller? "<div class=\"d-flex justify-content-center\">\
                                <button class=\"btn btn" + (!is_fav(id) ? "-outline" : "") + "-success\" id=\"fav_" + id + "\"><i class=\"fa fa-heart-o\"></i></button>\
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

    function fav_btn(event)
    {
        let btn_id = event.data.id;
        let fav_list = sessionStorage.getItem('favorite');
        if(!fav_list || JSON.parse(fav_list).length == 0)
        {
            fav_list = [btn_id];
            sessionStorage.setItem("favorite", JSON.stringify(fav_list));
            $("#fav_" + btn_id).removeClass('btn-outline-success');
            $("#fav_" + btn_id).addClass('btn-success');
        }
        else
        {
            fav_list = JSON.parse(fav_list);
            if(fav_list.indexOf(btn_id) >= 0)
            {
                fav_list.splice(fav_list.indexOf(btn_id), 1);
                sessionStorage.setItem("favorite", JSON.stringify(fav_list))
                $("#fav_" + btn_id).removeClass('btn-success');
                $("#fav_" + btn_id).addClass('btn-outline-success');
            }
            else
            {
                fav_list.push(btn_id);
                sessionStorage.setItem("favorite", JSON.stringify(fav_list))
                $("#fav_" + btn_id).removeClass('btn-outline-success');
                $("#fav_" + btn_id).addClass('btn-success');
            }
        }
        window.location.replace('index.php');
    }
    
	function paginate_left(e)
	{
        let content = $('#_row_content');
        content.empty();
        step = 8;
        count = parseInt(sessionStorage.getItem("count"));
		start = parseInt(sessionStorage.getItem("start"));
        start -= step;
        sessionStorage.setItem("start", start);
        if(start == 0)
        {
            $('#_left').css('display', 'none');
            for(let i = start; i < start + step; i++)
       		{
	        	get('get_product_from_db.php?id=' + data[i]).then(function(response)
	        	{
	        		response = JSON.parse(response);
		        	$(get_card(response.name, response.img, response.id, response.price, response.seller)).appendTo(content);
		            $('#fav_' + response.id).bind('click', {"id": response.id}, fav_btn);
	        	});
        	}
            $('#_right').css('display', 'inline-block');

        }
        else
        {
            for(let i = start; i < start + step; i++)
       		{
	        	get('get_product_from_db.php?id=' + data[i]).then(function(response)
	        	{
	        		response = JSON.parse(response);
		        	$(get_card(response.name, response.img, response.id, response.price, response.seller)).appendTo(content);
		            $('#fav_' + response.id).bind('click', {"id": response.id}, fav_btn);
	        	});
        	}
            $('#_right').css('display', 'inline-block');

        }
	}	

	function paginate_right(e)
	{
        let content = $('#_row_content');
        content.empty();
        step = 8;
        count = parseInt(sessionStorage.getItem("count"));
		start = parseInt(sessionStorage.getItem("start")) + step;       
        sessionStorage.setItem("start", start)
        if(start+step>=count)
        {
            step = step - (count - start - step);
            console.log(start, step);
            for(let i = start; i < start + step; i++)
       		{
	        	get('get_product_from_db.php?id=' + data[i]).then(function(response)
	        	{
	        		response = JSON.parse(response);
		        	$(get_card(response.name, response.img, response.id, response.price, response.seller)).appendTo(content);
		            $('#fav_' + response.id).bind('click', {"id": response.id}, fav_btn);
	        	});
        	}
        	$('#_left').css('display', 'inline-block');

        }
        else
        {
        	for(let i = start; i < start + step; i++)
       		{
	        	get('get_product_from_db.php?id=' + data[i]).then(function(response)
	        	{
	        		response = JSON.parse(response);
		        	$(get_card(response.name, response.img, response.id, response.price, response.seller)).appendTo(content);
		            $('#fav_' + response.id).bind('click', {"id": response.id}, fav_btn);
	        	});
        	}
            $('#_left').css('display', 'inline-block');
        }
	}


	data = sessionStorage.getItem('favorite');
	if(data)
		data = JSON.parse(data);
	else data = [];
	let count = data.length;
	sessionStorage.setItem('count', count);
	let step = 8;
    let start = 0;
    sessionStorage.setItem('start', start);
    let content = $('#_row_content');
    if((start+step)>=count)
    {
        $('#_right').css('display', 'none');
        $('#_left').css('display', 'none');

        step = count;   

        for(let i = start; i < start + step; i++)
        {
        	get('get_product_from_db.php?id=' + data[i]).then(function(response)
        	{
        		response = JSON.parse(response);
	        	$(get_card(response.name, response.img, response.id, response.price, response.seller)).appendTo(content);
	            $('#fav_' + response.id).bind('click', {"id": response.id}, fav_btn);
        	});
        }
    }
    else
    {
        $('#_right').css('display', 'inline-block');
        $('#_left').css('display', 'none');

        for(let i = start; i < start + step; i++)
        {
        	get('get_product_from_db.php?id=' + data[i]).then(function(response)
        	{
        		response = JSON.parse(response);
	        	$(get_card(response.name, response.img, response.id, response.price, response.seller)).appendTo(content);
	            $('#fav_' + response.id).bind('click', {"id": response.id}, fav_btn);
        	});
        }
        $('#_right').bind('click', paginate_right);
        $('#_left').bind('click', paginate_left);
    }


});