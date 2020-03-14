<?php
session_start();
require_once __DIR__."/controller/users.php";
require_once __DIR__."/controller/categories.php";
require_once __DIR__."/controller/articalController.php";
require_once __DIR__."/controller/breakController.php";
$user=new Users();
$cate=new Categories();
$break=new Breaks();
$artical=new Articals();

?>
<!DOCTYPE html>
<html>
<head>
    <title>أخبار خير</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.rtlcss.com/bootstrap/v4.2.1/css/bootstrap.min.css" integrity="sha384-vus3nQHTD+5mpDiZ4rkEPlnkcyTP+49BhJ4wJeJunw06ZAp+wzzeBPUXr42fi8If" crossorigin="anonymous">
    <link rel="stylesheet" href="style/normalize.css">

    <link rel="stylesheet" href='style/main.css'>

</head>
<body>
<!--************************** NAV **********************************************-->
<nav class="navbar navbar-expand-lg navbar-light ">
    <a class="navbar-brand" href="#"><img src="img/logo.png" width="50" height="50" style="margin-right: 30px;"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">الرئيسية <span class="sr-only">(current)</span></a>
            </li>
            <?php
            foreach ($cate->mainCategory() as $cat){
                echo'<li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            '.$cat['cat_name'].'
         </a>
         <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
                foreach ($cate->childCategory($cat['cat_id']) as $child){
                    echo ' <a class="dropdown-item" href="view/categories.php?catid='.$child['cat_id'].'">'.$child['cat_name'].'</a>';
                }
                echo '</div>
        </li>';
            }
            ?>
        </ul>
        <?php
        if(!isset($_SESSION['state'])){
            echo'<a class="outline-primary my-2 my-sm-0 loginbtn" href="view/login.php" style="font-weight: lighter;"><i class="fas fa-sign-in-alt" style="margin-left: 3px"></i>تسجيل الدخول</a>';
        }else{
            echo'<a class="outline-primary my-2 my-sm-0 loginbtn" href="view/dashboard.php"><img src="'. $_SESSION['userImg'].'" width="50" height="50" class="rounded-circle">'. $_SESSION['userName'].'</a>
                <a class="btn btn-outline-primary my-2 my-sm-0 loginbtn" href="view/logout.php"><i class="fas fa-sign-out-alt" style="margin-left: 3px"></i>خروج</a>';
        }
        ?>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
        </form>
    </div>
</nav>



<!--************************** slider **********************************************-->
<div class="container">
    <div id="magicCarousel" class="carousel slide my-5" data-ride="carousel">

        <!--    Carousel Indicators    -->
        <ol class="carousel-indicators">
            <li data-target="#magicCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#magicCarousel" data-slide-to="1"></li>
            <li data-target="#magicCarousel" data-slide-to="2"></li>
            <li data-target="#magicCarousel" data-slide-to="3"></li>
        </ol>

        <!--    Carousel Slider    -->
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img src="https://picsum.photos/700/450" class="d-block w-100">
                <div class="carousel-caption">
                    <h3>Slide 02</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia vel in placeat corrupti. Velit quidem eos, accusantium vitae nostrum reiciendis ratione libero? Aperiam, recusandae culpa.</p>
                </div>
            </div>
            <?php
            $artical=new Articals();
            foreach ($artical->getlastArticals() as $art) {
                echo '<div class="carousel-item">
						  <img src="view/'.$art['art_img'].'" class="d-block w-100">
						  <div class="carousel-caption">
							<h3>'.$art['art_title'].'</h3>
						  </div> 
						</div>';
            }
            ?>

        </div>
    </div>
</div>

