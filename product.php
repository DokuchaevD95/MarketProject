<?php
/*
echo "<h1>smth</h1>";
exit();
*/
if(!isset($_GET['id']))
{
	header('Location:index.php');
	exit();
}
else
{
	include_once "init.php";
	include "login_via_cookie_or_session.php";
	include_once 'h&f/header.php';
	echo "<div id=\"_product_id\" style=\"display:none;\">".$_GET['id']."</div>";
}
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-2 col-md-1">
			
		</div>
		<fiv class="col-lg-8 col-md-10 col-sm-12 col-xs-12">
			<hr id="_error_status"/>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-5 col-md-6 col-sm-12 col-xs-12" id="_image_container">
						
					</div>
					<div class="col-lg-7 col-md-6 col-sm-12 col-xs-12 text-center" id="_content_container" style="margin-top:5px;">
					</div>
				</div>
				<div class="row">
					<div class="col">
						<hr/>
						<div class="list-group border border-primary"  id="_chat">

						</div>
					</div>
				</div>
			</div>
		</fiv>
		<div class="col-lg-2 col-md-1">
			
		</div>
	</div>
</div>


<!---Модалка для комментирования--->
<div class="modal fade" id="_modal_comment">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Комментарий</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><i class="fa fa-close"></i></button>
            </div>
            <form class="from-group">
                <div class="modal-body">
                   	<label for="#_comment_text">Введите ваш комментарий </label>
                    <textarea class="form-control" type="text" id="_comment_text"></textarea>
                    <div id="_comment_status"></div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" type="button" disabled="true" id="_send_comment">Отправить</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
require_once 'h&f/modules.php';
?>
<script type="text/javascript" src="js/product.js"></script>
<?php
include_once 'h&f/footer.php';
?>