<?php
class CommentModel{
    static $getArticalComments='select c.*,a.*,u.* from comments c inner join artical a on c.comm_art=a.art_id inner join users u on u.user_id=c.comm_user where c.comm_state=1 and c.comm_art=:artId';
    static $addComment='INSERT INTO `comments`(`comm_content`, `comm_date`, `comm_user`, `comm_art`, `comm_state`) VALUES (:commContent,now(),:commUser,:commArt,1)';
}