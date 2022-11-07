<?php
    ini_set('display_errors', '1');
    error_reporting(E_ALL);
    // models
    include_once("./models/User.php");
    include_once("./models/Message.php");
    include_once("./models/Session.php");
    include_once("./functions/views.php");

?>

<!-- page header -->
<?php getHeader(); ?>

<!-- main body -->
<div class="container-fluid">
    <div class="row">
       <!-- side nav -->
        <?php getSiderNav(); ?>

        <!-- main content -->
        <div class="offset-3 col-md-7 mid-content">
            <div class="mid-content-box">
                <!-- create post form -->
                <div class="create-post">

                </div>
            </div>
        </div>

        <!-- right content -->
        <div class="col-md-3 right-content">
            <div class="right-content-box">
              
            </div>
        </div>
    </div>
</div>


<!-- page footer -->
<?php getFooter(); ?>
