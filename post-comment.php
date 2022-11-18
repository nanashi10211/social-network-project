<?php
// create post php
include_once("./functions/utils.php");


$indexPattern = "/index/i";
$profilePattern = "/profile/i";

$index = preg_match_all($indexPattern, $_GET['s']);
$profile = preg_match_all($profilePattern, $_GET['s']);



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
        //    if($index) {
        //     header("Location: ./");
        
        //    }
        //    else {
        //     header("Location: ./profile");

        //    }
            echo "<script>history.back()</script>";

        } else {
            echo "comment post problem";

        }
    
    } else {
        include_once("404.php");
    }


 } else {
    include_once("404.php");
 }