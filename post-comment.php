<?php
// create post php
include_once("./functions/utils.php");


// post comments
if($_SERVER['REQUEST_METHOD'] == "POST") {
    
    if(isset($_POST['comment'])) {
        $cmt = trim($_POST['comment']);
        $res = $comment->insert([
            "user_id" => $_SESSION['id'],
            "post_id" => $_GET['id'],
            "comment_text" => $cmt
        ]);
        if($res) {
       
            echo "comment post";

        } else {
            echo "comment post problem";

        }
    
    } else {
        include_once("404.php");
    }


 } else {
    include_once("404.php");
 }