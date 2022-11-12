<?php
    ini_set('display_errors', '1');
    error_reporting(E_ALL);
   
    include_once("./functions/views.php");
    
    include_once("./functions/utils.php");
    // redirect to register page if user not login
    indexRedirect();

   
?>
<!-- '''''''''''''''''''''''''''''''''''profile page''''''''''''''''''''''''''''''''''''' -->

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
            <div class="mid-content-box profile-content">
                <!-- profile box -->
                <div class="profile-info">
                    <div class="profile-image">
                        <div class="avatar">
                            <img src="./public/images/default-avatar.png" alt="">
                        </div>
                    </div>
                    <div class="profile-details">
                        <h3>Username <a href="edit-profile.php?r=somerandom_text&id=user_id">Edit profile</a> </h3>
                        <span class="post-count">0 posts</span>

                        <!-- create post form box-->
                        <div class="create-post">
                            <!-- create post box -->
                            <div class="content-box">
                                <div class="create-post-box">
                                        <button id="create-post" data-bs-toggle="modal" data-bs-target="#staticBackdrop" >
                                            create post
                                        </button>
                                        <!-- create post model -->
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <form method="post" action="create-post.php">
                                                    <!-- create post model content -->
                                                    <div class="modal-content create-post-model">
                                                        <!-- create post header -->
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Create Post</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal">
                                                                <i class="fa-solid fa-xmark"></i>
                                                            </button>
                                                        </div>
                                                        <!-- creat post header end -->
                                                        <!-- create post body start -->
                                                        <div class="modal-body">
                                                                <div class="mb-3">
                                                                    <input type="text" class="form-control" id="title" placeholder="Post Title">
                                                                </div>
                                                            
                                                                <div class="mb-3">
                                                                    <textarea class="form-control" placeholder="Post content" rows="5"></textarea>
                                                                </div>

                                                                <div class="mb-3">
                                                                
                                                                    <div class="post-file-input-box">
                                                                        <!-- <h4>add media file for post</h4> -->
                                                                
                                                                        <label for="post_file"> 
                                                                            <i class="fa-solid fa-camera"></i>
                                                                            add image
                                                                        </label>
                                                                        <input type="file" name="file" id="post_file" onchange="onfileChange()" />
                                                                    </div>
                                                                    <img src="" alt="" id="post_img" />
                                                                    <script>
                                                                        function onfileChange() {
                                                                            var file = document.getElementById('post_file').files[0];
                                                                            var fl = new FileReader();
                                                                            fl.readAsDataURL(file);
                                                                            fl.onload = function(e) {
                                                                                var img = document.getElementById('post_img')
                                                                                img.src = this.result;
                                                                                img.style.display = "block";
                                                                            }
                                                                        }
                                                                    </script>
                                                                </div>
                                                        </div>
                                                        <!-- create post body end -->
                                                        <!-- create post model action -->
                                                        <div class="modal-footer">
                                                            <button type="button" class="cmn-btn cancel-btn" data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="cmn-btn create-btn">Post</button>
                                                        </div>
                                                    </div>
                                                    <!-- create post content end -->
                                                </form>
                                            </div>
                                        </div>
                                    <!-- create post model end -->   
                                </div>
                                <!-- create post box end -->
                            </div>
                            <!-- create post form box end -->
                        </div>
                     <!-- create post box end -->
                    </div>
                </div>
               <!-- create post form system -->
            <!-- all post that belongs to current user -->
            <div class="current-user-post-only">

                <?php getRenderAllPosts();  ?>
            </div>
         
               
              
        <!-- main box container end -->
            </div>
        </div>

      
    </div>
    <!-- content row end -->
</div>


<!-- page footer -->
<?php getFooter(); ?>
