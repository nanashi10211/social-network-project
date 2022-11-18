<?php

include_once("./functions/utils.php");
// show 404 if not login
notLogin404();


$query = "WHERE sender_id=".$_GET['sender']." AND reciver_id=".$_SESSION['id']." OR "."sender_id=".$_SESSION['id']." AND "."reciver_id=".$_GET['sender'];
$s_r_m = $message->findAllByCondition($query);

$old_msg = $_POST['msg'];
$new_msg = json_encode($s_r_m);

if($old_msg === $new_msg) {
    echo "same";
} else {
    echo "not same";
}
