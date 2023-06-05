
<?php
include_once 'config/config.php';
include_once 'classes/class.user.php';
include("connection.php");

$user = new User();
if($user->get_session()){
	header("location: index.php");
}
if(isset($_REQUEST['submit'])){
	extract($_REQUEST);
	$login = $user->check_login($useremail,md5($password));
	if($login){
		header("location: index.php");
	}else{
		?>
        <div id='error_notif'>Wrong email or password.</div>
        <?php
	}	
}
?>
<!DOCTYPE html>
<html>
		<head>
			<meta charset="UTF-8">
    		<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="preconnect" href="https://fonts.googleapis.com">
			<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
			<link href="https://fonts.googleapis.com/css2?family=Arimo&display=swap" rel="stylesheet">
			<link rel="stylesheet" href="css/stylesheet.css?<?php echo time();?>">
			<link rel="icon" href="images/logo2.png">

			<title>MF Computer Solutions</title>
			
		</head>
	<body>
		<div class="login">
		<form method="POST" action="" name="login">
			<img class="login-logo" src="images/LOGO.png">
			<input type="email" class="input-login" required name="useremail" id="Uname" placeholder="Your email...">
			<br><br>
			<input type="password" class="input-login" required name="password" id="Pass" placeholder="Your password...">
			<br><br>
			<input type="submit" class="input-login-submit" name="submit" id="log" value="Log In">
			<br><br>
		</form>

<script>
  function validateForm() {
    var emailInput = document.getElementById("Uname");
    var passwordInput = document.getElementById("Pass");

    if (emailInput.value === "") {
      alert("Please enter your email.");
      emailInput.focus();
      return false;
    }

    if (passwordInput.value === "") {
      alert("Please enter your password.");
      passwordInput.focus();
      return false;
    }

    return true;
  }
</script>
		</div>
	</body>
</html>