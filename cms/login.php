<?php
    session_start();
    require_once('connect.php');
    
        if(isset($_POST['login']))
        {
            if(empty($_POST['username']) || empty($_POST['password']) )
            {
                header("location:logindesign.php?empty");
                exit();
            }
            else
            {
                $Username = mysqli_real_escape_string($con,$_POST['username']);
                $Password = mysqli_real_escape_string($con,$_POST['password']);
    
                $sql = " SELECT * FROM users WHERE username = '$Username' AND password = '$Password' ";
                $result = mysqli_query($con,$sql);
                if (mysqli_num_rows($result) == 1) 
                {
                    
                    if($Password==false)
                    {
                        header("location:../index.php?P_Invalid");
                        exit();
                    
                        
                    
                    }
                    elseif($Password==true)
                    {
                        // $_SESSION['U_D']=$row['id'];
                        // $_SESSION['Username']=$row['username'];
                        // $_SESSION['Password']=$row['password'];
     
                        header("location:admindash.php?Well");
                        exit();
                        
     
                    }
     
                }
                else
                {
                    header("location:logindesign.php?U_Invalid");
                    exit();
                }
                
        }
    }
            
    
?>