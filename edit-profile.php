<?php
    ini_set('display_errors', '1');
    error_reporting(E_ALL);
   
    include_once("./functions/views.php");
   
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
                    <form action="#" method="post">
                        <!-- sigle field -->
                        <div class="edit-field">
                            <div class="field">
                                <div class="avatar">
                                    <img src="./public/images/default-avatar.png" alt="img"/>
                                </div>
                            </div>
                            <div class="value">
                                <span class="uname">username</span>
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
                                <label for="name">Display name</label>
                            </div>
                            <div class="value">
                                <input type="text" id="name" />
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
