
<!doctype html>
<html lang="ru">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/styles.css">
        <link rel="stylesheet" href="../css/font-awesome.css">
        <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        
        <title>MarketProject</title>
    </head>
    <body>
        <div class="container-fluid">
                <div class="row">
                    <nav class="navbar navbar-inverse navbar-static-top">
                        <div class="container">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="../index.php">MarketProject</a>
                                <button class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu" type="button">
                                    <span class="sr-only">Открыть навигацию</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse" id="responsive-menu">
                                <ul class="nav navbar-nav">
                                    <li  class="navbar-ref"><a href="#">Товары</a></li>
                                    <?php
                                        if($is_login) echo "<li class=\"navbar-ref\"><a href=\"#\">Избранное</a></li>"; 
                                    ?>
                                    <?php
                                        if($is_login) echo "<li class=\"navbar-ref\"><a href=\"#\">Мои покупки</a></li>";
                                    ?>
                                </ul>
                                <?php 
                                    if(!$is_login)
                                    {
                                        echo "<form class=\"navbar-form\" action=\"register_page.php\">
                                                <div class=\"form-group navbar-right\">
                                                    <button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#sign_in_modal\">
                                                           <i class=\"fa fa-sign-in\"></i> Войти
                                                    </button>";
                                        if(!$regiter_form) 
                                            echo "<form>
                                                        <button type=\"href\" class=\"btn btn-success\">
                                                               Регистрация
                                                        </button>    
                                                    </form>
                                                </div>
                                            </form>";
                                    }
                                    else 
                                        echo "<form class=\"navbar-form\" action=\"logout.php\">
                                                <div class=\"form-group navbar-right\">
                                                    <label style=\"color:white;\">Вы вошли как $login </label> 
                                                    <button type=\"submit\" class=\"btn btn-danger\">
                                                        Выйти
                                                    </button>
                                                </div>
                                            </form>";
                                ?>    
                            </div>
                        </div>
                    </nav>
                </div>
        </div>
        <div class="modal fade" id="sign_in_modal">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button class="close" type="button" data-dismiss="modal"><i class="fa fa-close"></i></button>
                        <h4 class="modal-title">Форма входа</h4>
                    </div>
                    <form class="from-group">
                        <div class="modal-body">
                           <label for="_login">Введите логин: </label>
                            <input type="text" placeholder="login" id="_login" name="login">
                            <br/>
                            <br/>
                            <label for="_password">Введите пароль: </label>
                            <input type="password" placeholder="password" id="_password" name="password">
                            <br/>
                            <br/>
                            <label for="_save_data">Запомнить данные:</label>
                            <input type="checkbox" id="_save_data" name="save_data" checked="checked"> 
                            <hr/>
                            <div id="_status_signin"></div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="button" id="_signin_button">Вход</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
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