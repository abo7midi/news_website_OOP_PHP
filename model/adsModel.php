<?php

class AdsModel
{

   // static $getMyArticals = "SELECT a.*,u.user_name,u.user_img FROM `breakingnews` a INNER JOIN users u ON a.art_user=u.user_id where art_user=?";
    static $getAllAds = "SELECT a.* FROM `ads` a INNER JOIN ad_customer u using u.ad_customer_id ";
    static $getAllAdsCust = "SELECT * FROM `ad_customer` ";
    static $getUnacceptedAds = "SELECT a.* FROM `ads` a INNER JOIN ad_customer u using u.ad_customer_id where ad_state=0";
    static $getAcceptedAds = "SELECT a.* FROM `ads` a INNER JOIN ad_customer u using u.ad_customer_id where ad_state=1";
    static $getAds = "SELECT a.*,u.user_name,c.cat_name,u.user_img FROM `artical` a INNER JOIN users u ON a.art_user=u.user_id INNER JOIN categories c ON a.art_cat=c.cat_id  where art_id=?";
    static $insertAds = "insert into ads values(null,:adContent,:adStartDate,:adState,:adEndDate,:adUserId,:adLinks,:adCustomerId,:adPosId)";
    static $insertAdsCustomer = "insert into ad_customer values(null,:adCustomerName,:adCustomerPhone,:adCustomerEmail,:adCustomerState,:adCustomerCompany)";
    static $acceptAds = "update ads set ad_state=:adState where ad_id=:adId";
    static $acceptAdsCustomer = "update ad_customer set ad_customer_state=:adCustomerState where ad_customer_id=:adCustomerId";
    static $EditAds = "UPDATE ads SET art_title=:artTitle,art_content=:artContent,art_state=0,art_img=:artImg,art_publish_date=:artPublishDate,art_updates=:artUpdates,art_intro=:artIntro WHERE art_id=:artId";
    static $getPos = "SELECT * FROM `websitpositions` ";

}