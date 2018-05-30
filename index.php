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
    <div class="row">
       <div class="col-lg-8 col-md-8 col-sm-12 d-flex justify-content-center p-0" style="">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-top:2%;">
              <ol class="carousel-indicators" id="_carousel_indicator">

              </ol>
              <div class="carousel-inner" id="_carousel_content" >
              
              </div>
              <div class="bg-ligth" style="color:black !important;">
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" >
                   <span color="text-dark;"><i class="fa fa-arrow-left" style="color:black;"></i></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" >
                   <span color="text-dark;"><i class="fa fa-arrow-right" style="color:black;"></i></span>
                    <span class="sr-only">Next</span>
                  </a>
            </div>
            </div>
        </div>    
        <div class="col-lg-4 col-md-4" style="text-align:center; padding-right:0px; padding-left:0px;">
            <div class="list-group" style="line-height: 20px;">
              <div class="list-group-item text-light border bg-dark border-dark rounded-0 " style="height:100%;" id="_chat"><div style ="padding-bottom: 5%;">Последние комментарии</div></div>

            </div>
            
        </div>  
    </div>
</div>

<?php
require_once 'h&f/modules.php';
?>
<script type="text/javascript" src="js/index_content.js"></script>
<script type="text/javascript" src="js/index_comment.js"></script>
<?php
include_once 'h&f/footer.php';
?>