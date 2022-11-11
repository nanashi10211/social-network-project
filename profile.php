<?php
    ini_set('display_errors', '1');
    error_reporting(E_ALL);
   
    include_once("./functions/views.php");
   
?>

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
                <!-- profile box -->
                <div class="user-profile">


                </div>
               <!-- create post form system -->
               <?php getCreatePostForm(); ?>
               
              

            </div>
        </div>

      
    </div>
    <!-- content row end -->
</div>


<!-- page footer -->
<?php getFooter(); ?>
