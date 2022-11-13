
<!-- right nav -->
<div class="col-md-4 right-content">
    <div class="right-content-box">
        <div class="profile-link">
            <a href="#"  class="user-profile">
                <div class="avatar">
                    <img src="./public/images/default-avatar.png" />
                </div>
                <div class="info">
                    <span class="username"><?php
                        echo $_SESSION['name']
                    ?></span>
                    <span class="designation">student</span>
                </div>
            </a>
        </div>
        <ul class="list-group right-nav">
            <li class="list-group-item header disabled" aria-disabled="true">
                <i class="fa-solid fa-location-arrow"></i>
                <span>my messages</span>
            </li>
            <!-- there will be message show here dynamically -->
            <!-- single message -->
            <li class="list-group-item right-nav-item">
                <a href="#">
                    <div class="profile-container">

                        <div class="avatar">
                            <img src="./public/images/default-avatar.png" alt="image">
                        </div>
                    </div>

                    <div class="msg-preview">
                        <span class="name">username</span>
                        <span class="msg">
                            Lorem ipsum dolor....
                        </span>
                       
                    </div>
                </a>
            </li>

            <!-- single message -->
            <li class="list-group-item right-nav-item">
                <a href="#">
                    <div class="profile-container">

                        <div class="avatar">
                            <img src="./public/images/default-avatar.png" alt="image">
                        </div>
                    </div>

                    <div class="msg-preview">
                        <span class="name">username</span>
                        <span class="msg">
                            Lorem ipsum dolor....
                        </span>
                        
                    </div>
                </a>
            </li>
           
        </ul>
    </div>
</div>