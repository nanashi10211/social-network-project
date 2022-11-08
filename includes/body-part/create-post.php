<!-- create post form box-->
<div class="create-post">
    <!-- create post box -->
    <div class="content-box">
        <div class="create-post-box">
                <div class="avatar">
                    <img src="./public/images/default-avatar.png" alt=""  />
                </div>
                <input id="create-post" readonly  placeholder="create post" data-bs-toggle="modal" data-bs-target="#staticBackdrop" />
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
                                                    add media file
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
                                    <button type="submit" class="cmn-btn create-btn">Create</button>
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