<?php
session_start();
// error_reporting(0);
include("include/connect.php");
if(isset($_POST['submit']))
{
$ret=mysqli_query($conn,"SELECT * FROM users WHERE email='".$_POST['username']."' and password='".($_POST['password'])."'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="Dashboard.php";
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
// For stroing log if user login successfull
$log=mysqli_query($conn,"insert into userlog(uid,username,userip,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$status')");
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
	// For stroing log if user login unsuccessfull
$_SESSION['login']=$_POST['username'];	
$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
mysqli_query($conn,"insert into userlog(username,userip,status) values('".$_SESSION['login']."','$uip','$status')");
$_SESSION['errmsg']="Invalid username or password";
$extra="login.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" />
        <link rel="stylesheet" href="css/style.css"></link>
    <title> Patient Login</title>
</head>
<body>
<div class="container mt-5" style="max-width: 500px;">
  <h4 class="text-secondary">HMS| Patient Login</h4>
  <form method="post">
    <h6 class="text-primary pb-2">Sign in to your account</h6>
    <p>
								Please enter your name and password to log in.<br />
								<span style="color:red;"><?php echo $_SESSION['errmsg']; ?><?php echo $_SESSION['errmsg']="";?></span>
							</p>
    <div class="form-group">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-user icon"></i></span>
      </div>
      <input type="text" class="form-control" id="username" placeholder="Username" name="username">
</div>
    </div>
    <div class="form-group">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-key icon"></i></span>
      </div>
      <input type="password" class="form-control" id="password" placeholder="Password" name="password">
</div>
    </div>
    <div class="text-right">
    <button type="submit" class="btn btn-primary py-1" name="submit">Login <i style="font-size:24px" class="fa">&#xf18e;</i>

</button>
</div>
<p class="pt-4">Don't have an account yet?<a href="Signup.php">Create an account</a></p>

  </form>
</div>
</body>
</html>