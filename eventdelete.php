<?php
include("db.php");
$Delete_Record = $_GET['Delete'];

$delete_query = "DELETE FROM eventinfo WHERE EventID='$Delete_Record'";

$execute = mysqli_query($con,$delete_query);
if($execute){
  echo '<script>window.open("admin.php?Delete=Event Removed","_self")</script>';
}
?>