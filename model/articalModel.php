<?php
class ArticalModel{

static $getMyArticals="SELECT a.*,u.user_name,u.user_img FROM `artical` a INNER JOIN users u ON a.art_user=u.user_id where art_user=?";
static $getlastArticals="SELECT a.*,u.user_name,u.user_img FROM `artical` a INNER JOIN users u ON a.art_user=u.user_id where art_state=1 order by art_id asc  limit 5 ";
static $getCateArticals="SELECT a.*,u.user_name,u.user_img FROM `artical` a INNER JOIN users u ON a.art_user=u.user_id inner join categories c on a.art_cat=c.cat_id where art_state=1 and art_cat=:catid order by art_id asc ";
static $getAllArticals="SELECT a.*,u.user_name,c.cat_name,u.user_img FROM `artical` a INNER JOIN users u ON a.art_user=u.user_id INNER JOIN categories c ON a.art_cat=c.cat_id";
static $getUnacceptedArticals="SELECT a.*,u.user_name,c.cat_name,u.user_img FROM `artical` a INNER JOIN users u ON a.art_user=u.user_id INNER JOIN categories c ON a.art_cat=c.cat_id  where art_state=0";
static $getAcceptedArticals="SELECT a.*,u.user_name,c.cat_name,u.user_img FROM `artical` a INNER JOIN users u ON a.art_user=u.user_id INNER JOIN categories c ON a.art_cat=c.cat_id  where art_state=1";
static $getArtical="SELECT a.*,u.user_name,c.cat_name,u.user_img FROM `artical` a INNER JOIN users u ON a.art_user=u.user_id INNER JOIN categories c ON a.art_cat=c.cat_id  where art_id=?";
static $insertArtical="insert into artical values(null,:artTitle,:artContent,now(),:artUser,:artCat,0,:artImg,:artPublishDate,'',:artIntro)";
static $acceptArtical="update artical set art_state=:artstate where art_id=:artid";
static $EditArtical="UPDATE artical SET art_title=:artTitle,art_content=:artContent,art_state=0,art_img=:artImg,art_publish_date=:artPublishDate,art_updates=:artUpdates,art_intro=:artIntro WHERE art_id=:artId";
}