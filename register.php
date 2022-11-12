<?php
    ini_set('display_errors', '1');
    error_reporting(E_ALL);
    // models
    include_once("./models/User.php");
    include_once("./models/Message.php");
    include_once("./models/Session.php");
    include_once("./functions/views.php");

?>
<!-- '''''''''''''''''''''''''''''''''''register page''''''''''''''''''''''''''''''''''''' -->
<!-- page header -->
<?php getHeader(); ?>

<!-- main body -->
<div class="container-fluid">
    <!-- content row start -->
    <div class="row">
     
        <!-- main content -->
        <div class="offset-1 col-md-10 mid-content">
            <div class="mid-content-box">
             
             
                <div class="form-page-container">
                    <!-- side content box -->
                    <div class="side-content-box">
                        <!-- <img src="./public/images/start.jpg" alt="image"> -->
                        <h1>Welcome to <br> <span> POPCORN </span></h1>
                        <p>Login <a href="login">here</a>  if you already have an account</p>
                    </div>
                       <!-- register form -->
                    <form action="#" method="post">
                        <h1 class="form-header">Sigin-up</h1>
                        <!-- single field -->
                        <div class="form-field">
                            <label class="label"  for="name">Name:</label>
                            <div class="input-box">
                                <input type="text" name="name" id="name">
                                <p class="help-text">
                                    Enter a name that will show as a display name
                                </p>
                            </div>

                        </div>
                        <!-- single field end -->
                         <!-- single field -->
                         <div class="form-field">
                            <label class="label"  for="username">Username:</label>
                            <div class="input-box">
                                <input type="text" name="username" id="username">
                                <p class="help-text">
                                    create unique username, username only contain alphabet
                                </p>

                            </div>
    
                        </div>
                        <!-- single field end -->
                         <!-- single field -->
                         <div class="form-field">
                            <label class="label"  for="email">Email:</label>
                            <div class="input-box">
                                <input type="email" name="email" id="email">
                                <p class="help-text">
                                    Enter your presidency E-Mail (other email dose not work here)
                                </p>
                            </div>

                        </div>
                        <!-- single field end -->
                         <!-- single field -->
                         <div class="form-field">
                            <label class="label"  for="password">Password:</label>
                            <div class="input-box">
                                <input type="text" name="password" id="password">
                                <p class="help-text">
                                    Password at least 8 character long and must contain 1 number, 1 uppercase, 1 lowercase & 1 symbolic character
                                </p>
                            </div>
                        </div>
                        <!-- single field end -->
                         <!-- single field -->
                         <div class="form-field">
                            <label class="label"  for="confirm-password">confirm-password:</label>
                            <div class="input-box">
                                <input type="text" name="confirm-password" id="confirm-password">
                                <p class="help-text">
                                  Confirm possword must match with password
                                </p>
                            </div>

                        </div>
                        <!-- single field end -->
                         <!-- single field -->
                         <div class="form-field">
                            <div class="label">
                               
                            </div>
                            <!-- placeholder -->
                            <div class="input-box">
                                <button class="form-btn" type="submit">sign-up</button>
                            </div>

                        </div>
                        <!-- single field end -->
                    </form>
                </div>
            </div>
        </div>

     
    </div>
    <!-- content row end -->
</div>


<!-- page footer -->
<?php getFooter(); ?>
