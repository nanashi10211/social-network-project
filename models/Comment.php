<?php

include_once("./helpers/model-utilitis/Model.php");
include_once("./helpers/database/database.php");

class Comment extends Model {

}

$comment = new Comment($conn);

$comment->create("Comments", [
    "id" => "int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY",
    "user_id" => "varchar(255) NOT NULL",
    "post_text" => "text",
    "like" => "int",
    "image" => "varchar(255)",
]);