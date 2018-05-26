<?php
/*
echo "<h1>smth</h1>";
exit();
*/
include_once "init.php";
include "login_via_cookie_or_session.php";
include_once 'h&f/header.php';
?>
    <div class="container-fluid">
        <div class="row row-centered">
            <div class="col-4"></div>
            <div class="col-4 item text-center">
                <hr/>
                <div style="block-center">
                    <form>
                        <label for="#_name">Введите название товара:</label>
                        <br/>
                        <input type="text" name="name" id="_name">
                        <br/>
                        <label for="#_description">Описание товара:</label>
                        <br/>
                        <textarea name="description", id="_description"></textarea>
                        <hr/>
                        <label for="#_price">Цена товара: <i class="fa fa-rub"></i></label>
                        <br/>
                        <input type="text" name="price" id="_price">
                        <label for=""></label>
                        <br/>
                        <br/>
                        <label for="#_file">Прикрепите изображение:</label>
                        <br/>
                        <input type="file" name="file" id="_file" style="margin-left:20%;"/>
                        <hr/>
                        <button class="btn btn-outline-primary" type="button" id="_send_info_product">Отправить объявление</button>
                    </form>
                    <hr/>
                    <div id="_status"></div>
                </div>
            </div>
            <div class="col-4"></div>
        </div>
    </div>



<?php
require_once 'h&f/modules.php';
?>
<script src="js/add_product.js"></script>
<?php
include_once 'h&f/footer.php';
?>