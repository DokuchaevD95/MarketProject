
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
        
        <title>MarketProject</title>
    </head>
    <body>

        <script type="text/javascript">
            function exit()
            {
                sessionStorage.clear();
                window.location.replace('logout.php');
            }    
        </script>

        <?php
        if($is_login)
            echo "<div style=\"display:none;\" id=\"_user_id\">$user_id</div>";
        ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">MarketProject</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item" id="_selles">
                        <a class="nav-link" href="selles.php">Товары<span class="sr-only">(current)</span></a>
                    </li>
                    <?php
                    if($is_login)
                        echo "<li class=\"nav-item\" id=\"_favorite\">
                            <a class=\"nav-link\" href=\"favorite.php\">Избранное<span class=\"sr-only\">(current)</span></a>
                        </li>";
                    ?>
                    <?php
                    if($is_login)
                        echo "<li class=\"nav-item\" id=\"_my_selles\">
                            <a class=\"nav-link\" href=\"my_selles.php\">Мои продажи<span class=\"sr-only\">(current)</span></a>
                        </li>";
                    ?>
                    <?php
                    if($is_login)
                        echo "<li class=\"nav-item\" id=\"_add_product\">
                            <a class=\"nav-link\" href=\"add_product_page.php\"><i class=\"fa fa-plus\"></i><span class=\"sr-only\">(current)</span></a>
                        </li>";
                    ?>
                </ul>
                <?php
                    if(!$is_login)
                        echo "<form class=\"form-inline my-2 my-lg-0\" action=\"register_page.php\">
                                <button class=\"btn btn-outline-primary my-2 my-sm-0\" type=\"button\" data-toggle=\"modal\" data-target=\"#sign_in_modal\"><i class=\"fa fa-sign-in\"></i> Войти</button>
                                <button class=\"btn btn-outline-success my-2 my-sm-0\" type=\"href\" style=\"margin-left:5px\">Регистрация</button>
                            </form>";
                    else 
                        echo "<form class=\"form-inline my-2 my-lg-0\">
                                <label style=\"margin-right:3px; color:#ffffff;\">Вы вошли как $login</label>
                                <button class=\"btn btn-outline-danger my-2 my-sm-0\" onclick=\"exit()\" style=\"margin-left:3px\"><i class=\"fa fa-sign-out\"></i>Выход</button>
                            </form>";
                ?>
            </div>
        </nav>

        <div class="modal fade" id="sign_in_modal">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Форма входа</h4>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
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
        