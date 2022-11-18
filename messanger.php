
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
                            if(isset($_GET['ns'])) {
                                $ns_u = $user->find("id=".trim($_GET['ns']));
                                if(count($ns_u) > 0) {
                            ?>
                                <!-- single user msg -->
                                <li class="list-group-item <?php if(isset($_GET['s'])) echo "current"?>">
                                    <a href="./messanger?s=<?php echo $ns_u[0]['id'] ?>">
                                        <div class="avatar">
                                        <?php 
                                    if($ns_u[0]['avatar']) {
                                        echo '<img src="'.$ns_u[0]['avatar'].'" alt="">';
                                    } else {
                                        echo ' <img src="./public/images/default-avatar.png" alt="">';
                                    }
                                        ?>
                                        </div>
                                        <div class="msg-preview">
                                            <span class="name">
                                               <?php echo  $ns_u[0]['name'] ?>
                                            </span>
                                           
                                        </div>
                                    </a>
                                </li>
                            <?php
                                } else {
                                    
                                    header("Location: ./404.php");
                                }
                            }

                            ?>
                        <?php
                            $query = "WHERE reciver_id=".$_SESSION['id']." OR sender_id=".$_SESSION['id'];
                            $rev_messages = $message->findAllByCondition($query);
                            $pushed = Array();
                            foreach($rev_messages as $u) {
                                $srch = array_search($u['sender_id'], $pushed);
                                
                                if($srch !== (int)$srch && $u['sender_id'] !== $_SESSION['id']) {
                                    array_push($pushed, $u['sender_id']);
                                }
                                $rch = array_search($u['reciver_id'], $pushed);
                                if($rch !== (int)$rch && $u['reciver_id'] !== $_SESSION['id']) {
                                    array_push($pushed, $u['reciver_id']);
                                }
                               
                            }
                           
                            foreach($pushed as $m) {
                                
                                $m_user = $user->find("id=".$m);
                                $cond = "WHERE sender_id=".$m." AND reciver_id=".$_SESSION['id'];
                            
                                $m_message = $message->findAllByCondition($cond);
                                
                                $m_last = array_pop($m_message);
                                
                        ?>
                                <!-- single user msg -->
                                <li class="list-group-item <?php if(isset($_GET['s']) && $_GET['s'] ==$m) echo "current"?>">
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
                                                if(isset($m_last['message_content'])) {

                                                    echo $m_last['message_content'];
                                                } 
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
                            $query = "WHERE sender_id=".$sender[0]['id']." AND reciver_id=".$_SESSION['id']." OR "."sender_id=".$_SESSION['id']." AND "."reciver_id=".$sender[0]['id'];
                            $s_r_m = $message->findAllByCondition($query);                
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
                        <div class="messanger-ref-body" id="messages">
                            <div class="messages" id="msg-content">
                                <!-- list of messages will show here -->
                                <?php
                               
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
                                <div class="message send-message" >
                                    <div class="message-content">
                                        <?php echo $ms['message_content'] ?>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php  } ?>
                            </div>
                            <!-- send message form -->
                            <form method="post" id="msg-form" class="message-send-form" autocomplete="off">
                                <input type="hidden" name="sender" value="<?php echo $_SESSION['id']; ?>" />
                                <input type="hidden" name="reciver" value="<?php echo $_GET['s']; ?>" />
                                <input name="msg" placeholder="Write message..." />
                                <button type="submit"><i class="fa-solid fa-paper-plane"></i></button>
                            </form>
                            <!-- message send and recive via a ajax -->
                            <script>
                                let messageBox = document.getElementById('messages');
                                const form = document.getElementById('msg-form');
                                const sender_id = <?php echo $_GET['s']; ?>;
                                const reciver_id = <?php echo $_SESSION['id']; ?>;
                                const all_msg = JSON.stringify(<?php echo json_encode($s_r_m) ?>);
                                setInterval(() => {
                                    let xmlhttp = new XMLHttpRequest();

                                    let data = "msg="+all_msg;
                                    // console.log(data);
                                    xmlhttp.open("POST", "./get-message.php?sender="+sender_id, true);
                                    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                                    xmlhttp.onload = () => {
                                        let res = xmlhttp.responseText;
                                        if(res === "not same") {
                                            location.reload();
                                        }
                                    };
                                    xmlhttp.send(data);
                                }, 500);
                                
                                // sender new message
                                form.addEventListener('submit', (e) => {
                                    e.preventDefault();
                                    const msg = e.target.msg.value;
                                    const sender = e.target.sender.value;
                                    const reciver = e.target.reciver.value;
                                    const object = "sender="+sender+"&reciver="+reciver+"&msg="+msg;
                                    
                                   
                                    let xmlhttp = new XMLHttpRequest();

                                  
                                    xmlhttp.open("POST", "send-message.php", true);

                                    xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                    
                                    xmlhttp.onload = () => {
                                        // console.log(xmlhttp.responseText);
                                        // location.reload();
                                    };
                                    xmlhttp.send(object);
                                    
                                    // clear msg field
                                    e.target.msg.value = "";
                                })
                            </script>
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
