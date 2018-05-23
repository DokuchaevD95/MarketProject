        $(document).ready();
        $(function()
          {
            $('#register_button').bind('click', function(){
                    fields_of_form = [
                        $('#_log_r'),
                        $('#_pass_r'),
                        $('#_tel_r'),
                        $('#_login_now_box')
                        ];
                    if(fields_of_form.some(function(value,index,array){return value.val()=="";}))
                    {
                        $('#_status').text("Одно или несколько полей не заполнены!!!");
                        for(let i = 0; i < fields_of_form.length; i++)
                            if(fields_of_form[i].val() == "")
                                fields_of_form[i].css('border-color', '#cc000055');
                            else fields_of_form[i].css('border-color', '#00cc0055');
                    }
                    else
                    {
                        $('#_status').text("");
                        function border_default(value, index, array)
                        {
                            value.css('border-color', '#00cc0055');
                        };
                        fields_of_form.forEach(border_default);
                        $.post('register.php', 
                               {'login': fields_of_form[0].val(), 'password': fields_of_form[1].val(), 'tel': fields_of_form[2].val(), 'save': fields_of_form[3].is(':checked')}, 
                               function(data)
                               {
                                    if(data == "Пользователь был успешно добавлен!")
                                    {
                                        $('#_status').css('color', 'green');
                                        setTimeout(function(){window.location.replace('index.php')}, 3000);
                                        $('#_status').text(data + " Редирект чере 3 сек.");
                                    }
                                    else
                                    {
                                        $('#_status').css('color', 'red');
                                        $('#_status').text(data);
                                    }
                                });
                    }
                });
            });