<!-- Page Content -->
<div class="container" style="background: #fff;">

    <div class="row">

        <!-- Post Content Column -->

            <?php
            $artical=new Articals();
            foreach ($artical->getlastArticals() as $art) {
                echo'  <div class="col-lg-4"><div class="card card-small mb-3 " style="width: 18rem;">
            <img class="card-img-top" src="view/'.$art['art_img'].'" alt="Card image cap">
            <div class="card-body">
                <h6>'.$art['art_title'].'</h6>
                <p class="card-text">'.$art['art_intro'].'</p>
                
                <i class="fab fa-readme" style="margin-left: 4px"></i> <a href="view/show.php?artid='.$art['art_id'].'"><small>إقرأ المزيد</small></a>
                <p>
                    <i style="float: right; margin-left: 4px" class="fas fa-feather-alt"></i><small>'.$art['art_date'].'</small>
                    <i style="float: left; margin-right: 4px" class="far fa-calendar-alt"></i><small style="float: left;">'.$art['user_name'].'</small>
                </p>
            </div>
        </div>
        </div>';
            }
            foreach ($artical->getlastArticals() as $art) {
                echo'  <div class="col-lg-4"><div class="card card-small mb-3 " style="width: 18rem;">
            <img class="card-img-top" src="view/'.$art['art_img'].'" alt="Card image cap">
            <div class="card-body">
                <h6>'.$art['art_title'].'</h6>
                <p class="card-text">'.$art['art_intro'].'</p>
                
                <i class="fab fa-readme" style="margin-left: 4px"></i> <a href="view/show.php?artid='.$art['art_id'].'"><small>إقرأ المزيد</small></a>
                <p>
                    <i style="float: right; margin-left: 4px" class="fas fa-feather-alt"></i><small>'.$art['art_date'].'</small>
                    <i style="float: left; margin-right: 4px" class="far fa-calendar-alt"></i><small style="float: left;">'.$art['user_name'].'</small>
                </p>
            </div>
        </div>
        </div>';
            }
            foreach ($artical->getlastArticals() as $art) {
                echo'  <div class="col-lg-4"><div class="card card-small mb-3 " style="width: 18rem;">
            <img class="card-img-top" src="view/'.$art['art_img'].'" alt="Card image cap">
            <div class="card-body">
                <h6>'.$art['art_title'].'</h6>
                <p class="card-text">'.$art['art_intro'].'</p>
                
                <i class="fab fa-readme" style="margin-left: 4px"></i> <a href="view/show.php?artid='.$art['art_id'].'"><small>إقرأ المزيد</small></a>
                <p>
                    <i style="float: right; margin-left: 4px" class="fas fa-feather-alt"></i><small>'.$art['art_date'].'</small>
                    <i style="float: left; margin-right: 4px" class="far fa-calendar-alt"></i><small style="float: left;">'.$art['user_name'].'</small>
                </p>
            </div>
        </div>
        </div>';
            }
            ?>

        <!-- Sidebar Widgets Column -->
        <div class="col-md-4">

            <!-- Search Widget -->
            <div class="card my-4">
                <h5 class="card-header">Search</h5>
                <div class="card-body">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                <button class="btn btn-secondary" type="button">Go!</button>
              </span>
                    </div>
                </div>
            </div>

            <!-- Categories Widget -->
            <div class="card my-4">
                <h5 class="card-header">Categories</h5>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">Web Design</a>
                                </li>
                                <li>
                                    <a href="#">HTML</a>
                                </li>
                                <li>
                                    <a href="#">Freebies</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-6">
                            <ul class="list-unstyled mb-0">
                                <li>
                                    <a href="#">JavaScript</a>
                                </li>
                                <li>
                                    <a href="#">CSS</a>
                                </li>
                                <li>
                                    <a href="#">Tutorials</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Side Widget -->
            <div class="card my-4">
                <h5 class="card-header">Side Widget</h5>
                <div class="card-body">
                    You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                </div>
            </div>

        </div>

    </div>
    <!-- /.row -->

</div>
<!-- /.container -->

<div class="container">
    <div class="row">

        <div class="col-lg-3 col-md-12">

    </div>
    </div>
</div>

    <!-- Post Overview -->
<footer class="page-footer font-small mdb-color pt-4">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">

        <!-- Footer links -->
        <div class="row text-center text-md-left mt-3 pb-3">

            <!-- Grid column -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold">Company name</h6>
                <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
                    consectetur
                    adipisicing elit.</p>
            </div>
            <!-- Grid column -->

            <hr class="w-100 clearfix d-md-none">

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
                <p>
                    <a href="#!">MDBootstrap</a>
                </p>
                <p>
                    <a href="#!">MDWordPress</a>
                </p>
                <p>
                    <a href="#!">BrandFlow</a>
                </p>
                <p>
                    <a href="#!">Bootstrap Angular</a>
                </p>
            </div>
            <!-- Grid column -->

            <hr class="w-100 clearfix d-md-none">

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold">Useful links</h6>
                <p>
                    <a href="#!">Your Account</a>
                </p>
                <p>
                    <a href="#!">Become an Affiliate</a>
                </p>
                <p>
                    <a href="#!">Shipping Rates</a>
                </p>
                <p>
                    <a href="#!">Help</a>
                </p>
            </div>

            <!-- Grid column -->
            <hr class="w-100 clearfix d-md-none">

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                <p>
                    <i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
                <p>
                    <i class="fas fa-envelope mr-3"></i> info@gmail.com</p>
                <p>
                    <i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                <p>
                    <i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
            </div>
            <!-- Grid column -->

        </div>
        <!-- Footer links -->

        <hr>

        <!-- Grid row -->
        <div class="row d-flex align-items-center">

            <!-- Grid column -->
            <div class="col-md-7 col-lg-8">

                <!--Copyright-->
                <p class="text-center text-md-left">© 2018 Copyright:
                    <a href="https://mdbootstrap.com/education/bootstrap/">
                        <strong> MDBootstrap.com</strong>
                    </a>
                </p>

            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-5 col-lg-4 ml-lg-0">

                <!-- Social buttons -->
                <div class="text-center text-md-right">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                <i class="fab fa-google-plus-g"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn-floating btn-sm rgba-white-slight mx-1">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
            <!-- Grid column -->

        </div>
        <!-- Grid row -->

    </div>
    <!-- Footer Links -->

</footer>

<!-- Footer -->
<script src="js/all.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://cdn.rtlcss.com/bootstrap/v4.2.1/js/bootstrap.min.js" integrity="sha384-a9xOd0rz8w0J8zqj1qJic7GPFfyMfoiuDjC9rqXlVOcGO/dmRqzMn34gZYDTel8k" crossorigin="anonymous"></script>
<script>

    $('#myCarousel').carousel({
        interval: false
    });

    //scroll slides on swipe for touch enabled devices

    $("#myCarousel").on("touchstart", function(event){

        var yClick = event.originalEvent.touches[0].pageY;
        $(this).one("touchmove", function(event){

            var yMove = event.originalEvent.touches[0].pageY;
            if( Math.floor(yClick - yMove) > 1 ){
                $(".carousel").carousel('next');
            }
            else if( Math.floor(yClick - yMove) < -1 ){
                $(".carousel").carousel('prev');
            }
        });
        $(".carousel").on("touchend", function(){
            $(this).off("touchmove");
        });
    });
</script>
</body>
</html>