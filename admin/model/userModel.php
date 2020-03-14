<?php
class UserModel{
    static $login="SELECT * FROM users where user_email=:email and user_pass=:pass  and user_group_id=1 and user_state=1" ;
    static $getAllUsers="SELECT * FROM `users`" ;
    static $getUnacceptedUsers="SELECT * FROM `users` where user_state=0" ;
    static $getAcceptedUsers="SELECT * FROM `users` where user_state=1" ;
    static $rigestrUser="insert into users values(null,:uname,:upass,:uemail,:usex,1,:uimg,0,now())" ;
    static $upgradeUser="update users set user_state=:ustate where user_id=:uid" ;
}