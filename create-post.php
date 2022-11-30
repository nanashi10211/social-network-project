<?php 
// create post php
include_once("./functions/utils.php");

$msg = "";

if($_SERVER['REQUEST_METHOD'] == "POST") {
    $post_title = '';
    $post_text = '';
    if(isset($_POST['post_title'])) {
        $post_title = trim($_POST['post_title']);
    }
    if(isset($_POST['post_text'])) {
        $post_text = trim($_POST['post_text']);
    }

    // upload file to particuler location
    if(isset($_FILES['post_image'])) {
        $target_dir = "public/images/";
        $file_name = date("Ymdhis") . basename($_FILES['post_image']['name']);
        $file_path = $target_dir . $file_name;
        echo "file path :- ".$file_path."<br>";
        $uploadStatus = 1;
        $file_ext = strtolower(pathinfo($file_path,PATHINFO_EXTENSION));


        // check actual image
        $check = getimagesize($_FILES['post_image']['tmp_name']);
        if($check !== false) {
            $msg = "File is an image -" . $check['mime'] . " .<br>";
            $uploadStatus = 1;
        } else {
            $msg = "File is not an actual image <br>";
            $uploadStatus = 0;
        }

        // verify file image type
        if(file_exists($file_path)) {
            $msg = "sorry, file already exists <br>";
            $uploadStatus = 0;
        }
        // check file size
        if($_FILES['post_image']['size'] > 1000000) {
            $msg = "file is too long <br>";
            $uploadStatus = 0;
        }
        // limit file type
        if($file_ext != "jpg" && $file_ext != "png" && $file_ext != "jpeg" && $file_ext['gif']) {
            $msg = "sorry,only jpg, png, jpeg, gif file allowed file ext: $file_ext<br>";
            $uploadStatus = 0;
        }

        // check file upload status
        if($uploadStatus === 0) {
            $msg = "Sorry, file upload faild <br>";
        } else {
            // try to upload file 
            if(move_uploaded_file($_FILES['post_image']['tmp_name'], $file_path)) {
               // store the post to database
               $res = $post->insert([
                    "user_id" => $_SESSION['id'],
                    "post_title" => $post_title,
                    "post_text" => $post_text,
                    "post_image" => $file_path,
                    "post_reacts" => json_encode(Array())
               ]);
               if($res) {
                    
                    $indexPattern = "/index/i";
                    $profilePattern = "/profile/i";
                
                    $index = preg_match_all($indexPattern, $_GET['r']);
                    $profile = preg_match_all($profilePattern, $_GET['r']);

                   
                    echo "<script>";
                    echo "history.back()";
                    echo "</script>";
                  
               } else {
                $msg = "error to create post";
               }

            } else {
                echo "Sorry, there was an error uploading file <br>";
            }
        }
        
    }

} 


?>

<html>
    <body>
        <div style="display: flex; align-item: center;justify-content: center; height: 100vh">
        <?php
            echo $msg;
        ?>
        </div>
        
    </body>
</html>



