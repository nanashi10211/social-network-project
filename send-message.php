<?php

include_once("./functions/utils.php");
// show 404 if not login
notLogin404();

if(!empty($_POST['sender']) && !empty($_POST['reciver']) && !empty($_POST['msg'])) {
    $result = $message->insert([
        "sender_id" => trim($_POST['sender']),
        "reciver_id" => trim($_POST['reciver']),
        "message_content" => trim($_POST['msg'])
    ]);
    if($result) {
        echo "Message has beed sent";
    } else {
        echo "error sending message";
    }
} else {
    echo "condition not set";
}


