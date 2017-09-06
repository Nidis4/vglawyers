<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$error = 0;
if (isset($_SESSION['user']) && $_SESSION['user']=="vglawyer" ){
    header("Location: home.php");
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['inputUsername'];
    $pass = $_POST['inputPassword'];

    if ($user == "vglawyer" && $pass == "d!g1VG"){
        session_start();
        $_SESSION['user'] = $user;
        header("Location: home.php");
    }
    else{
        $error = 1;
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<title></title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<header>
		<div class="logo">
			<a href="index.php"><img src="images/logo.png" alt=""></a>
		</div>
		<div class="phil"><img src="images/philsek_logo.png" alt=""></div>
	</header>
	<div id="main">
		<form class="form-signin" method="post" enctype="multipart/form-data" action="index.php">
		<div class="label">
			USERNAME
		</div>
		<div class="field">
			<input type="text" id="inputUsername" class="form-control" placeholder="Username" required autofocus name="inputUsername"/>
		</div>
		<div class="label">
			PASSWORD
		</div>
		<div class="field">
			<input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="inputPassword" />
		</div>
		<button class="sub-button" type='submit'>ΣΥΝΔΕΣΗ</button>
		</form>
	</div>
</body>
</html>
