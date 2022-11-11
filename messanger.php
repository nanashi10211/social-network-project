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
              <!-- messanger box -->
              <div class="messanger-box">


                <!-- messanger ref -->
                    <div class="profile-ref">
                        <div class="messanger-header">
                            username
                        </div>
                        <div class="profile-ref-body">
                            <ul class="list-group">
                                <!-- single user msg -->
                                <li class="list-group-item">
                                    <a href="#">
                                        <div class="avatar">
                                            <img src="./public/images/default-avatar.png" alt="image">
                                        </div>
                                        <div class="msg-preview">
                                            <span class="name">
                                                username
                                            </span>
                                            <span class="msg">
                                                Lorem ipsum....
                                            </span>
                                        </div>
                                    </a>
                                </li>
                                <!-- single user msg -->
                                <li class="list-group-item">
                                    <a href="#">
                                        <div class="avatar">
                                            <img src="./public/images/default-avatar.png" alt="image">
                                        </div>
                                        <div class="msg-preview">
                                            <span class="name">
                                                username
                                            </span>
                                            <span class="msg">
                                                Lorem ipsum....
                                            </span>
                                        </div>
                                    </a>
                                </li>
                               
                            </ul>   
                        </div>
                    </div>


                    <!-- main messanger body -->
                    <div class="messanger-ref">
                        <div class="messanger-header">
                            <div class="avatar">
                                <img src="./public/images/default-avatar.png" alt="img">
                            </div>
                            <span>Username</span>
                        </div>
                        <div class="messanger-ref-body">
                            <div class="messages">
                                <!-- list of messages will show here -->

                                <!-- recived message -->
                                <div class="message recived-message">
                                    <a href="#">
                                        <div class="avatar">
                                            <img src="./public/images/default-avatar.png" alt="">
                                        </div>
                                    </a>
                                    <div class="message-content">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, quisquam!
                                    </div>
                                </div>
                                <!-- send message -->
                                <div class="message send-message">
                                    <div class="message-content">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat, quisquam!
                                    </div>
                                </div>
                            </div>

                            <!-- send message form -->
                            <form method="post" action="#" class="message-send-form" autocomplete="off">
                                <input  placeholder="Write message..." />
                                <button type="submit"><i class="fa-solid fa-paper-plane"></i></button>
                            </form>
                        </div>
                    </div>
              </div>
            </div>
        </div>

      
    </div>
    <!-- content row end -->
</div>


<!-- page footer -->
<?php getFooter(); ?>
