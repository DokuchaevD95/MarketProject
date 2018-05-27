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
			<hr/>
			<div class="container-fluid">
				<div class="row">
					<div class="col-lg-5 col-md-6 col-sm-12 col-xs-12" id="_image_container">
						
					</div>
					<div class="col-lg-7 col-md-6 col-sm-12 col-xs-12 text-center" id="_content_container" style="margin-top:5px;">
						<?php
							if($is_login)
							echo "<div class=\"btn-group \" style=\"display:none;\" id=\"_btn_product_group\">
								<button class=\"btn btn-primary\" id=\"_buy\">Купить <i class=\"fa fa-credit-card\"></i></button>
								<button class=\"btn btn-success\" id=\"_favorite\">В корзину <i class=\"fa fa-shopping-basket\"></i></button>
							</div>";
						?>
					</div>
				</div>
				<div class="row">
					<div class="col" id="_chat">
						<hr/>
						<?php
						if($is_login)
						{
							echo "<div class=\"d-flex justify-content-center\"><button class=\"btn btn-danger text-center\" id=\"_comment\">Комментировать</button></div>";
						}
						?>

						<div class="list-group">
							
						</div>
					</div>
				</div>
			</div>
		</fiv>
		<div class="col-lg-2 col-md-1">
			
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