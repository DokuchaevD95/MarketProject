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
       <div class="col-lg-9 col-md-8">
            <hr/>
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="margin-top:4%;">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="http://via.placeholder.com/800x400" alt="First slide">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>...</h5>
                        <p>...</p>
                    </div>
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="http://via.placeholder.com/800x400" alt="Second slide">
                </div>
                <div class="carousel-item">
                  <img class="d-block w-100" src="http://via.placeholder.com/800x400" alt="Third slide">
                </div>
                
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
        </div>    
        <div class="col-lg-3 col-md-4" style="text-align:center;">
           <hr/>
            Последние комментарии
            <hr/>
            
        </div>  
    </div>
</div>

<?php
require_once 'h&f/modules.php';
?>

<?php
include_once 'h&f/footer.php';
?>