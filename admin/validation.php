<?php
	session_start();
	require_once "controller/usersController.php";
	require_once "controller/articalsController.php";
	require_once "controller/categoriesController.php";
    require_once "controller/breakController.php";
    require_once "controller/adsController.php";
 	$msg=[
		'articals'=>[
					0=>'تم رفع المقال بنجاح',
					1=>'لم يتم رفع المقال لمخالفته للشروط'
				],
		
		'users'=>[
					0=>'أهلاً بك ',
					1=>'أدخلت البريد الالكتروني او كلمة السر بطريقة خاطئة أو قد تكون غير مصرح لك بالدخول'
				]
	];

	$admin=new Users();
	$artical=new Articals();
	$category=new Categories();
    $break=new Breaks();
    $adv=new Ads();
function upload_img(){
		$info=explode(".",$_FILES['img']['name']);				//to get the file type
		$extentions= array('jpg','png','gif');					//array for specific extentions
		if(in_array(end($info), $extentions)){
			$path="../img/".time().".".end($info);

			if(move_uploaded_file($_FILES['img']['tmp_name'],$path ))	//move_uploaded_file(from,to);
			{
				
					return $path;
			}
		}
		return "../img/default.png";
	}


if(isset($_POST['login'])){
	$found=$admin->login($_POST['email'],$_POST['pass']);
	//print_r($admin->login($_POST['email'],$_POST['pass']));
	if(!empty($found)){
		$_SESSION['adminId']=$found[0]['user_id'];
		$_SESSION['adminName']=$found[0]['user_name'];
		$_SESSION['adminPass']=$found[0]['user_pass'];
		$_SESSION['adminGroup']=$found[0]['user_group_id'];
		$_SESSION['adminImg']=$found[0]['user_img'];
		echo $msg['users'][0];
		header("location:view/");
	}else{
		echo $msg['users'][1];
	}
}
if(isset($_POST['publish'])){
	$img=upload_img();
	$addArt=$artical->insertArtical($_POST['artTitle'],$_POST['artContent'],$_SESSION['adminId'],$_POST['artCate'],$img,$_POST['artPublishDate'],$_POST['artIntro']);
	if($addArt=='inserted'){
		echo $msg['articals'][0];
	}else{
		echo $msg['articals'][1];
	}

}
if(isset($_POST['update'])){
    $img=upload_img();
    $addArt=$artical->EditArtical($_POST['artTitle'],$_POST['artContent'],$img,$_POST['artPublishDate'],$_POST['artIntro']);
    if($addArt=='inserted'){
        echo $msg['articals'][0];
    }else{
        echo $msg['articals'][1];
    }

}
if(isset($_GET['artState'])){
	if($_GET['artState']==0){
		$artical->acceptArtical(0,$_GET['artID']);	
		
	}else{
		$artical->acceptArtical(1,$_GET['artID']);
	}
	header("location:view/components-blog-posts.php");
}

if(isset($_POST['createCate'])){
	$category->insertCategories($_POST['catName'],$_POST['mainCate'],$_SESSION['adminId']);
	header("location:view/categories.php");
}
if(isset($_POST['breakBtn'])){
    $break->insertBreak($_POST['breakContent'],$_POST['breakEX'],$_SESSION['adminId']);
    header("location:view/errors.php");
}

if(isset($_GET['catID'])){
	if($_GET['catState']==0)
		$category->stopCategory(0,$_GET['catID']);
	else
		$category->stopCategory(1,$_GET['catID']);
	header("location:view/categories.php");
}


if(isset($_GET['brkID'])){
    if($_GET['brkState']==0)
        $break->disableBreak(0,$_GET['brkID']);
    else
        $break->disableBreak(1,$_GET['brkID']);
    header("location:view/errors.php");
}

if(isset($_GET['userID'])){
    if($_GET['userState']==0)
        $admin->upgradeUser(0,$_GET['userID']);
    else
        $admin->upgradeUser(1,$_GET['userID']);
    header("location:view/tables.php");
}

/*************************************************************/
if(isset($_POST['catName'])){
    $catName=$_POST["catName"];
    $catMajor=$_POST["catMajor"];

//if($category->insertCategories($catName,$catMajor,$_SESSION['adminId'])==="inserted"){
    echo json_encode($category->insertCategories($catName,$catMajor,$_SESSION['adminId']));
//}
}
/******************************************************************/
if(isset($_POST['addadv'])){
    $img=upload_img();
    $adv->insertAd($img,$_POST['advstdate'],$_POST['advenddate'],$_SESSION['adminId'],$_POST['advsite'],$_POST['advCustomer'],$_POST['advPos']);
    header("location:view/adv.php");
}
if(isset($_POST['insertCadv'])){
    $adv->insertAdCust($_POST['advCName'],$_POST['advCPhone'],$_POST['advCEmail'],$_POST['advCCompany']);
    header("location:view/adv.php");
}

?>