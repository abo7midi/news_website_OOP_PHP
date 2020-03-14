<?php
require_once 'header.php';
$artical=new Articals();
$comment=new Comment();
if(isset($_GET['artid'])){
    $art=$artical->getArtical(array($_GET['artid']))[0];
    $com=$comment->getArticalComments($_GET['artid']);

}
else
    header('location:../index.php');
?>

<!-- Page Content -->
<div class="container" style="background: #fff;">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Title -->
            <h1 class="mt-4" style="color: #e0a800;"><?php  echo $art['art_title'];?></h1>

            <!-- Author -->
            <small class="lead" style="color: #e0a800;">
                <i style="float: right; margin-left: 4px" class="fas fa-feather-alt"></i> <?php  echo $art['user_name'];?>
            </small>
            <small style="color: #e0a800; float: left">
                <?php  echo $art['art_date'];?><i style=" margin: 0 7px 0 10px;" class="fas fa-calendar-alt"></i>
            </small>
            <!-- Date/Time -->


            <hr>

            <!-- Preview Image -->
            <img class="img-fluid rounded" src="<?php  echo $art['art_img'];?>" alt="">

            <hr>

            <!-- Post Content -->
            <p class="lead"><?php  echo $art['art_intro'];?></p>

            <br>
            <p><?php  echo $art['art_content'];?></p>

            <hr>

            <!-- Comments Form -->
            <div class="card my-4">
                <h5 class="card-header"> <i style="margin-left: 4px" class="fas fa-comment"></i> تعليقات </h5>
                <div class="card-body">
                    <form method="post" action="../validation.php">
                        <div class="form-group">
                            <textarea class="form-control" rows="3" name="commContent"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="commArt" value="<?php echo $_GET['artid']; ?>">
                        </div>
                        <button type="submit" name="commentBtn" class="btn btn-primary">تلعيق</button>
                    </form>
                </div>
            </div>

            <!-- Single Comment -->
            <?php

            foreach ($com as $c ){
                echo '<div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" width="50" height="50"  src="../'.$c['user_img'].'" alt="">
                <div class="media-body">
                    <h6 style="color: #e0a800;" class="mt-0">'.$c['user_name'].'</h6>
                    '.$c['comm_content'].'
                </div>
                <div class="media-body"> 
                <i style="float: left; color: #e0a800; margin-left: 30px;" class="fas fa-calendar-alt"></i><small style="float: left; color: #e0a800; margin-left: 6px;">'.$c['comm_date'].'</small>
                </div>
            </div>';
            }
            ?>

            <!-- Comment with nested comments -->
         <!--   <div class="media mb-4">
                <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                <div class="media-body">
                    <h5 class="mt-0">Commenter Name</h5>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.

                    <div class="media mt-4">
                        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                        <div class="media-body">
                            <h5 class="mt-0">Commenter Name</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>

                    <div class="media mt-4">
                        <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                        <div class="media-body">
                            <h5 class="mt-0">Commenter Name</h5>
                            Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        </div>
                    </div>

                </div>
            </div>
-->
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
