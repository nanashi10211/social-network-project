<!-- '''''''''''''''''''''''''''''''''''register page''''''''''''''''''''''''''''''''''''' -->
<?php
    include_once("./functions/utils.php");
    // redirect if login
    loginRegisterRedirect();

    // get verify module
    getVerifyInput();
?>

<?php 
   

    // error object
    $errors = Array();
    $success = "";
    // user empty field
    $name = "";
    $username = "";
    $email = "";
    $password = "";
    $conPassword = "";

    // register user here
    if(isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == "POST") {
        if(isset($_POST['name'])) {
            $name = normalise_input($_POST['name']);
        }
        // verify unique username
        if(isset($_POST['username'])) {
            // find requested username
            $u = $user->find("username='".$_POST['username']."'");
            if(count($u) > 0) {
                $errors['username-exist-error'] = "Username already exists";
                $username = normalise_input($_POST['username']);
            } else {
                $username = normalise_input($_POST['username']);
            }

        }
        // verify presidency email
        if(isset($_POST['email'])) {
                $email = normalise_input($_POST['email']);
                // find requested username
                $u = $user->find("email='".$email."'");
                if(count($u) > 0) {
                    $errors['email-exist-error'] = "Email already exists";
                   
                } else {
                    if(!verify_email($email)) {
                        $errors['email-exist-error'] = "Only presidency email allowed!";
                    }
                    
                }
           
        }
        if(isset($_POST['password'])) {
            $password = normalise_input($_POST['password']);
        }
        if(isset($_POST['confirm-password'])) {
            $conPassword = normalise_input($_POST['confirm-password']);
        }

        // verify confirm password
        if($password !== $conPassword) {
            $errors['password-not-match-error'] = "Password dose not match";
        } 
        if(count($errors) <= 0) {
           
            // register user
            
            $pwd = hashed_password($password);
            $res = $user->insert([
                "name" => $name,
                "username" => $username,
                "email" => $email,
                "password" => $pwd
            ]);
            // if user created
            if($res) {
                // clear variable
                $name = "";
                $username = "";
                $email = "";
                $success = "User register successfully";
            }

                                
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
            <div class="mid-content-box">
             
             
                <div class="form-page-container">
                    <!-- side content box -->
                    <div class="side-content-box">
                        <!-- <img src="./public/images/start.jpg" alt="image"> -->
                        <h1>Welcome to <br><span>POPCORN</span></h1>
                        <p>Login <a href="login">here</a>  if you already have an account</p>
                    </div>
                       <!-- register form -->
                   
                    <form action="register.php" method="post">
                        <h1 class="form-header">Sigin-up</h1>
                        <?php if(strlen($success) > 0)  { ?>
                            <div class="alert alert-success" role="alert">
                            User registered succesfully
                            Login <a href="./login">here</a>
                            <br>
                            </div>
                        <?php }  ?>

                        <!-- single field -->
                        <div class="form-field">
                            <label class="label"  for="name">Name:</label>
                            <div class="input-box">
                                <input type="text" value="<?php echo $name; ?>" required name="name" id="name">
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
                                <input type="text"  value="<?php echo $username; ?>" required name="username" id="username"
                                class="<?php if(isset($errors['username-exist-error'])) echo "input-error" ?>"
                                >

                                <?php if(!isset($errors['username-exist-error'])) {

                                    echo " <p class='help-text'>
                                    create unique username, username only contain alphabet
                                    </p>";

                                }else {
                                    echo " <p class='help-text error'>";
                                    echo $errors['username-exist-error'];
                                    echo "</p>";
                                }
                                
                                ?>
                               

                            </div>
    
                        </div>
                        <!-- single field end -->
                         <!-- single field -->
                         <div class="form-field">
                            <label class="label"  for="email">Email:</label>
                            <div class="input-box">
                                <input type="email"  value="<?php echo $email; ?>" required name="email" id="email"
                                class="<?php if(isset($errors['email-exist-error'])) echo "input-error" ?>"
                                >
                                <?php
                                    if(!isset($errors['email-exist-error'])) {
                                        echo '<p class="help-text">
                                        Enter your presidency E-Mail (other email dose not work here)
                                        </p>';
                                    } else {
                                        echo '<p class="help-text error">';
                                        echo $errors['email-exist-error'];
                                        
                                        echo '</p>';
                                    }
                                
                                ?>
                                
                            </div>

                        </div>
                        <!-- single field end -->
                         <!-- single field -->
                         <div class="form-field">
                            <label class="label"  for="password">Password:</label>
                            <div class="input-box">
                                <input type="password" required name="password" class="<?php if(isset($errors['password-not-match-error'])) echo "input-error"; ?>" id="password">
                                <?php
                                if(!isset($errors['password-not-match-error'])) {
                                     echo "<p class='help-text'>";
                                     echo " Password at least 8 character long and must contain 1 number, 1 uppercase, 1 lowercase & 1 symbolic character";
                                     echo " </p>";
                                } else {
                                    echo "<p class='help-text error'>";
                                    echo $errors['password-not-match-error'];
                                    echo " </p>";
                                }
                                ?>
                                
                               
                            </div>
                        </div>
                        <!-- single field end -->
                         <!-- single field -->
                         <div class="form-field">
                            <label class="label"  for="confirm-password">confirm-password:</label>
                            <div class="input-box">
                                <input type="password" required name="confirm-password" class="<?php if(isset($errors['password-not-match-error'])) echo "input-error"; ?>" id="confirm-password">

                                <?php
                                if(!isset($errors['password-not-match-error'])) {
                                     echo "<p class='help-text'>";
                                     echo " Confirm possword must match with password";
                                     echo " </p>";
                                } else {
                                    echo "<p class='help-text error'>";
                                    echo $errors['password-not-match-error'];
                                    echo " </p>";
                                }
                                ?>
                               
                            </div>

                        </div>
                        <!-- single field end -->
                         <!-- single field -->
                         <div class="form-field">
                            <div class="label">
                               
                            </div>
                            <!-- placeholder -->
                            <div class="input-box">
                                <input class="form-btn" name="submit" value="register" type="submit" />
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
