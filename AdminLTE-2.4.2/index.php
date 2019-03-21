<?php
session_start();
if (isset($_POST['enviar'])) {
	$user = $_POST['user'];
  	$pass = $_POST['pass'];
	if(($user == "paladino" and $pass == "paladino") || ($user == "kodes" and $pass == "kodes") ){
  		$_SESSION['user'] = $user;
    	$_SESSION['pass'] = $pass;
		echo "<script>location.href='pages'</script>";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta charset="utf-8">
</head>
<style type="text/css">
@import "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css";
	body{
		background: #000;
		margin: 0;
		padding: 0;
		font-family: sans-serif;
		background-size: cover;
	}
	.login-box{
		width: 280px;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate(-50%,-50%);
		color: white;

	}
	.login-box h1{
		float: left;
		font-size: 40px;
		border-bottom: 6px solid #4caf50;
		padding: 13px 0;

	}
	.textbox{
		width: 100%;
		overflow: hidden;
		font-size: 20px;
		padding: 8px 0;
		margin: 8px 0;
		border-bottom: 1px solid  #4caf50;
	}
	.textbox i{
		width: 26px;
		float: left;
		text-align: center;
	}
	.textbox input{
		border: none;
		outline: none;
		background: none;
		color: white;
		font-size: 18px;
		width: 80px;
		float: left;
	}
	.btn{
		width: 100%;
		background: none;
		border: 2px solid  #4caf50;
		color: white;
		padding: 5px;
		font-size: 18px;
		cursor: pointer;
		margin: 12px 0;


	}
</style>
<body>
	<form action="" method="POST">
		<div class="login-box">
			<h1>Login</h1>

			<div class="textbox">
				<i class="fa fa-user"></i>
				<input type="text" placeholder="User" name="user">
			</div>
			<div class="textbox">
				<i class="fa fa-lock"></i>
				<input type="password" placeholder="Password" name="pass">
			</div>
			<input type="submit" class="btn" name="enviar" value="Sign in">
		</div>
	</form>
</body>
</html>