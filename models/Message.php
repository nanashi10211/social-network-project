<?php

include_once("./helpers/model-utilitis/Model.php");
include_once("./helpers/database/database.php");

class Message extends Model {

}

$message = new Message($conn);

$message->create("Messages", [
    "id" => "int(6) NOT NULL AUTO_INCREMENT PRIMARY KEY",
    "sender_id" => "varchar(255) NOT NULL",
    "reciver_id" => "varchar(255) NOT NULL",
    "message_content" => "text",
    "image" => "varchar(255)",
]);