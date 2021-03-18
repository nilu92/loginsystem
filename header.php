<?php
	session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	 <link rel="stylesheet" type="text/css" href="css/style.css">
	 <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

</body>
</html>

<head  class="header" >

	<div class="nav">
		
		<li><a class="active" href="index.php">Home</a></li>
		<li><a href="signup.php">signup</a></li>
		
		
    	<?php
    	if (isset($_SESSION['userId'])) 
		{
			echo'
			 <div class="login-container">	
			<form action="includes/logout.inc.php" method="POST">
      				<button class="logout" type="submit" name="logout-submit">Logout</button>
			</form>
			</div>';
		}
		
		else 
		{
		  echo 	'
		   <div class="login-container">
		  <form action="includes/login.inc.php" method="POST">
      			<input type="text" placeholder="E-mail" name="e-mail">
      			<input type="Password" placeholder="Password" name="pwd">
      			<button type="submit" name="login-submit">Login</button>
			</form>
			</div>';
		}
		?>
    	
      		
      		
		
	</div>
</head>