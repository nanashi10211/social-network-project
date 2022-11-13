

<!-- create post modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="post" action="create-post.php" enctype="multipart/form-data">
                <!-- create post model content -->
                <div class="modal-content create-post-model">
                    <!-- create post header -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Create Post </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>
                    <!-- creat post header end -->
                    <!-- create post body start -->
                    <div class="modal-body">
                        
                            <div class="mb-3">
                                <input type="text" required class="form-control" name="post_title" id="title" placeholder="Post Title">
                            </div>
                        
                            <div class="mb-3">
                                <textarea class="form-control" required name="post_text" placeholder="Post content" rows="5"></textarea>
                            </div>

                            <div class="mb-3">
                            
                                <div class="post-file-input-box">
                                    <!-- <h4>add media file for post</h4> -->
                            
                                    <label for="post_file"> 
                                        <i class="fa-solid fa-camera"></i>
                                        add image
                                    </label>
                                    <input type="file" name="post_image" id="post_file" onchange="onfileChange()" />
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