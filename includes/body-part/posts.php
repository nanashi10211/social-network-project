<?php


function new_post($post, $user, $comment) {

?>

<!-- sigle post -->
<div class="post">
    <div class="content-box">
        <!-- in title show post owner image and post title and post time -->
        <div class="post-title">
            <a href="#" class="avatar">
                <?php 
                 $post_user = $user->find("id=".$post['user_id']);
                 if($post_user[0]['avatar']) {
                    echo '<img src="'.$_SESSION['avatar'].'" alt="">';
                } else {
                    echo ' <img src="./public/images/default-avatar.png" alt="">';
                }
                
                ?>
            </a>
            <span class="name">
                <?php
                   
                    echo $post_user[0]['name'];
                  
                ?>
            </span>
           
        </div>
        <!-- in post image will show post image ,if any -->
        <?php if(isset($post['post_image'])) { ?>
        <div class="post-image">
            <a href="<?php echo $post['post_image'] ?>" target="_blank">
              <img src="<?php echo $post['post_image'] ?>" alt="" />
            </a>
        </div>
        <?php } ?>
        <!-- show post action -->
        <div class="post-action">
           
                <?php 
                    $post_react = json_decode($post['post_reacts']);
                    $f = array_search((int)$_SESSION['id'], $post_react);
                    if($f === (int)$f) {
                ?>
                    <form method="POST" class="react-action-box" action="like-unlike.php?r=unlike&s=<?php echo $_SERVER['PHP_SELF']; ?>&id=<?php echo $post['id'] ?>">
                    <?php
                       echo '<button type="submit"  class="love react"><i class="fa-solid fa-heart"></i></button>';
                    ?>
                     <span class="react-counter"><?php
                
                            echo count($post_react);
                        ?> likes</span>
                    </form>      
                     <?php } else { ?>
                        
                        <form method="POST" class="react-action-box" action="like-unlike.php?r=like&s=<?php echo $_SERVER['PHP_SELF']; ?>&id=<?php echo $post['id'] ?>">
                     <?php
                        echo '<button type="submit" class="love"><i class="fa-regular fa-heart"></i></button>';
                   
                        ?>
                         <span class="react-counter"><?php
                            echo count($post_react);
                            ?> likes</span>
                        </form>   
                  <?php  }  ?>
                
                  
        </div>

        <!-- show post text -->
        <div class="post-text">
                <?php
                echo $post['post_text'];
                ?>
                <span class="comment-show" onclick="document.querySelector('.comment-show').style.display = 'none'" data-bs-toggle="collapse" href="<?php echo "#box".$post['id'] ?>" role="button" aria-expanded="false" aria-controls="<?php echo $post['id'] ?>" >
                <?php
                    $all_comments = $comment->find('post_id='.$post['id']);
                    echo count($all_comments);
                ?> comments</span>
        </div>

        <!-- all comments -->
        <div class="collapse" id="box<?php echo $post['id'] ?>">
            <div class="card card-body comment-list">
               <!-- all comment should load here -->
                <?php
                foreach($all_comments as $cmnt) {
                    $cmnt_user = $user->find("id=".$cmnt['user_id']);
                ?>
                  <!-- single comment -->
                <div class="comment">
                        <!-- comment user avatar -->
                        <a href="profile.php?id=<?php echo $cmnt['user_id'] ?>" class="profile-link">
                            <div class="avatar">
                                <img src="./public/images/default-avatar.png" alt=""/>
                            </div>
                            <span>
                                <?php echo $cmnt_user[0]['name'] ?>
                            </span>
                        </a>
                        <!-- comment text -->
                        <div class="comment-text">
                            <?php echo $cmnt['comment_text'] ?>
                        </div>
                </div>
                <?php
                } 
                ?>

            </div>
        </div>
        <!-- comment box -->
        <div class="comment-box">
            <form id="cmtbox-<?php echo $post['id'] ?>">
                <textarea autocomplete="off" name="comment" id="cmt-<?php echo $post['id'] ?>"   placeholder="Add a comment...." rows="1"  ></textarea>
                <button type="submit" >Post</button>
            </form>
            <script>
            var form_<?php echo $post['id'] ?> = document.getElementById('cmtbox-<?php echo $post['id'] ?>');

            form_<?php echo $post['id'] ?>.addEventListener("submit",(e) => {
                e.preventDefault();
                const object = "comment="+e.target.comment.value;
                
                console.log(object);
                
                                
                let xmlhttp = new XMLHttpRequest();

                
                xmlhttp.open("POST", "./post-comment.php?id=<?php echo $post['id']; ?>", true);

                xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                
                xmlhttp.onload = () => {
                    // console.log(xmlhttp.responseText);
                    location.reload();
                };
                xmlhttp.send(object);
                // clear msg field
                e.target.comment.value = "";
            })


                

            </script>
        </div>
       
 
      
    </div>
</div>

<?php } ?>