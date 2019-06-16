        <!DOCTYPE html>
   <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <title>Registeration</title>
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css" type="text/css"/>
        <link rel="stylesheet" href="../assets/css/style.css" type="text/css"/>
    </head>
    <body >

    <div class="container">

        <div id="login-form">
            

                <div class="col-md-12 m-auto">

                    <div class="form-group card-title  text-white">
                        <h2 class="text-center py-2">Signup Form</h2>
                    </div>

                    <!--Display Empty Fiels-->
                    <?php
                        if(isset($_GET['empty']))
                        {
                            $Message=$_GET['empty'];
                            $Message="Please Fill in the Blanks";
                     ?>

                            <div class="alert alert-danger text-center"> <?php echo $Message?></div>
                    <?php
                        }
                    ?>

                    <!--Invalid Character-->
                    <?php 
                        
                        if(isset($_GET['Invalid']))
                        {
                            $Message=$_GET['Invalid'];
                            $Message=" Invalid Characters ";
                    ?>
                         <div class="alert alert-danger text-center"><?php echo $Message?></div>   
                    <?php                            
                        }
                    
                    ?>

                    <!--Invalid Email-->
                    <?php 
                        
                        if(isset($_GET['VEmail']))
                        {
                            $Message=$_GET['VEmail'];
                            $Message=" Invalid Email ";
                    ?>
                         <div class="alert alert-danger text-center"><?php echo $Message?></div>   
                    <?php                            
                        }
                    
                    ?>

                    <!--User Invalid-->
                    <?php 
                        
                        if(isset($_GET['User']))
                        {
                            $Message=$_GET['User'];
                            $Message=" User Already Taken ";
                    ?>
                         <div class="alert alert-danger text-center"><?php echo $Message?></div>   
                    <?php                            
                        }
                    
                    ?>


                    <!--User Invalid-->
                    <?php 
                        
                        if(isset($_GET['Email']))
                        {
                            $Message=$_GET['Email'];
                            $Message=" Email Already Taken ";
                    ?>
                         <div class="alert alert-danger text-center"><?php echo $Message?></div>   
                    <?php                            
                        }
                    
                    ?>

    <?php 
                        
                        if(isset($_GET['success']))
                        {
                            $Message=$_GET['success'];
                            $Message="  You Have Successfully Register.Please Login !!! ";
                    ?>
                         <div class="alert alert-success text-center"><?php echo $Message?></div>   
                    <?php                            
                        }
                    
                    ?>



                    <div class="form-group">
                        <hr/>
                    </div>

                   

                    <form action="signup.php" method="POST" autocomplete="off">
                    
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                                    <input type="text
                                    " name="username" class="form-control" placeholder="Enter Username" />
                                </div>
                            </div>
                            

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
                                    <input type="email" name="email" class="form-control" placeholder="Enter Email" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                                    <input type="password" name="password" class="form-control" placeholder="Enter Password"/>
                                </div>
                            </div>

                        

                            <div class="form-group">
                                <button type="submit" class="btn    btn-block btn-primary" name="signup" id="reg">Register</button>
                            </div>

                            <div class="form-group">
                                <hr/>
                            </div>

                            <div class="form-group">
                                <a href="logindesign.php" type="button" class="btn btn-block btn-success" name="btn-login">Login</a>
                            </div>

                        </div>

                   </form>
                </div>
        </div>

    </div>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/tos.js"></script>

    </body>
    </html>

