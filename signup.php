<?php
session_start();

include("db.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $name = $_POST["name"];
  $email = $_POST["email"];
  $user = $_POST["user"];
  $pass = $_POST["pass"];
   
  if(!empty($email) && !empty($pass) && !is_numeric($email))
  {

    $query = "INSERT INTO user (Name, Email, Username,Password) VALUES ('$name','$email','$user','$pass')";

    mysqli_query($con, $query);

    echo "<script type='text/javascript'> alert('Successfully Registered')</script>";
  }
  else{
    echo "<script type='text/javascript'> alert('Something went wrong')</script>";
  }


}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" href="favicon/signup.png" type="image/x-icon" />
    <link rel="stylesheet" href="style.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Signup Page</title>
  </head>
  <body>
    <div id="container">
      <header>
        <a href="login.php"
          ><img
            src="logo/site_logo.png"
            height="90"
            width="90"
            alt="site_logo"
            srcset=""
        /></a>
        <p>Control Center</p>
      </header>

      <section class="msg">
        <p>To keep connected with us please create an account.</p>
        <hr />
      </section>

      <!-- signup-code-section -->

      <section class="flex create-ac">
        <form action="signup.php" method="POST" class="signup-form">
          <label for="form-info">Sign Up</label><br />
          <span class="form-icon"
            ><ion-icon name="person-circle-outline"></ion-icon
          ></span>
          <input
            type="text"
            name="name"
            id=""
            placeholder="Name"
            required
          /><br /><span class="form-icon">
            <ion-icon name="mail-outline"></ion-icon
          ></span>
          <input type="email" name="email" placeholder="Email" required /><br />
          <span class="form-icon"
            ><ion-icon name="text-outline"></ion-icon
          ></span>
          <input
            type="text"
            name="user"
            placeholder="Username"
            required
          /><br />
          <span class="form-icon"
            ><ion-icon name="lock-closed-outline"></ion-icon
          ></span>
          <input
            type="password"
            name="pass"
            placeholder="Password"
            required
          /><br />
          <input type="checkbox" name="" id="" required />
          <label for="checkbox"
            >I read and agree to
            <span class="terms">Terms & Conditions</span></label
          >
          <span class="form-icon"
            ><ion-icon name="add-circle-outline" class="create"></ion-icon
          ></span>
          <input
            type="submit"
            name="submit"
            value="Create"
            class="create-btn"
          />
          <br />
          <label for="checkbox">Already have an account?</label>
          <a href="login.php" class="lgn">Sign in</a>
        </form>
      </section>

      <!-- footer-section -->

      <footer>
        <p>Festiva</p>
        <p>Creating Memories</p>
        <br />
        <hr />
        <div class="social-icons">
          <p>
            <img src="logo/fb.svg" class="social-icons" alt="" />
          </p>
          <p>
            <img src="logo/git.svg" class="social-icons" alt="" />
          </p>
          <p>
            <img src="logo/insta.svg" class="social-icons" alt="" />
          </p>
        </div>
        <p>&copy;Copyright. All rights reserved.</p>
      </footer>
    </div>

    <!-- script-for-icons -->

    <script
      type="module"
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"
    ></script>
    <script
      nomodule
      src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"
    ></script>
  </body>
</html>
