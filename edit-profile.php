
<?php 
include_once("./functions/utils.php");
// show 404 if not login
notLogin404();
?>

<?php
   
    include_once("./functions/views.php");
   
?>

<?php
// update profile info
if($_SERVER['REQUEST_METHOD'] == "POST") {
   //@TODO update profile info
    $msg = "";
    $name = "";

    if(isset($_POST['name'])) {
        $name = $_POST['name'];
    }
    // upload file to particuler location
    if(isset($_FILES['avatar']) && !empty($_FILES['avatar']['tmp_name'])) {
        $target_dir = "public/images/";
        $file_name = date("Ymdhis") . basename($_FILES['avatar']['name']);
        $file_path = $target_dir . $file_name;
        $uploadStatus = 1;
        $file_ext = strtolower(pathinfo($file_path,PATHINFO_EXTENSION));


        // check actual image
        $check = getimagesize($_FILES['avatar']['tmp_name']);
        if($check !== false) {
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
        if($_FILES['avatar']['size'] > 1000000) {
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
            if(move_uploaded_file($_FILES['avatar']['tmp_name'], $file_path)) {


               // update user profile
               $res = $user->updateById($_SESSION['id'],[
                    "name" => $name,
                    "avatar" => $file_path,
               ]);
               if($res) {
                     // update session variable
                    $_SESSION['name'] = $name;
                    $_SESSION['avatar'] = $file_path;  
                    echo "<script>";
                    echo "alert('Profile has been updated');";
                    echo "</script>";
                   
               } else {
                $msg = "error to create post";
               
               }

            } else {
                $msg = "Sorry, there was an error uploading file <br>";
               
            }
        }
        
    } else {
       
        // update user profile
        $res = $user->updateById($_SESSION['id'],[
            "name" => $name,
        ]);
        if($res) {
                
                // update session variable
                $_SESSION['name'] = $name;
                    
                // show success message
                echo "<script>";
                echo "alert('Profile has been updated');";
                echo "</script>";
               
                
        } else {
            $msg = "error to update post";
            echo $msg;
        }
    }

    if(!empty($msg)) {
        // show error message
        echo "<script>";
        echo "alert('".$msg."');";
        echo "</script>";
    
      
    }
}



?>
<!-- '''''''''''''''''''''''''''''''''''edit profile page''''''''''''''''''''''''''''''''''''' -->

<!-- page header -->
<?php getHeader(); ?>
<!-- set page title -->
<script>
    document.title = "Edit-profile";
</script>
<!-- main body -->
<div class="container-fluid">
    <!-- content row start -->
    <div class="row">
       <!-- side nav -->
        <?php getSiderNav(); ?>
        
        <!-- main content -->
        <div class="offset-3 col-md-8 mid-content">
            <div class="mid-content-box">
                <!-- prifile edit form -->
                <div class="profile-edit-box">
                    <form method="POST" action="./edit-profile.php" enctype="multipart/form-data">
                        <!-- sigle field -->
                        <div class="edit-field">
                            <div class="field">
                                <div class="avatar">
                                    <?php 
                                        if($_SESSION['avatar']) {
                                            echo '<img src="'.$_SESSION['avatar'].'" alt="">';
                                        } else {
                                            echo ' <img src="./public/images/default-avatar.png" alt="">';
                                        }
                                    ?>
                                </div>
                            </div>
                            <div class="value">
                                <span class="uname">
                                    <?php
                                    echo $_SESSION['name'];
                                    ?>
                                </span>
                                <div class="image-change">
                                    <label for="file">Change profile picture</label>
                                    <input type="file"  name="avatar" id="file" />
                                </div>
                            </div>
                        </div>
                        <!-- single field end -->
                        <!-- single field start -->
                        <div class="edit-field">
                           <div class="field">
                                <label for="name">Display_name:</label>
                            </div>
                            <div class="value">
                                <input type="text" name="name" id="name" value="<?php echo $_SESSION['name'] ?>" />
                            </div>
                        </div>
                        <!-- single field end -->
                        <!-- single field start -->
                        <div class="edit-field">
                           <div class="field">
                                <label for="username">Username:</label>
                            </div>
                            <div class="value">
                                <input type="text" readonly id="username" value="<?php echo $_SESSION['username'] ?>" />
                            </div>
                        </div>
                        <!-- single field end -->
                         <!-- single field start -->
                         <div class="edit-field">
                           <div class="field">
                                <label for="email">Email: </label>
                            </div>
                            <div class="value">
                                <input type="text" id="email" readonly value="<?php echo $_SESSION['email'] ?>" />
                            </div>
                        </div>
                        <!-- single field end -->
                        <div class="action-box">
                            <button type="submit">
                                Save
                            </button>
                        </div>
                    </form>
                </div>
            <!-- main content box end -->
            </div>
        </div>

      
    </div>
    <!-- content row end -->
</div>


<!-- page footer -->
<?php getFooter(); ?>
