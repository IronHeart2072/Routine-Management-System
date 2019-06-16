     <?php
        require_once("connect.php");
        

            if(isset($_POST['signup']))
            {
                if(empty($_POST['username'])|| empty($_POST['email'])||empty($_POST['password']))
                {
                    header("location:signupdesign.php?empty");
     
                }
                else
                {
                    $Username = mysqli_real_escape_string($con,$_POST['username']);
                    $Email = mysqli_real_escape_string($con,$_POST['email']);
                    $Password = mysqli_real_escape_string($con,$_POST['password']);

                    if(!preg_match("/^[a-zA-Z0-9\-\_\.]*$/",$Username))
                    {
                        header("location:signupdesign.php?Invalid");
                        exit();
                    }
                    else 
                    {
                        if(!filter_var($Email,FILTER_VALIDATE_EMAIL))
                        {
                            header("location:signupdesign.php?VEmail");
                            exit();
                        }
                        else 
                        {
                            $sql = " select * from users where username='".$Username."'";
                            $result = mysqli_query($con,$sql);
     
                            if(mysqli_fetch_assoc($result))
                            {
                                header("location:signupdesign.php?User");
                                exit();
                            }
                            else
                            {
                                $sql = " select * from users where email='".$Email."'";
                                $result = mysqli_query($con,$sql);
     
                                if(mysqli_fetch_assoc($result))
                                {
                                    header("location:signupdesign.php?Email");
                                    exit();
                                }
                                else
                                {
                                    // $Hash = password_hash($Password, PASSWORD_DEFAULT);
                                    $sql = " Insert into users (username,email,Password) values ('$Username', '$Email','$Password')";
                                    $result = mysqli_query($con,$sql);
                                    header("location:signupdesign.php?success");
                                    exit();  
                                }
                            }
                        }
                    }
                }

            }
            else
            {
                header("location:logindesign.php");
     
            }


     ?>
     