<?php

require_once __DIR__."\..\model\userModel.php";
require_once __DIR__."/../model/db.php";

class Users extends DB {

    function login($email,$pass){
        $mpass=md5($pass);

        $info=array(
            "email"=>$email,
            "pass"=>$mpass
        );
        return $this->select(UserModel::$login,$info);
    }

    function getAllUsers(){
        return $this->select(UserModel::$getAllUsers);
    }

    function getUnacceptedUsers(){
        return $this->select(UserModel::$getUnacceptedUsers);
    }
    function getAcceptedUsers(){
        return $this->select(UserModel::$getAcceptedUsers);
    }

    function rigestrUser($uname,$upass,$uemail,$usex,$img){
        $mpass=md5($upass);
        $info=array(
            "uname"=>$uname,
            "upass"=>$mpass,
            "uemail"=>$uemail,
            "usex"=>$usex,
            "uimg"=>$img
        );
        return $this->insert(UserModel::$rigestrUser,$info);
    }

    function upgradeUser($ustate,$uid){
        $info=array(
            "ustate"=>$ustate,
            "uid"=>$uid
        );
        return $this->update(UserModel::$upgradeUser,$info);
    }
}
?>