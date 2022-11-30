<?php

// include_once("./functions/utils.php");
// include_once("./models/User.php");

?>
<!-- right nav -->
<div class="col-md-4 right-content">
    <div class="right-content-box">
        <div class="profile-link">
            <a href="#"  class="user-profile">
                <div class="avatar">
                    <?php 
                        if($_SESSION['avatar']) {
                            echo '<img src="'.$_SESSION['avatar'].'" alt="">';
                        } else {
                            echo ' <img src="./public/images/default-avatar.png" alt="">';
                        }
                    ?>
                </div>
                <div class="info">
                    <span class="username"><?php
                        echo $_SESSION['name']
                    ?></span>
                    <!-- <span class="designation">student</span> -->
                </div>
            </a>
        </div>
        <ul class="list-group right-nav">
            <li class="list-group-item header disabled" aria-disabled="true">
                <i class="fa-solid fa-user-group"></i>
                <span>All member</span>
            </li>
            <!-- there will be members show here dynamically -->
            <?php
                $all_members = $user->select();
               
            foreach($all_members as $members) {
                if($members['id'] !== $_SESSION['id']) {
                $query = "WHERE sender_id=".$members['id']." and reciver_id=".$_SESSION['id'];
                $ms = $message->findAllByCondition($query);
            ?>
            <!-- single members -->
            <li class="list-group-item right-nav-item">
                <?php 
                 if(count($ms) > 0) {
                    echo '<a href="./messanger.php?s='.$members['id'].'">';
                 } else {
                    echo '<a href="./messanger.php?ns='.$members['id'].'&s='.$members['id'].'">';

                 }
                ?>
                
                    <div class="profile-container">

                        <div class="avatar">
                            <?php
                             if($members['avatar']) {
                                echo '<img src="'.$members['avatar'].'" alt="">';
                            } else {
                                echo ' <img src="./public/images/default-avatar.png" alt="">';
                            }
                            ?>
                        </div>
                    </div>

                    <div class="msg-preview">
                        <span class="name">
                            <?php
                            echo $members['name']
                            ?>
                        </span>
                        <!-- <span class="msg">
                            Lorem ipsum dolor....
                        </span> -->
                       
                    </div>
                </a>
            </li>
            <?php }  } ?>
           <!-- /\/\/\/\/\ -->
        </ul>
    </div>
</div>