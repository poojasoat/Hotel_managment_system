<?php
session_start();
include("include/connect.php");
if(isset($_POST['submit']))
{
$ret=mysqli_query($conn,"SELECT * FROM admin WHERE username='".$_POST['username']."' and password='".$_POST['password']."'");
$num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="AdminDashboard.php";//
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['errmsg']="Invalid username or password";
$extra="index.php";
$host = $_SERVER['HTTP_HOST'];
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
    <title> Admin Login</title>
</head>
<body>
<div class="container mt-5" style="max-width: 500px;">
  <h4 class="text-secondary"> Admin Login</h4>
  <form method="post">
    <h6 class="text-primary pb-2">Sign in to your account</h6>
    <span style="color:red;"><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>

    <p>Please enter name and password to log in</p>
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

  </form>
</div>
</body>
</html>