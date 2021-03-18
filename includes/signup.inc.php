<?php
#Check if  user pressing submit button
if (isset($_POST['signup-submit'])) {
	require 'dbh.inc.php';

	$username = $_POST['uid'];
	$email= $_POST['mail'];
	$password = $_POST['pwd'];
	$passwordRepeat = $_POST['pwd-repeat'];



#ERROR HANDLERS!
	if (empty($username)||empty($email)||empty($password)||empty($passwordRepeat))
	{
		header("Location: ../signup.php?error=emptyfields&uid=".$username."&mail=".$email);
		exit();
	}
	elseif(!filter_var($email, FILTER_VALIDATE_EMAIL) &&  !preg_match("/^[a-zA0-9]*$/", $username))
	{
		header("Location: ../signup.php?error=invalidmail&uid");
		exit();
	}
	elseif(!filter_var($email, FILTER_VALIDATE_EMAIL))
	{
		header("Location: ../signup.php?error=invalidmail&uid=".$username);
		exit();
	}
		elseif(!preg_match("/^[a-zA0-9]*$/", $username))
	{
		header("Location: ../signup.php?error=invaliduidl&mail=".$email);
		exit();
	}
	elseif ($password !== $passwordRepeat) 
	{
		header("Location: ../signup.php?error=passwordcheck&mail=".$email)."&uid=".$uid;
		exit();
	}
	else 
	{
		$sql = "SELECT user_name FROM users WHERE user_name=?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt,$sql)) 
		{
			header("Location: ../signup.php?error=SQLerrorCODE501");
			exit();
		}
		else
		{
			mysqli_stmt_bind_param($stmt,"s",$username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if ($resultCheck > 0) 
			{
				header("Location: ../signup.php?error=UserTaken&mail=".$email);
				exit();
			}
			else
			{
				$sql = "INSERT INTO users (user_name,emailuser,pwdUser) VALUES (?, ?, ?)";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt,$sql))
				{
					header("Location: ../signup.php?error=SQLerror");
					exit();
				}
				else
				{
					$hashedPwd = password_hash($password, PASSWORD_DEFAULT);	
					mysqli_stmt_bind_param($stmt,"sss",$username,$email,$hashedPwd);
					mysqli_stmt_execute($stmt);
					header("Location: ../signup.php?signup=success");
					exit();
					
				}
			}

		}
	

	}
	
	mysqli_stmt_close($stmt);
	mysqli_close($conn);

 }else
 {
 	header("Location: ../signup.php");
 	exit();
 }









#mysqli_stmt_close($stmt);
#mysqli_close($conn);

#}
#else{
#		header("Location: ../signup.php");
#		exit();
#		}
