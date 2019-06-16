    <!DOCTYPE html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Login</title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css"/>
        <link rel="stylesheet" href="assets/css/style.css" type="text/css"/>
    </head>
    <body >

    <div class="container">
        <div id="login-form">    
            <div class="col-md-12"> 
                    <div class="form-group">
                        <h2 class="text-center py-2">Login Form</h2>
                    </div>

                    <?php                        
                            if(isset($_GET['empty']))
                            {
                                $Message=$_GET['empty'];
                                $Message= " Please Fill in the Blanks";
                    ?>
                            <div class="alert alert-danger text-center"><?php echo $Message ?></div>                            
                    <?php                            
                            }
                        
                    ?>     
     
                    <?php
                        
                            if(isset($_GET['U_Invalid']))
                            {
                                $Message=$_GET['U_Invalid'];
                                $Message= " Wrong username/Password Combination";
                    ?>
                            <div class="alert alert-danger text-center"><?php echo $Message ?></div>                            
                    <?php                            
                            }
                        
                    ?>
     
     
                            <?php
                        
                            if(isset($_GET['P_Invalid']))
                            {
                                $Message=$_GET['P_Invalid'];
                                $Message= " Wrong username/Password Combination";
                        ?>
                            <div class="alert alert-danger text-center"><?php echo $Message ?></div>                            
                        <?php                            
                            }
                        
                        ?>

                    <div class="form-group">
                        <hr/>
                    </div>

                    <form action="login.php" method="post" autocomplete="off">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <input type="text" name="username" class="form-control" placeholder="Username" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                    <input type="password" name="password" class="form-control" placeholder="Password" />
                                </div>
                            </div>

                            <div class="form-group">
                                <hr/>
                            </div>

                            <div class="form-group">
                                <button type="Submit" class="btn btn-block btn-primary" name="login">Login</button>
                            </div>

                            <div class="form-group">
                                <hr/>
                            </div>

                            <div class="form-group">
                                <a href="signupdesign.php" type="button" class="btn btn-block btn-danger"
                                name="btn-login">Register</a>
                            </div>

                        </div>

                     </form>
                 </div>
            </div>
        </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
    </body>
    </html>
    <?php
    /*require('dbconnect.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['username']))
    {
            // removes backslashes
        $Username = stripslashes($_REQUEST['username']);
            //escapes special characters in a string
        $Username = mysqli_real_escape_string($con,$Username); 
        $Email = stripslashes($_REQUEST['email']);
        $Email = mysqli_real_escape_string($con,$Email);
        $Password = stripslashes($_REQUEST['password']);
        $Password = mysqli_real_escape_string($con,$Password);
            $sql = "INSERT into `users` (username, password, email)VALUES ('$Username', '".md5($Password)."', '$Email')";
            $result = mysqli_query($con,$sql);
            if($result)
            {   
                echo "<div class='form'> <h3>You are registered successfully.Login Please!!!</h3> 
                </div>";
            }
    }
    else
    {
        echo("");
    }*/
    ?>