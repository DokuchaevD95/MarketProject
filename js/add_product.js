$(function(){
	$('#_add_product').addClass('active');
	$('#_send_info_product').bind('click', function(){
		let fd = new FormData;

		$.each($('#_file')[0].files, function(i, file) {
		fd.append('img', file);
		});

		fd.append('user_id', $('#_user_id').text());
		if($('#_name').val()=="" || $('#_description').val()=="" || $('#_price').val()=="" || $('#_file')[0].files.length==0 || parseFloat($('#_price').val())!=$('#_price').val())
		{
			$('#_status').css('color', 'red');
			$('#_status').text("Не заполнены одно или несколько полей либо введены некорректные данные!");
			if($('#_name').val()=="")
			{
                $('#_name').css('border-color', '#cc000055');
			}
			else $('#_name').css('border-color', '#00cc0055');
			if($('#_description').val()=="")
			{
                $('#_description').css('border-color', '#cc000055');
			}
			else $('#_description').css('border-color', '#00cc0055');
			if($('#_price').val()=="" || parseFloat($('#_price').val())!=$('#_price').val())
			{
                $('#_price').css('border-color', '#cc000055');
			}
			else $('#_price').css('border-color', '#00cc0055');
		}
		else
		{
			fd.append('name', $('#_name').val());
			fd.append('description', $('#_description').val());
			fd.append('price', $('#_price').val());

			$.ajax({
				url: "product_to_db.php",
				type: "POST",
				data: fd,
				processData: false,
				contentType: false,
				success: function(response){
					if(response == "Oк. Продажа создана!")
					{
						$('#_status').css('color', 'green');
						$('#_status').text(response + " Редирект через 3 сек.");
						$('#_send_info_product').prop('disabled', true);
						setTimeout(function(){window.location.replace('index.php')}, 3000);
					}
					else
					{	
						$('#_status').css('color', 'red');
						$('#_status').text(response);
					}
				}
			});
		}
	});
	});