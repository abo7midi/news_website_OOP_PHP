<?php
require_once  __DIR__.'\..\model\adsModel.php';
require_once "..\model\db.php";

class Ads extends DB {

    function getAllAds(){
        return $this->select(AdsModel::$getAllAds);
    }

    function getAllAdsCust(){
        return $this->select(AdsModel::$getAllAdsCust);
    }

    function getPos(){
        return $this->select(AdsModel::$getPos);
    }

    function getUnacceptedAd(){
        return $this->select(AdsModel::$getUnacceptedAds);
    }

    function getAcceptedAd(){
        return $this->select(AdsModel::$getAcceptedAds);
    }

    function insertAd($adContent,$adStartDate,$adEndDate,$adUserId,$adLinks,$adCustomerId,$adPosId){
        $info=array(
            "adContent"=>$adContent,
            "adStartDate"=>$adStartDate,
            "adState"=>0,
            "adEndDate"=>$adEndDate,
            "adUserId"=>$adUserId,
            "adLinks"=>$adLinks,
            "adCustomerId"=>$adCustomerId,
            "adPosId"=>$adPosId

        );
        return $this->insert(AdsModel::$insertAds,$info);
    }

    function insertAdCust($ad_customer_name,$ad_customer_phone,$ad_customer_email,$ad_customer_company){
        $info=array(
            "adCustomerName"=>$ad_customer_name,
            "adCustomerPhone"=>$ad_customer_phone,
            "adCustomerEmail"=>$ad_customer_email,
            "adCustomerState"=>1,
            "adCustomerCompany"=>$ad_customer_company
        );
        return $this->insert(AdsModel::$insertAdsCustomer,$info);
    }
    function acceptAd($adState,$adId){
        $info=array(
            "adState"=>$adState,
            "adId"=>$adId
        );
        return $this->insert(AdsModel::$acceptAds,$info);
    }

}