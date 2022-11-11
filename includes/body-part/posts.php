
<!-- sigle post -->
<div class="post">
    <div class="content-box">
        <!-- in title show post owner image and post title and post time -->
        <div class="post-title">
            <a href="#" class="avatar">
                <img src="./public/images/start.jpg" alt="" />
            </a>
            <span class="name">user_name</span>
           
        </div>
        <!-- in post image will show post image ,if any -->
        <div class="post-image">
              <a href="./public/images/start.jpg" target="_blank">  <img src="./public/images/start.jpg" alt="" /> </a>
        </div>
        <!-- show post action -->
        <div class="post-action">
            <div class="react-action-box">
                <span class="love react"><i class="fa-solid fa-heart"></i></span>
                <!-- <span class="love"><i class="fa-regular fa-heart"></i></span> -->
                <span class="react-counter">231243 likes</span>
            </div>         
        </div>

        <!-- show post text -->
        <div class="post-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam quos ad ex, vel assumenda nesciunt aspernatur molestias labore quaerat,

                <span class="comment-show" onclick="document.querySelector('.comment-show').style.display = 'none'" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" >view 123 comments</span>
        </div>

        <!-- all comments -->
        <div class="collapse" id="collapseExample">
            <div class="card card-body comment-list">
               <!-- all comment should load here -->
               <!-- single comment -->
               <div class="comment">
                    <!-- comment user avatar -->
                    <a href="#" class="profile-link">
                        <div class="avatar">
                            <img src="./public/images/default-avatar.png" alt=""/>
                        </div>
                        <span>user name</span>
                    </a>
                    <!-- comment text -->
                    <div class="comment-text">
                        Lorem ipsum dolor sit amet 
                        Lorem ipsum dolor sit amet 
                    </div>
               </div>

                <!-- single comment -->
                <div class="comment">
                    <!-- comment user avatar -->
                    <a href="#" class="profile-link">
                        <div class="avatar">
                            <img src="./public/images/default-avatar.png" alt=""/>
                        </div>
                        <span>user name</span>
                    </a>
                    <!-- comment text -->
                    <div class="comment-text">
                        Lorem ipsum dolor sit amet 
                        Lorem ipsum dolor sit amet 
                    </div>
               </div>



            </div>
        </div>
        <!-- comment box -->
        <div class="comment-box">
            <form method="post">
                <textarea name="comment" placeholder="Add a comment...." rows="1" ></textarea>
                <button type="submit">Post</button>
            </form>
        </div>


      
    </div>
</div>
