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
    <div class="row" style="margin-top:1%;" id="_row_content">

    </div>
    
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-between">
              <button class="pagination-btn btn-outline-primary btn fa fa-arrow-left"></button>
              <button class="pagination-btn btn-outline-primary btn fa fa-arrow-right"></button>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'h&f/modules.php';
?>
<script src="js/selles.js"></script>
<?php
include_once 'h&f/footer.php';
?>