<?php
	session_start();
	$path = $_SERVER['DOCUMENT_ROOT'];
    include_once("../cms/class.ManageUsers.php");
	
	$users = new ManageUsers();
	
	if(isset($_POST['register']))
	{
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$email = $_POST['email'];
		$uname = $_POST['uname'];
		$date = date("Y-m-d");
		$time = date("H:i:s");
		
		$check_availability = $users->GetUserInfo($username);
		if($check_availability ==0)
		{
			$register_user = $users->registerUsers($password,$date, $time, $username, $email, $uname);
			if($register_user == 1)
			{
				$make_sessions = $users->GetUserInfo($username);
				foreach($make_sessions as $userSessions)
				{
					$_SESSION['name'] = $userSessions['username'];
					if(isset($_SESSION['name']))
					{
						header("location: ../dashboard/dashboard.php");
					}
				}
			}
		}
		else
		{
			echo $error = "Username Already taken";
		}
		
	}
?>