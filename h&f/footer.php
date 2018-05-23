    <script type="text/javascript">
            $(
                function()
                {
                    $('#_signin_button').bind('click', function()
                    {
                        fields_of_form = [
                        $('#_login'),
                        $('#_password'),
                        $('#_save_data')
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
                            $('#_status_signin').text("");
                            function border_default(value, index, array)
                            {
                                value.css('border-color', '#00cc0055');
                            };
                            fields_of_form.forEach(border_default);
                            $.post('login_via_post.php', 
                                   {'login': fields_of_form[0].val(), 'password': fields_of_form[1].val(), 'save_data': fields_of_form[2].is(':checked')}, 
                                   function(data)
                                   {
                                        if(data == "ok")
                                        {
                                            window.location.replace('index.php');
                                        }
                                        else
                                        {
                                            $('#_status_signin').css('color', 'red');
                                            $('#_status_signin').text(data);
                                        }
                                    });
                        }
                    });
                }
            );
        </script>
  </body>
</html>