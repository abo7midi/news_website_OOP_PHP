<?php
session_start();
if(empty($_SESSION['adminId']))
    header("location:logout.php");
require_once '../controller/categoriesController.php';
require_once '../controller/articalsController.php';
$artical=new Articals();
$art=$artical->getArtical(array($_GET['art']));
?>

<!doctype html>
<html class="no-js h-100" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shards Dashboard Lite - Free Bootstrap Admin Template – DesignRevision</title>
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="styles/shards-dashboards.1.1.0.min.css">
    <link rel="stylesheet" href="styles/extras.1.1.0.min.css">
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.snow.css"> </head>
<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: '#ahmed'
    });
</script>
<body class="h-100">
    <div class="card card-small mb-3">
    <div class="card-body">
        <form class="add-new-post" method="post" action="../validation.php" enctype="multipart/form-data">
            <input class="form-control form-control-lg mb-3" type="text" placeholder="عنوان المقال" value=<?php echo $art[0]['art_title'];?> name="artTitle">
            <div class="form-group">
                <label for="exampleFormControlFile1">مقدمة للمقال</label>
                <input type="text" class="form-control form-control-lg mb-3" name="artIntro" value=<?php echo $art[0]['art_intro'];?> id="exampleFormControlFile1">
            </div>

            <div class="form-group">
                <label for="exampleFormControlSelect1">تصنيف المقال</label>
                <select class="form-control" name='artCate' value=<?php echo $art[0]['art_cat'];?> id="exampleFormControlSelect1">
                    <?php
                    $category=new Categories();
                    $result=$category->getAcceptedCategories();
                    foreach($result as $row){
                        echo"<option class=form-control form-control-lg mb-3' value=$row[cat_id]>$row[cat_name]</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">اختر صورة للمقال</label>
                <input type="file" class="form-control-file" name="img" value=<?php echo $art[0]['art_img'];?> id="exampleFormControlFile1">
            </div>
            <textarea id="ahmed" name="artContent" value=<?php echo $art[0]['art_content'];?>></textarea>
            <button type="submit" class="btn btn-primary form-control form-control-lg mb-3" name="update">تعديل
            </button>

        </form>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script src="scripts/extras.1.1.0.min.js"></script>
    <script src="scripts/shards-dashboards.1.1.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.min.js"></script>
    <script src="scripts/app/app-blog-new-post.1.1.0.js"></script>
</body>
</html>