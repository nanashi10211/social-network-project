

<!-- create post form box-->
<div class="create-post">
    <!-- create post box -->
    <div class="content-box">
        <div class="create-post-box">
                <div class="avatar">
                    <?php 
                        if($_SESSION['avatar']) {
                            echo '<img src="'.$_SESSION['avatar'].'" alt="">';
                        } else {
                            echo ' <img src="./public/images/default-avatar.png" alt="">';
                        }
                    ?>
                </div>
                <input id="create-post" readonly  placeholder="Create Post" data-bs-toggle="modal" data-bs-target="#staticBackdrop" />
                <!-- create post model -->
                <?php
                    // include create post modal
                    include_once("./includes/body-part/create-post-modal.php");
                ?>
            <!-- create post model end -->   
        </div>
        <!-- create post box end -->
    </div>
    <!-- create post form box end -->
</div>
<!-- create post box end -->