<?php
    session_start();
    require_once __DIR__."/controller/users.php";
    require_once __DIR__."/controller/categories.php";
    require_once __DIR__."/controller/articalController.php";
    require_once __DIR__."/controller/breakController.php";
    require_once __DIR__."/controller/commentController.php";
    $user=new Users();
    $cate=new Categories();
    $break=new Breaks();
    $artical=new Articals();
    $comm=new Comment();


    function upload_img(){
        $info=explode(".",$_FILES['img']['name']);				//to get the file type
        $extentions= array('jpg','png','gif');					//array for specific extentions
        if(in_array(end($info), $extentions)){
            $path="img/".time().".".end($info);

            if(move_uploaded_file($_FILES['img']['tmp_name'],$path ))	//move_uploaded_file(from,to);
            {

                return $path;
            }
        }
        return "img/default.png";
    }

if(isset($_POST['login'])){
        $found=$user->login($_POST['email'],$_POST['pass']);

        if(!empty($found)){
            $_SESSION['userId']=$found[0]['user_id'];
            $_SESSION['state']=1;
            $_SESSION['userName']=$found[0]['user_name'];
            $_SESSION['userPass']=$found[0]['user_pass'];
            $_SESSION['userGroup']=$found[0]['user_group_id'];
            $_SESSION['userImg']=$found[0]['user_img'];

            header("location:index.php");
        }else{
            echo "قم بالتسجيل في الموقع اولاً";
        }
    }

    if(isset($_POST['reg'])){
        $img=upload_img();
        $user->rigestrUser($_POST['un'],$_POST['pass'],$_POST['email'],$_POST['sex'],$img);
        echo '<div style="width: 100%; background: #18cd98; color: #fff; height: 100%; text-align: center; padding-top: 200px">';
        echo '<h1>تم تسجيلك بنجاح سيأخذ الوقت الى 24 ساعة حتى يتم تفعيل حسابك</h1>';
        echo '<h5><a href="index.php">للعودة الى الصفحة الرئيسية</a></h5>';
        echo '</div>';
    }

    if(isset($_POST['commentBtn'])){

        $comm->insertComment($_POST['commContent'],10,$_POST['commArt']);
        header("location:view/show.php?artid=".$_POST['commArt']."");
    }

if(isset($_POST['publish'])){
    $img=upload_img();
    $addArt=$artical->insertArtical($_POST['artTitle'],$_POST['artContent'],$_SESSION['userId'],$_POST['artCate'],$img,$_POST['artPublishDate'],$_POST['artIntro']);
    if($addArt=='inserted'){
        echo $msg['articals'][0];
    }else{
        echo $msg['articals'][1];
    }

}


?>