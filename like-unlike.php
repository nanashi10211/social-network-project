<?php

// create post php
include_once("./functions/utils.php");

// redirec
$indexPattern = "/index/i";
$profilePattern = "/profile/i";

$index = preg_match_all($indexPattern, $_GET['s']);
$profile = preg_match_all($profilePattern, $_GET['s']);

// like
if($_SERVER['REQUEST_METHOD'] == "POST") {

    $post_id = trim($_GET['id']);
    $react = trim($_GET['r']);

    $r_post = $post->find("id=$post_id");
    $rp = null;
    if($react == "unlike") {
      
        $post_react = json_decode($r_post[0]['post_reacts']);
        print_r($post_react);
        $new_react = Array();
        foreach($post_react as $r) {
            if($r != $_SESSION['id']) {
               
                array_push($new_react, (int)$r);
            }
        }
        print_r($new_react);
        $rp = $new_react;
    } else {
        
        $post_react = json_decode($r_post[0]['post_reacts']);
        print_r($post_react);
        
        array_push($post_react, (int)$_SESSION['id']);
        print_r($post_react);
        $rp = $post_react;
    }

    $result = $post->updateById((int)$post_id, [
        "post_reacts" => json_encode($rp)
    ]);
    if($result) {
   
        echo "<script>history.back()</script>";
    } else {
        include_once("404.php");
    }

 } else {
    include_once("404.php");
 }
