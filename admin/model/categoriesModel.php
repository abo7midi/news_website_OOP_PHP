<?php
class CategoryModel{
    static $getAllCategories= "SELECT c1.cat_id,c1.cat_name ,c2.cat_major,u.user_name,c1.cat_state FROM `categories` c1 inner join categories c2 using(cat_id) inner join users u on u.user_id=c1.user_id" ;
    static $spicificCategory="SELECT * FROM `categories` where cat_id=:catid" ;
    static $getAcceptedCategories="SELECT * FROM `categories` where cat_state=1" ;
    static $insertCategories="insert into categories values(null,:catname,:catmajor,:catuser,now(),1,'')" ;
    static $stopCategory= "update categories set cat_state=:catstate where cat_id=:catid";
    static $mainCategory="SELECT * FROM categories where cat_state=1 and cat_major=0" ;
}