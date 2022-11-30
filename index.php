<!-- '''''''''''''''''''''''''''''''''''index page''''''''''''''''''''''''''''''''''''' -->

<?php 
include_once("./functions/utils.php");
// redirect to register page if user not login
indexRedirect();
?>

<?php
    include_once("./functions/views.php");
   
?>

<!-- page header -->
<?php getHeader(); ?>
<!-- set page title -->
<script>
    document.title = "Home";
</script>
<!-- main body -->
<div class="container-fluid">
    <!-- content row start -->
    <div class="row">
       <!-- side nav -->
        <?php getSiderNav(); ?>

        <!-- main content -->
        <div class="offset-3 col-md-5 mid-content">
            <div class="mid-content-box">
               <!-- create post form system -->
               <?php getCreatePostForm(); ?>

                <!-- all posts -->
               <?php getPostBox(); ?>

               <?php
               
               // all posts
                $all_post = NULL;
              
                $all_post = $post->select();
                arsort($all_post);
                foreach($all_post as $post) {
                    new_post($post, $user, $comment, "index");
                }
                if($all_post == NULL) {
                    echo "<center style='padding: 50px 0px'>There is no activity in this app!!</center>";
                }
               ?>

            </div>
        </div>

        <!-- right content  start-->
        <?php getRightNav($user, $message); ?>
        <!-- right content end -->
    </div>
    <!-- content row end -->
</div>


<!-- page footer -->
<?php getFooter(); ?>
