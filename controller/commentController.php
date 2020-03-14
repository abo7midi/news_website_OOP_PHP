<?php

require_once __DIR__ . "/../model/db.php";
require_once __DIR__ . "\..\model\commentModel.php";

class Comment extends DB
{
    function getArticalComments($artId){
        $info=array(
            'artId'=>$artId
        );
        return $this->select(CommentModel::$getArticalComments,$info);
    }

    function insertComment($commContent,$commUser,$commArt){
        $info=array(
          'commContent'=>$commContent,
          'commUser'=>$commUser,
          'commArt'=>$commArt
        );
        return $this->insert(CommentModel::$addComment,$info);
    }
}