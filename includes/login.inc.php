<?php
if (isset($_POST['login-submit'])) {
	require 'dbh.inc.php';  

	$mailuid = $_POST['e-mail'];
	$password = $_POST['pwd'];

	if (empty($mailuid)|| empty($password)) 
	{
		header("Location: ../index.php?error=emptyfields");
		exit();
	}
	else
		{
			$sql = "SELECT * FROM users WHERE user_name=? OR emailuser=?;";
			$stmt = mysqli_stmt_init($conn);
			if (!mysqli_stmt_prepare($stmt, $sql)) 
			{
				header("Location: ../index.php?error=sqlerror");
				exit();
			}
			else{
				#Running the SQL statemnet into the database
				mysqli_stmt_bind_param($stmt,"ss",$mailuid,$mailuid);
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				if ($row = mysqli_fetch_assoc($result)) {
					$pwdCheck = password_verify($password,$row['pwdUser']);
					if ($pwdCheck == false) 
					{
						header("Location: ../index.php?error=wrongpass");
						exit();
					}
					elseif ($pwdCheck == true)
					{
						session_start();
						$_SESSION['userId'] = $row['id'];
						$_SESSION['userName'] = $row['user_name'];
						
						header("Location: ../index.php?login=success");
						exit();
					} 
					else
					{
						header("Location: ../index.php?error=wrongpass");
						exit();	
					}
				}
				else
				{
					header("Location: ../index.php?error=nouser");
					exit();
				}
			}
		}

}
else
 {
 	header("Location: ../index.php");
 	exit();
 }
