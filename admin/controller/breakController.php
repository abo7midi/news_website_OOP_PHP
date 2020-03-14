<?php
    require_once "..\model\db.php";
    require_once __DIR__."\..\model\breakModel.php";


class Breaks extends DB {

    function getMyBreaks($uid){
        return $this->select(BreakModel::$getMyBreaks,$uid);
    }

    function getAllBreaks(){
        return $this->select(BreakModel::$getAllBreaks);
    }

    function getUnacceptedBreaks(){
        return $this->select(BreakModel::$getUnacceptedBreaks);
    }

    function getAcceptedBreaks(){
        return $this->select(BreakModel::$getAcceptedBreaks);
    }

    function getbreak($breakid){
        return $this->select(BreakModel::$getbreak,$breakid);
    }

    function insertBreak($brContent,$brDuration,$brUser ){

        $info=array(
            "brContent"=>$brContent,
            "brDuration"=>$brDuration,
            "brUser"=>$brUser
        );
        return $this->insert(BreakModel::$insertBreak,$info);
    }

    function disableBreak($brstate,$brid){
        $info=array(
            "brstate"=>$brstate,
            "brid"=>$brid
        );
        return $this->update(BreakModel::$disableBreak,$info);
    }
}
?>