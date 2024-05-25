<?php
include("db.php");

$status = $statusMsg = ''; 
if(isset($_POST["submit"])){ 

  $ename = $_POST["ename"];
  $sdate = $_POST["sdate"];
  $edate = $_POST["edate"];
  $efee = $_POST["efee"];

    $status = 'error'; 
    if(!empty($_FILES["image"]["name"])) { 
       
        $fileName = basename($_FILES["image"]["name"]); 
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
         
        $allowTypes = array('jpg','png','jpeg','gif'); 
        if(in_array($fileType, $allowTypes)){ 
            $image = $_FILES['image']['tmp_name']; 
            $imgContent = addslashes(file_get_contents($image)); 


            $query = "INSERT into eventinfo (Image,EventName,EventStartDate,EventEndDate,Entry_Fee) VALUES ('$imgContent','$ename','$sdate','$edate','$efee')";
         
            $insert = mysqli_query($con, $query); 
            if($insert){
              $status = 'success'; 
              $statusMsg = "New Event Added!"; 
              header("location: admin.php");
              exit();
            }
              
        else{
            $statusMsg = "File upload failed, please try again."; } }
    else{ 
        $statusMsg ='Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; } }
else{
    $statusMsg = 'Please select an image file to upload.'; } } 
// Display status
echo $statusMsg; 
?>
