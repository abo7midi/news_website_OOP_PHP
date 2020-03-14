<?php
	session_start();
    require_once __DIR__."/../controller/users.php";
    require_once __DIR__."/../controller/categories.php";
    require_once __DIR__."/../controller/articalController.php";
    require_once __DIR__."/../controller/breakController.php";
    require_once __DIR__."/../controller/commentController.php";
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
	<link rel="stylesheet" href="../style/normalize.css">
	<link rel="stylesheet" href='../style/main.css'>
	
</head>
<body>
	<!--************************** NAV **********************************************-->
<nav class="navbar navbar-expand-lg navbar-light ">
  <a class="navbar-brand" href="#"><img src="../img/logo.png" width="50" height="50" style="margin-right: 30px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">الرئيسية <span class="sr-only">(current)</span></a>
      </li>
      <?php
      foreach ($cate->mainCategory() as $cat){
      echo'<li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            '.$cat['cat_name'].'
         </a>
         <div class="dropdown-menu" aria-labelledby="navbarDropdown">';
        foreach ($cate->childCategory($cat['cat_id']) as $child){
            echo ' <a class="dropdown-item" href="categories.php?catid='.$child['cat_id'].'">'.$child['cat_name'].'</a>';
            }
        echo '</div>
        </li>';
      }
      ?>
          </ul>
      <?php
      if(!isset($_SESSION['state'])){
          echo'<a class="outline-primary my-2 my-sm-0 loginbtn" href="login.php" style="font-weight: lighter;"><i class="fas fa-sign-in-alt" style="margin-left: 3px"></i>تسجيل الدخول</a>';
      }else{
          echo'<a class="outline-primary my-2 my-sm-0 loginbtn" href="dashboard.php"><img src=../'. $_SESSION['userImg'].' width="50" height="50" class="rounded-circle">'. $_SESSION['userName'].'</a>
                <a class="btn btn-outline-primary my-2 my-sm-0 loginbtn" href="logout.php"><i class="fas fa-sign-out-alt" style="margin-left: 3px"></i>خروج</a>';
      }
      ?>
      <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
</nav>
