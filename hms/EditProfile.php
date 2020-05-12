<?php
session_start();
//error_reporting(0);
include('include/connect.php');
include('include/checklogin.php');
check_login();
if(isset($_POST['update']))
{
$fname=$_POST['fname'];
$address=$_POST['address'];
$city=$_POST['city'];
$gender=$_POST['gender'];

$sql=mysqli_query($conn,"Update users set fullName='$fname',address='$address',city='$city',gender='$gender' where id='".$_SESSION['id']."'");
if($sql)
{
$success="Your Profile updated Successfully";
}
}
?>
<?php
 $user=$_SESSION['id'];
 $resultset_1=mysqli_query($conn,"select * from users where   id='$user'");
 $result=mysqli_fetch_array($resultset_1);
 // print_r($result);
 $id=$result["id"];
  $query1=mysqli_query($conn,"select * from users where   id='$id'");
  $rowcount=mysqli_num_rows($query1);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My Profile </title>
	<link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="css/style.css"></link>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

</head>
<body>

<div class="wrapper">
    <div class="sidebar">
        <h2 class="text-secondary">HMS</h2>
        <ul>
        <li><a href="Dashboard.php"><i class="fas fa-home icon"></i>Dashboard</a></li>
            <li><a href="BookAppointment.php"><i class="fas fa-user icon"></i>Book Appointment</a></li>
            <li><a href="AppointmentHistory.php"><i class="fas fa-address-card icon"></i>Appointment History</a></li>
        
        </ul> 
    </div>
    <div class="main_content">
        <div class="header text-right ">
        <div class="dropdown">
            <span>Hospital Managemant System</span>
    <span type="button" class="btn  dropdown-toggle" data-toggle="dropdown">
    <?php $query=mysqli_query($conn,"select fullName from users where id='".$_SESSION['id']."'");
while($row=mysqli_fetch_array($query))
{
	echo $row['fullName'];
}
									?>
    <i class="fas fa-user"></i></span>
    <div class="dropdown-menu bg-dark ">
    <a class="dropdown-item text-white" href="EditProfile.php">My Profile</a>
      <a class="dropdown-item text-white" href="Changepassword.php">Change Password</a>
          <a href="logout.php" class="dropdown-item  text-white">Logout</a>
    </div>
  </div>
            
        </div>  
        <div class="info">
         
        <div class="header2">
         <h5>USER|EDIT PROFILE</h5>
             
                 <ol class="breadcrumb " style="background-color:transparent;">
                <li class="breadcrumb-item"><a href="#">User</a></li>
                <li class="breadcrumb-item"><a href="EditProfile.php">Edit Profile</a></li>
        
                </ol>
        </div>  
        <div class="container mt-5" style="width:800px;">
  <form id="registration_form" method="POST" >
  <p>Edit Profile</p>
  <p class="text-success"><?php if(isset($success)) echo $success;?> </P>

    <div class="form-group">
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="firstname" placeholder="FirstName" name="fname" 
            value="<?php echo $result['fullname']?>">
         </div>
    </div>
    <div class="form-group">
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="address" placeholder="Address" name="address"
             value="<?php echo $result['address']?>">
        </div>

    </div>
    <div class="form-group">
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="city" placeholder="City" name="city" 
            value="<?php echo $result['city']?>">
        </div>

    </div>
    <div class="form-group">
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="gender" placeholder="gender" name="gender" 
            value="<?php echo $result['gender']?>">
        </div>

    </div>
    <div class="form-group">
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="username" placeholder="username" name="email"
            value="<?php echo $result['email']?>">
        </div>

    </div>
   
<div class="text-left">
<button type="submit" class="btn btn-outline-primary" name="update">Update</button>

</button>
</div>

  </form>
</div>
  

      </div>
    </div>
</div>

</body>

</html>