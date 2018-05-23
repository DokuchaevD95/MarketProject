<?php
$register_form = true;
require_once "h&f/header.php";
unset($register_form);
?>
   
   
    <div class="container-fluid">
        <div class="row row-centered" style=".row{height:300px;}">
            <div class="col item"></div>
            <div class="col item text-center">
             <hr/>
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
                    <div>
                        <button type="button" class="btn btn-default" id="register_button">Зарегестрироваться</button>
                    </div>
                    <hr/>
                    <h6 style="color:red;" id="_status"></h6>
                </form>
            </div>
            <div class="col item"></div>
        </div>
    </div>
    
    
    
<?php
require_once "h&f/modules.php";
?>
    
<script src="js/register.js"></script>
    
<?php
require_once "h&f/footer.php";    
?>