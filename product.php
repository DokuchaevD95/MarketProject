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
						
  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">List group item heading</h5>
      <small>3 days ago</small>
    </div>
    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
    <small>Donec id elit non mi porta.</small>
  </a>
  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">List group item heading</h5>
      <small class="text-muted">3 days ago</small>
    </div>
    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
    <small class="text-muted">Donec id elit non mi porta.</small>
  </a>
  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start">
    <div class="d-flex w-100 justify-content-between">
      <h5 class="mb-1">List group item heading</h5>
      <small class="text-muted">3 days ago</small>
    </div>
    <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
    <small class="text-muted">Donec id elit non mi porta.</small>
  </a>

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