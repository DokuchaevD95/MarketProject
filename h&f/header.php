<!doctype html>
<html lang="ru">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/font-awesome.css">
        <title>MarketProject</title>
    </head>
    <body>
        <div class="container-fluid">
                <div class="row">
                    <nav class="navbar navbar-inverse navbar-static-top">
                        <div class="container">
                            <div class="navbar-header">
                                <a class="navbar-brand" href="#">MarketProject</a>
                                <button class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu" type="button">
                                    <span class="sr-only">Открыть навигацию</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse" id="responsive-menu">
                                <ul class="nav navbar-nav">
                                    <li><a href="#">Товары</a></li>
                                    <li><a href="#">elem</a></li>
                                    <li><a href="#">elem</a></li>
                                </ul>  
                                <form action="" class="navbar-form">
                                    <div class="form-group navbar-right">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sign_in_modal">
                                               <i class="fa fa-sign-in"></i> Войти
                                        </button>
                                        <button type="button" class="btn btn-success">
                                               Регистрация
                                        </button>
                                    </div>
                                </form>
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
                        <form class="from-group" action="">
                            <div class="modal-body">
                               <label>Введите логин: </label>
                                <input type="text" placeholder="login">
                                <br/>
                                <label>Введите пароль: </label>
                                <input type="password" placeholder="password">
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary" type="sumbit" data-dismiss="modal">Отправить</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>