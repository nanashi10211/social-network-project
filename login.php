<!-- '''''''''''''''''''''''''''''''''''login page''''''''''''''''''''''''''''''''''''' -->

<?php 
    include_once("./functions/utils.php");
    // redirect if login
    loginRegisterRedirect();
   
?>
<!-- set page title -->
<script>
    document.title = "Login";
</script>
<?php
    // login user var
    $username = "";
    $password = "";
    $error = false;

    // check if form submitted
    if(isset($_POST['submit'])) {
        if(isset($_POST['username'])) {
            $username = $_POST['username'];
        }
        if(isset($_POST['password'])) {
            $password = $_POST['password'];
        }
      
        if(strlen($username) > 0 && strlen($password) > 0) {
            $req_user = $user->find("username='$username' OR email='$username'");
            // print_r($req_user);
            if(count($req_user) < 0) {
                $error = true;
            } else {
                if(verify_password($password, $req_user[0]['password'])) {
                    // @TODO login user session will start here
                    $total_post = $post->find("user_id='".$req_user[0]['id']."'");


                    $_SESSION['is_login'] = true;

                    $_SESSION['name'] = $req_user[0]['name'];
                    $_SESSION['username'] = $req_user[0]['username'];
                    $_SESSION['email'] = $req_user[0]['email'];
                    $_SESSION['avatar'] = $req_user[0]['avatar'];  
                    $_SESSION['r'] = hash('sha256', $req_user['username']);
                    $_SESSION['id'] = $req_user[0]['id'];
                    $_SESSION['posts'] = $total_post;


                    // redirect to news feed
                    header("Location: ./");

                } else {
                    echo "password not match";
                    $error = true;
                }
            }
        } else {
            echo "error  print";
            $error = true;
        }

    } 
    
?>


<?php
    include_once("./functions/views.php");
?>



<!-- page header -->
<?php getHeader(); ?>

<!-- main body -->
<div class="container-fluid">
    <!-- content row start -->
    <div class="row">
     
         <!-- main content -->
         <div class="offset-1 col-md-10 mid-content">
            <div class="mid-content-box ">
             
             
                <div class="form-page-container login-box ">
                    <!-- side content box -->
                    <div class="side-content-box">
                        <!-- <img src="./public/images/start.jpg" alt="image"> -->
                        <h1>Welcome to PU social club<br><span>POPCORN</span></h1>
                        <p>Register <a href="register">here</a>  if you don't have an account</p>
                    </div>
                       <!-- register form -->
                    <form action="login.php" method="post">
                        <h1 class="form-header">Login</h1>
                       <div class="form-field">
                        <div class="input-box">
                            <?php if($error) {
                                echo '<div style="width: 100%; margin-top: 20px" class="alert alert-danger" role="alert">';
                                echo 'Invalid user!! try again....'; 
                                echo '</div>';
                            }?>
                        </div>
                       </div>
                       
                        <!-- single field -->
                        <div class="form-field">
                            <!-- <label class="label"  for="username">username:</label> -->
                            <div class="input-box">
                                <input  type="text" name="username" required id="username" placeholder="Enter your email or username">
                                <p class="help-text">
                                   
                                </p>
                            </div>

                        </div>
                        <!-- single field end -->
                        
                        
                         <!-- single field -->
                         <div class="form-field">
                            <!-- <label class="label"  for="password">Password:</label> -->
                            <div class="input-box">
                                <input  type="password" name="password" required id="password" placeholder="Enter your password">
                                <p class="help-text">
                                   
                                </p>
                            </div>
                        </div>
                       
                        <!-- single field -->
                        <div class="form-field">      
                            <div class="input-box">
                                <input class="form-btn" name="submit" type="submit" value="Login" />
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
