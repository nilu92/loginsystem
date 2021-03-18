<?php
	require "header.php";
?>
<head>
	 <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<main>
	<div class="login-form">
		
			<h1 class="text-center">Signup</h1>
			<form action ="includes/signup.inc.php" method="post">
				<div class="form-group">
				<input class="form-control" type="text" name="uid" placeholder="Username">
				</div>
				<div class="form-group">
				<input class="form-control" type="text" name="mail" placeholder="E-mail">
				<div class="form-group">
				</div>
				<input class="form-control" type="password" name="pwd" placeholder="Password">
				</div>
				<div class="form-group">
				<input class="form-control" type="password" name="pwd-repeat" placeholder="Repeat Password">
				</div>
				<button class="btn btn-primary btn-block" type="submit" name="signup-submit">Signup!</button>
			</form>
	
		</div>
	</div>	
</main>

<?php
 require "footer.php";
?>