<?php
include_once "connect.php";
$sql = "DELETE FROM bookappointment WHERE id='" . $_GET["id"] . "'";
if (mysqli_query($conn, $sql))
 {
    echo "<script>alert('Do You want to cancel the record')</script>";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);
header("Location:AppointmentHistory.php");
 
?>
