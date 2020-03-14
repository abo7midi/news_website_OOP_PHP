<?php
require_once 'header.php';
$artical=new Articals();
$comment=new Comment();
if(isset($_GET['catid'])){
    $arts=$artical->getCateArticals($_GET['catid']);
}
else
    header('location:../index.php');
?>

<!-- Page Content -->
<div class="container" style="background: #fff;">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">
            <div class="col-lg-3 col-md-12">
                <?php

                foreach ($arts as $art) {
                    echo'<div class="card card-small mb-3 " style="width: 18rem;">
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
        </div>';

                }
                ?>
            </div>
        </div>

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

<?php
require_once 'footer.php';
?>
