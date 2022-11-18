
<?php 
include_once("./functions/utils.php");
// show 404 if not login
notLogin404();
?>

<?php
    include_once("./functions/views.php");
   
?>
<!-- '''''''''''''''''''''''''''''''''''messanger page''''''''''''''''''''''''''''''''''''' -->

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
                           <span>
                            <?php
                                echo $_SESSION['name'];
                            ?>
                           </span>
                         
                        </div>
                        <div class="profile-ref-body">
                            <ul class="list-group">
                        <?php
                            $rev_messages = $message->findAllByCondition("WHERE reciver_id=".$_SESSION['id']);
                            $pushed = Array();
                            foreach($rev_messages as $u) {
                                $srch = array_search($u['sender_id'], $pushed);
                                if($srch !== (int)$srch) {
                                    array_push($pushed, $u['sender_id']);
                                }
                            }
                           
                            foreach($pushed as $m) {
                                
                                $m_user = $user->find("id=".$m);
                                $cond = "WHERE sender_id=".$m." AND reciver_id=".$_SESSION['id'];
                            
                                $m_message = $message->findAllByCondition($cond);
                                
                                $m_last = array_pop($m_message);
                                
                        ?>
                                <!-- single user msg -->
                                <li class="list-group-item">
                                    <a href="./messanger?s=<?php echo $m ?>">
                                        <div class="avatar">
                                        <?php 
                                    if($m_user[0]['avatar']) {
                                        echo '<img src="'.$m_user[0]['avatar'].'" alt="">';
                                    } else {
                                        echo ' <img src="./public/images/default-avatar.png" alt="">';
                                    }
                                        ?>
                                        </div>
                                        <div class="msg-preview">
                                            <span class="name">
                                               <?php echo $m_user[0]['name'] ?>
                                            </span>
                                            <span class="msg">
                                                <?php 
                                                echo $m_last['message_content'];
                                                ?>
                                            </span>
                                        </div>
                                    </a>
                                </li>
                            <?php } ?>

                               
                            </ul>   
                        </div>
                    </div>

                  
                    <!-- main messanger body -->
                    <div class="messanger-ref">

                        <?php 
                        if(isset($_GET['s'])) {    
                            $sender = $user->find("id=".$_GET['s']);                    
                        ?>
                        <div class="messanger-header">
                            <div class="avatar">
                                <?php 
                                    if($sender[0]['avatar']) {
                                        echo '<img src="'.$sender[0]['avatar'].'" alt="">';
                                    } else {
                                        echo '<img src="./public/images/default-avatar.png" alt="">';
                                    }
                                ?>
                            </div>
                            <span><?php echo $sender[0]['name'] ?></span>
                        </div>
                        <div class="messanger-ref-body">
                            <div class="messages">
                                <!-- list of messages will show here -->
                                <?php
                                $query = "WHERE sender_id=".$sender[0]['id']." AND reciver_id=".$_SESSION['id']." OR "."sender_id=".$_SESSION['id']." AND "."reciver_id=".$sender[0]['id'];
                                $s_r_m = $message->findAllByCondition($query);
                                foreach($s_r_m as $ms) {
                                ?>
                                <!-- recived message -->
                                <?php 
                               if($ms['sender_id'] == $sender[0]['id'] && $ms['reciver_id'] == $_SESSION['id']) {
                                
                                ?>
                                <div class="message recived-message">
                                    <a href="#">
                                        <div class="avatar">
                                           <?php
                                             if($sender[0]['avatar']) {
                                               echo '<img src="'.$sender[0]['avatar'].'" alt="">';
                                           } else {
                                               echo '<img src="./public/images/default-avatar.png" alt="">';
                                           }
                                           ?>
                                        </div>
                                    </a>
                                    <div class="message-content">
                                        <?php echo $ms['message_content'] ?>
                                    </div>
                                </div> 
                                <?php } else { ?>
                                <!-- send message -->
                                <div class="message send-message">
                                    <div class="message-content">
                                        <?php echo $ms['message_content'] ?>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php  } ?>
                            </div>
                            <!-- send message form -->
                            <form method="post" action="#" class="message-send-form" autocomplete="off">
                                <input  placeholder="Write message..." />
                                <button type="submit"><i class="fa-solid fa-paper-plane"></i></button>
                            </form>
                        </div>
                        <?php  } else { ?>
                            <div style="display: flex;align-items: center;justify-content: center; height: 100%; color: green;font-size: 30px">
                                Select message
                            </div>
                            <?php } ?>
                        <!--  -->
                    </div>
              </div>
            </div>
        </div>

      
    </div>
    <!-- content row end -->
</div>


<!-- page footer -->
<?php getFooter(); ?>
