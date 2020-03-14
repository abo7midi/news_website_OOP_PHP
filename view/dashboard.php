<?php
    require_once 'header.php';
    require_once '../controller/users.php';
    require_once '../controller/articalController.php';
    $user=new Users();
    $artical=new Articals();

    ?>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#ahmed'
        });
    </script>
	<section class="container">
		<section class="row">
			<section class="profile">
            <?php
                    echo '<img src=../'.$_SESSION['userImg'].' class="d-flex justify-content-center">
					<h5 class="d-flex justify-content-center">'.$_SESSION['userName'].'</h5>
					<p class="d-flex justify-content-center">ناشر</p>
					<a class="btn btn-outline-secondary my-2 my-sm-0 " href="logout.php">خروج</a>';

				 ?>
				
			</section>
		</section>
	
	</section>
	
	<!--******************************** ADD ARTICAL  ********************************-->
	<section class="container" style="background:#fff; border-bottom:3px solid #FEC300; padding:30px">
		<section class="row">
			<section class="artical col-lg-12">
                <div class="card  mb-3">
                    <div class="card-body">
                        <form class="add-new-post" method="post" action="../validation.php" enctype="multipart/form-data">
                            <input class="form-control form-control-lg mb-3" type="text" placeholder="عنوان المقال" name="artTitle">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">مقدمة للمقال</label>
                                <input type="text" class="form-control form-control-lg mb-3" name="artIntro" id="exampleFormControlFile1">
                            </div>
                            <div class="form-group ">
                                <label for="example-datetime-local-input" class="col-2 col-form-label">وقت النشر</label>
                                <div class="col-10">
                                    <input class="form-control" type="datetime-local" name="artPublishDate" id="example-datetime-local-input">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlSelect1">تصنيف المقال</label>
                                <select class="form-control" name='artCate' id="exampleFormControlSelect1">
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
                                <input type="file" class="form-control-file" name="img" id="exampleFormControlFile1">
                            </div>

                            <textarea id="ahmed" name="artContent"></textarea>
                            <button type="submit" class="btn btn-primary form-control form-control-lg mb-3" name="publish">نشر
                            </button>

                        </form>
                    </div>
                </div>
			</section>
		</section>
	</section>
<?php
    require_once 'footer.php';
?>