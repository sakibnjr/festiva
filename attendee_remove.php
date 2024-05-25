<?php
include("db.php");
$Delete_Record = $_GET['Delete'];

$delete_query = "DELETE FROM attendee WHERE AttendeeID='$Delete_Record'";

$execute = mysqli_query($con,$delete_query);
if($execute){
  echo '<script>window.open("admin.php?Delete=Record Deleted*","_self")</script>';
}
?>