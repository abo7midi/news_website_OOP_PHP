<?php
        require_once  __DIR__.'\..\model\articalModel.php';
        require_once "..\model\db.php";

class Articals extends DB {
	
  function getMyArticals($uid){
    return $this->select(ArticalModel::$getMyArticals,$uid);
  }
	
	function getAllArticals(){
    return $this->select(ArticalModel::$getAllArticals);
  }


	function getUnacceptedArticals(){
    return $this->select(ArticalModel::$getUnacceptedArticals);
  }
	
	function getAcceptedArticals(){
    return $this->select(ArticalModel::$getAcceptedArticals);
  }
	
	function getArtical($artid){
    return $this->select(ArticalModel::$getArtical,$artid);
  }
	
	function insertArtical($artTitle,$artContent,$artUser,$artCat,$artImg,$artPublishDate,$artIntro){
	
		$info=array(
					"artTitle"=>$artTitle,
				   	"artContent"=>$artContent,
					"artUser"=>$artUser,
					"artCat"=>$artCat,
					"artImg"=>$artImg,
					"artPublishDate"=>$artPublishDate,
					"artIntro"=>$artIntro
					
					);
    return $this->insert(ArticalModel::$insertArtical,$info);
  }
	
	function acceptArtical($artstate,$artid){
		$info=array(
					"artstate"=>$artstate,
				   	"artid"=>$artid
					);
    return $this->update(ArticalModel::$acceptArtical,$info);
  }
	
	function EditArtical($artTitle,$artContent,$artImg,$artPublishDate,$artUpdates,$artIntro,$artId){
		$info=array(
					"artTitle"=>$artTitle,
				   	"artContent"=>$artContent,
					"artImg"=>$artImg,
					"artPublishDate"=>$artPublishDate,
					"artUpdates"=>$artUpdates,
					"artIntro"=>$artIntro,
					"artId"=>$artId
					);
    return $this->update(ArticalModel::$EditArtical,$info);
  }
	
}
?>