<?php
$register_form = true;
require_once "h&f/header.php";
unset($register_form);
?>
    <div class="container-fluid">
        <div class="row row-centered" style=".row{height:300px;}">
           <hr/>
            <div class="col item"></div>
            <div class="col item text-center">
              <form action="register.php" method="post">
                   <div>
                        <label for="_log_r">Введите логин</label>
                        <br/>
                        <input type="text" id="_log_r" name="login">
                   </div>
                   <div style="margin-top:5px;">
                        <label for="_pass_r">Введите пароль</label>
                        <br/>
                        <input type="password" id="_pass_r" name="password">
                    </div>
                    <div style="margin-top:5px;">
                        <label for="_tel_r">Номер телефона</label>
                        <br/>
                        <input type="tel" id="_tel_r" name="tel">
                    </div>
                    <div style="margin-top:5px;">
                        <label for="_login_now_button">Войти сразу</label>
                        <input type="checkbox" name="login_now" id="_login_now_box">
                    </div>
                    <hr/>
                    <div>
                        <button type="button" class="btn btn-default" id="register_button">Зарегестрироваться</button>
                    </div>
                    <hr/>
                    <h4 style="color:red;" id="_status">
                        
                    </h4>
                </form>
            </div>
            <div class="col item"></div>
        </div>
    </div>
    <script type="text/javascript">
        $(function()
          {
            $('#register_button').bind('click', function(){
                    fields_of_form = [
                        $('#_log_r'),
                        $('#_pass_r'),
                        $('#_tel_r'),
                        $('#_login_now_box')
                        ]
                    console.log(fields_of_form[3].val());
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
                    }
                });
            });
    </script>
<?php
require_once "h&f/footer.php";    
?>