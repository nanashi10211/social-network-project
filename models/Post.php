<?php

include_once("./helpers/model-utilitis/Model.php");
include_once("./helpers/database/database.php");

class Post extends Model {

}

$post = new Post($conn);

$post->create("Posts", [
    "id" => "int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY",
    "user_id" => "varchar(255) NOT NULL",
    "post_text" => "text",
    "post_reacts" => "JSON",
    "image" => "varchar(255)",
]);