<?php
include_once('include/connect.php');
error_reporting(0);

if(isset($_POST['submit']))
{
$fullname=$_POST['fullname'];
$address=$_POST['address'];
$city=$_POST['city'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$password=$_POST['password'];
$query=mysqli_query($conn,"insert into users(fullname,address,city,gender,email,password) values('$fullname','$address','$city','$gender','$email','$password')");
if($query)
{
	$success= "Successfully Registered. You can login now";
	//header('location:user-login.php');
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
    <title>Document</title>
</head>
<body>
<div class="container mt-5" style="max-width: 500px;">
  <h4 class="text-secondary">Patient Registration</h4>
  <form id="registration_form" method="POST" >
    <h6 class="text-primary pb-2">Sign Up</h6>
    <p>Enter your personal details below</p>
    <p class="text-success"><?php if(isset($success)) echo $success;?> </P>



    <div class="form-group">
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="firstname" placeholder="FirstName" name="fullname">
         </div>
    </div>
    <div class="form-group">
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="address" placeholder="Address" name="address">
        </div>

    </div>
    <div class="form-group">
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="city" placeholder="City" name="city">
        </div>

    </div>
    <label>Gender</label><br>
    <div class="form-check-inline">

    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" class="form-check-input" name="gender" value="male">male
      </label>
    </div>
    <div class="form-check-inline">
      <label class="form-check-label">
        <input type="radio" class="form-check-input" name="gender" value="female">female
      </label>
    </div>
</div>

<p class="pt-2">Enter your personal details below</p>

<div class="form-group">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-user icon"></i></span>
      </div>
      <input type="text" class="form-control" id="username" placeholder="Username" name="email">
</div>

    </div>
    <div class="form-group">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-lock icon"></i></span>
      </div>
      <input type="password" class="form-control" id="password" placeholder="Password" name="password">
</div>

    </div>
    <div class="form-group">
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"> <i class="fa fa-lock icon"></i></span>
      </div>
      <input type="password" class="form-control" id="confirmpassword" placeholder="Confirm Password" name="confirmpassword">
</div>
</div>
   

    <div class="text-right">
    <button type="submit" class="btn btn-primary py-1" name="submit">Register <i style="font-size:24px" class="fa">&#xf18e;</i>

</button>
</div>
<p class="pt-4">Don't have an account yet?<a href="login.php">Log In</a></p>

  </form>
</div>
  

</body>
</html>