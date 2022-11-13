    
    <?php  
    
    $messangerPattern = "/messanger/i";
    $indexPattern = "/index/i";
    $profilePattern = "/profile/i";
    $messanger = preg_match_all($messangerPattern, $_SERVER['PHP_SELF']);
    $index = preg_match_all($indexPattern, $_SERVER['PHP_SELF']);
    $profile = preg_match_all($profilePattern, $_SERVER['PHP_SELF']);
    
    ?>
<!-- 
....................................................................        
    side nav menu 
....................................................................
-->
    <div class="col-md-2 side-nav">
            <div class="side-nav-box">
                <!-- brand name -->
                <div class="brand-name">
                    <h1>Popcorn</h1>
                </div>

                <ul class="list-group list-group-flush side-nav-box-list ">
                
                    <!----------------------- menu action list ------------------------->
                    <li class="list-group-item nav-item">
                        <a href="./" class="<?php if($index > 0) echo "active" ?>">
                            <i class="fa-solid fa-globe"></i>
                            <span>news feed</span>
                        </a>
                    </li>
                  

                    <li class="list-group-item nav-item">
                        <a href="messanger" class="<?php if($messanger > 0) echo "active" ?>" >
                            <i class="fa-solid fa-paper-plane"></i>
                            <span>messages</span>
                        </a>
                    </li>
                    <!-- user profile -->
                    <li class="list-group-item nav-item">
                        <a href="profile"  class="user-profile <?php if($profile > 0) echo "active" ?>">
                            <div class="avatar">
                            <?php 
                                if($_SESSION['avatar']) {
                                    echo '<img src="'.$_SESSION['avatar'].'" alt="">';
                                } else {
                                    echo ' <img src="./public/images/default-avatar.png" alt="">';
                                }
                            ?>
                            </div>
                            <span>profile</span>

                        </a>
                    </li>

                    <li class="list-group-item nav-item">
                       
                        <a href="logout.php?r=<?php echo $_SESSION['r'] ?>">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span>logout</span>
                        </a>
                    </li>
                
                </ul>
                

            </div>
    </div>