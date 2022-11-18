
<?php 
include_once("./functions/utils.php");
// show 404 if not login
notLogin404();

if(isset($_GET['p'])) {
    // delete the post by id
    $result = $post->delete([
        "id",
        $_GET['p']
    ]);
    if($result) {
        echo "<script>history.back()</script>";
    } else {
        include_once("./404.php");
    }
}

