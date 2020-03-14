<?php
class BreakModel{
    static $getMyBreaks="SELECT a.*,u.user_name,u.user_img FROM `breakingnews` a INNER JOIN users u ON a.art_user=u.user_id where art_user=?" ;
    static $getAllBreaks= "SELECT a.*,u.user_name,u.user_img FROM breakingnews a INNER JOIN users u ON a.user_id=u.user_id ";
    static $getUnacceptedBreaks= "SELECT a.*,u.user_name,c.cat_name,u.user_img FROM breakingnews a INNER JOIN users u ON a.art_user=u.user_id   where break_state=0";
    static $getAcceptedBreaks= "SELECT a.*,u.user_name,c.cat_name,u.user_img FROM breakingnews a INNER JOIN users u ON a.art_user=u.user_id   where break_state=1";
    static $getbreak="SELECT a.*,u.user_name,c.cat_name,u.user_img FROM breakingnews a INNER JOIN users u ON a.art_user=u.user_id    where break_id=?" ;
    static $insertBreak="INSERT INTO `breakingnews` (`break_id`, `break_content`, `break_date`, `break_state`, `break_duration_min`, `user_id`)
                                VALUES (NULL, :brContent, now(), 1, :brDuration, :brUser)" ;
    static $disableBreak="UPDATE `breakingnews` SET `break_state`=:brstate WHERE break_id=:brid" ;
}