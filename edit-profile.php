
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
}


?>
<!-- '''''''''''''''''''''''''''''''''''edit profile page''''''''''''''''''''''''''''''''''''' -->

<!-- page header -->
<?php getHeader(); ?>

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
                    <form method="post">
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
                                    <input type="file" id="file" />
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
                                <input type="text" id="name" value="<?php echo $_SESSION['name'] ?>" />
                            </div>
                        </div>
                        <!-- single field end -->
                        <!-- single field start -->
                        <div class="edit-field">
                           <div class="field">
                                <label for="name">Username:</label>
                            </div>
                            <div class="value">
                                <input type="text" id="name" value="<?php echo $_SESSION['username'] ?>" />
                            </div>
                        </div>
                        <!-- single field end -->
                         <!-- single field start -->
                         <div class="edit-field">
                           <div class="field">
                                <label for="name">Email: </label>
                            </div>
                            <div class="value">
                                <input type="text" id="name" readonly value="<?php echo $_SESSION['email'] ?>" />
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
