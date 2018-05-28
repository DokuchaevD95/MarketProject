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
<div class="container-fluid">
    <div class="row">
        <div class="col">
           <hr/>
            <div class="d-flex justify-content-center">
              <button class="pagination-btn btn-outline-primary btn fa fa-arrow-left" id="_left"></button>
              <button class="pagination-btn btn-outline-primary btn fa fa-arrow-right" id="_right"></button>
            </div>
        </div>
    </div>
</div>

<?php
require_once 'h&f/modules.php';
?>
<script src="js/favorite.js"></script>
<?php
include_once 'h&f/footer.php';
?>