<?php
session_start();
//error_reporting(0);
include('include/connect.php');
include('include/checklogin.php');
check_login();
?>
<?php
if (isset($_POST['changepassword'])) {

   $opass=$_POST["opass"];
    $npass=$_POST["npass"];
    $cpass=$_POST["cpass"];
   
    $user=$_SESSION['id'];
    $resultset_1=mysqli_query($conn,"select password from users where   id='$user'");
    $odata=mysqli_fetch_row($resultset_1);
    //  print_r($result);
    //  $id=$odata["id"];
    //  $query1=mysqli_query($conn,"select * from signup where   id='$id'");
    //  $rowcount=mysqli_num_rows($query1);
    if($odata[0]==$opass){

        if($npass==$cpass){

         $q=mysqli_query($conn,"update users SET password='$npass'where id='$user'");
            if($q){
                $success="Password change Successfully";
            }
        }
        else{
            $warning="Old password and new password are not match";

        }
    }
    else{
        $error ="old password not match";
    }
    

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Change Password</title>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="css/style.css"></link>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


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
         <h5>USER|CHANGE PASSWORD</h5>
             
                 <ol class="breadcrumb " style="background-color:transparent;">
                <li class="breadcrumb-item"><a href="#">User</a></li>
                <li class="breadcrumb-item"><a href="Changepassword.php">change Password </a></li>
        
    </ol>
        </div> 
        <div class="container mt-5" style="width:800px;">
  <form id="registration_form" method="POST" >
  <p class="text-danger"><?php if(isset($error)) echo $error;?> </P>
    <p class="text-success"><?php if(isset($success)) echo $success;?> </P>
    <p class="text-warning"><?php if(isset($warning)) echo $warning;?> </P>
  <p class="pb-3">Change Password</p>
    <div class="form-group">
    <label>Current Password</label>
        <div class="input-group mb-3">
            <input type="text" class="form-control" id="firstname" placeholder="Current Password" name="opass">
         </div>
    </div>
    <div class="form-group">
    <label>New Password</label>

        <div class="input-group mb-3">
            <input type="text" class="form-control" id="address" placeholder="New Password" name="npass">
        </div>

    </div>
    <div class="form-group">
    <label>Confirm Password</label>

        <div class="input-group mb-3">
            <input type="text" class="form-control" id="city" placeholder="Confirm Password" name="cpass">
        </div>

    </div>
   
  
<div class="text-left">
<button type="submit" class="btn btn-outline-primary" name="changepassword">Submit</button>

</button>
</div>

  </form>
</div> 
      </div>
    </div>
</div>

</body>
</html>