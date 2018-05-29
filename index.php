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
       <div class="col-lg-8 col-md-8 col-sm-12 d-flex justify-content-center" style="">
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
        <div class="col-lg-4 col-md-4" style="text-align:center;">
          <hr/>
            <div class="list-group">
              <div class="list-group-item bg-dark text-light" id="_chat">Последние комментарии</div>
                                  <a href="#" class="list-group-item list-group-item-action flex-column align-items-start border border-secondary rounded">
                      <div class="d-flex w-100 justify-content-between" >
                        <h5 class="mb-1">List group item heading</h5>
                        <small>3 days ago</small>
                      </div>
                      <p>Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                      <small>Donec id elit non mi porta.</small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start border border-secondary rounded">
                      <div class="d-flex w-100 justify-content-between">
                        <h5 class="mb-1">List group item heading</h5>
                        <small class="text-muted">3 days ago</small>
                      </div>
                      <p class="mb-1">Donec id elit non mi porta gravida at eget metus. Maecenas sed diam eget risus varius blandit.</p>
                      <small class="text-muted">Donec id elit non mi porta.</small>
                    </a>
                    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start border border-secondary rounded">
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

<?php
require_once 'h&f/modules.php';
?>
<script type="text/javascript" src="js/index_content.js"></script>
<?php
include_once 'h&f/footer.php';
?>