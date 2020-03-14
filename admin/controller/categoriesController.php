<?php
	require_once "..\model\db.php";
	require_once __DIR__."\..\model\categoriesModel.php";

class Categories extends DB {

  function getAllCategories(){
    return $this->select("SELECT c1.cat_id,c1.cat_name ,c2.cat_major,u.user_name,c1.cat_state FROM `categories` c1 inner join categories c2 using(cat_id) inner join users u on u.user_id=c1.user_id");
  }
	
  function spicificCategory($catId){
	  $info=array("catid"=>$catId);
    return $this->select("SELECT * FROM `categories` where cat_id=:catid",$info);
  }

  function getAcceptedCategories(){
      print_r($this->select("SELECT * FROM `categories` where cat_state=1" ));
    return $this->select("SELECT * FROM `categories` where cat_state=1" );
  }

	function insertCategories($catname,$catmajor,$catuser){
		$info=array(
					"catname"=>$catname,
				   	"catmajor"=>$catmajor,
					"catuser"=>$catuser
					);
    return $this->insert(CategoryModel::$insertCategories,$info);

  }
	
	function stopCategory($catstate,$catid){
		$info=array(
					"catstate"=>$catstate,
				   	"catid"=>$catid
					);
    return $this->update(CategoryModel::$stopCategory,$info);
  }

    function childCategory($parent){
        $info=array('catid'=>$parent);
        return $this->select(CategoryModel::$childCategory,$info);
    }

	function mainCategory(){
    return $this->select(CategoryModel::$mainCategory);
  }

}
?>