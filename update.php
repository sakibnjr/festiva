<?php
include("db.php");
$Update_Record = $_GET['Update'];

$data_from_db = "SELECT * FROM user WHERE User_ID='$Update_Record'";

$run = mysqli_query($con,$data_from_db);

while($DataRows = mysqli_fetch_array($run)){
  $update_id = $DataRows['User_ID'];
  $name = $DataRows['Name'];
  $mail = $DataRows['Email'];
  $uname = $DataRows['Username'];
  $pass = $DataRows['Password'];
}
 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Update</title>
  </head>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
    * {
      font-family: "Poppins", sans-serif;
    }
    body {
      width: 500px;
      margin: 5% auto;
      text-align: center;
    }
    fieldset {
      display: grid;
      grid-template-columns: 1fr;
      justify-content: center;
      align-items: center;
      border-radius: 10px;
      border: 3px solid #dc3a43;
      padding: 50px;
    }
    legend {
      font-size: 1em;
      border: 3px solid #dc3a43;
      color: #dc3a43;
      padding: 8px;
      border-radius: 10px;
    }
    input {
      margin-bottom: 10px;
      box-shadow: 0px 2px 5px rgba(255, 0, 0, 0.3);
      border: none;
      height: 30px;
      border: 1px solid #dc3a43;
      border-radius: 10px;
      padding-left:10px;
    }
    input.create-btn {
      background-color: #dc3a43;
      color: #fff;
      height: 40px;
      font-size: 1.2em;
      text-transform: uppercase;
      box-shadow: 0px 2px 5px rgba(255, 0, 0, 0.3);
    }
  </style>
  <body>
    <section class="flex create-ac">
      <form
        action="update.php?update_id=<?php echo $update_id; ?>"
        method="POST"
      >
        <fieldset>
          <legend class="create">Modify Informations</legend>

          <input
            type="text"
            name="name"
            id=""
            placeholder="Name"
            value="<?php echo $name; ?>"
            class="name"
            required
          /><br />

          <input
            type="email"
            name="email"
            placeholder="Email"
            value="<?php echo $mail; ?>"
            required
          /><br />

          <input
            type="text"
            name="user"
            placeholder="Username"
            value="<?php echo $uname; ?>"
            required
          /><br />

          <input
            type="password"
            name="pass"
            placeholder="Password"
            value="<?php echo $pass; ?>"
            required
          /><br />

          <input
            type="submit"
            name="submit"
            value="Update"
            class="create-btn"
          />
        </fieldset>
      </form>
    </section>
  </body>
</html>

<?php
include("db.php");
if(isset($_POST['submit'])){
   
  $update_id = $_GET['update_id'];
  $name = $_POST['name'];
  $mail = $_POST['email'];
  $uname = $_POST['user'];
  $pass = $_POST['pass'];

  $update_query = "UPDATE user SET Name='$name', Email='$mail', Username='$uname', Password='$pass' WHERE User_ID='$update_id'";

  $execute = mysqli_query($con,$update_query);

  if($execute){
    function redirect_to($NewLocation){
      header("Location:".$NewLocation);
      exit;
    }
    redirect_to("admin.php?Update=Record Updated");
  }
}
 

?>
