<?php
@error_reporting(E_ALL ^ E_WARNING);

session_start();

include("db.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){


  $admin_name = $_POST['auser'];
  $admin_pass = $_POST['apass'];

  if(!empty($admin_name) && !empty($admin_pass)){
    $admin_login_query = "SELECT Username, Password FROM admin WHERE Username = '$admin_name' AND Password='$admin_pass' ";

    $get = mysqli_query($con, $admin_login_query);

    if($get)
    {
      if($get && mysqli_num_rows($get) > 0)
      {
        $admin_data = mysqli_fetch_assoc($get);

        if($admin_data['apass'] = $admin_pass)
        {
          header("location: admin.php");
          exit();
        }
      }
    }


  }

  $user = $_POST["user"];
  $pass = $_POST["pass"];

  if(!empty($user) && !empty($pass))
  {
    $query = "SELECT Username,Password FROM user WHERE Username = '$user' AND Password='$pass'";
    $result = mysqli_query($con, $query);

    if($result)
    {
      if($result && mysqli_num_rows($result) > 0)
      {
        $user_data = mysqli_fetch_assoc($result);

        if($user_data['pass'] = $pass)
        {
          header("location: home.php");
          exit();
        }
      }
    }
    echo "<script type='text/javascript'> alert('Wrong Username or Password')</script>";
  }
  else{
    echo "<script type='text/javascript'> alert('Wrong Username or Password')</script>";
  }
  
}

?>







<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" href="favicon/login.png" type="image/x-icon" />
    <link rel="stylesheet" href="style.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Control Center</title>
  </head>
  <body>
    <div id="container">
      <header>
        <img
          src="logo/site_logo.png"
          height="90"
          width="90"
          alt="site_logo"
          srcset=""
        />
        <p>Control Center</p>
      </header>

      <section class="msg">
        <p>Please login first to continue!</p>
        <hr />
      </section>

      <!-- login-code-section -->

      <section class="flex">
        <div class="user-login">
          <form action="login.php" method="POST">
            <fieldset class="user">
              <legend class="user">User Login</legend>
              <input
                type="text"
                name="user"
                placeholder="Username"
                required
              /><br />
              <input
                type="password"
                name="pass"
                placeholder="Password"
                required
              />
              <br />
              <input
                type="submit"
                name="submit-user"
                value="Login"
                class="user"
              />
            </fieldset>
          </form>
        </div>

        <div class="admin-login">
          <form action="login.php" method="POST">
            <fieldset class="admin">
              <legend class="admin">Admin Login</legend>
              <input
                type="text"
                name="auser"
                placeholder="Username"
                required
              /><br />
              <input
                type="password"
                name="apass"
                placeholder="Password"
                required
              />
              <br />
              <input
                type="submit"
                name="admin"
                value="Login"
                class="admin"
              />
            </fieldset>
          </form>
        </div>
      </section>

      <!-- account-creation-section -->

      <section class="new-ac">
        <hr />
        <p class="new-ac-msg">Not a Festiva member yet?</p>
        <a href="signup.php">Create Account</a>
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
  </body>
</html>
