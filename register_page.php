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
                        <input type="text" id="_log_r" required name="login">
                   </div>
                   <div style="margin-top:5px;">
                        <label for="_pass_r">Введите пароль</label>
                        <br/>
                        <input type="password" id="_pass_r" required name="password">
                    </div>
                    <div style="margin-top:5px;">
                        <label for="_tel_r">Номер телефона</label>
                        <br/>
                        <input type="tel" id="_tel_r" required name="tel">
                    </div>
                    <div style="margin-top:5px;">
                        <label for="_login_now_button">Войти сразу</label>
                        <input type="checkbox" checked="checked" name="login_now" id="_login_now_box">
                    </div>
                    <hr/>
                    <div>
                        <button type="submit" class="btn btn-default" id="register_button">Зарегестрироваться</button>
                    </div>
                </form>
            </div>
            <div class="col item"></div>
        </div>
    </div>
<?php
require_once "h&f/footer.php";    
?>