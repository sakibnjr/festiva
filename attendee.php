<?php
session_start();

include("db.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $fname = $_POST["fname"];
  $lname = $_POST["lname"];
  $gender = $_POST["gender"];
  $phone = $_POST["phone"];
  $email = $_POST["mail"];
  $ticket = $_POST["tickettype"];
  $Quantity = $_POST["quantity"];
   
  $query = "INSERT INTO attendee (FirstName, LastName, Gender,Phone,Email,TicketType,Quantity) VALUES ('$fname','$lname','$gender','$phone','$email','$ticket','$Quantity')";

  $execute = mysqli_query($con, $query);

  if($execute){
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
    <link rel="shortcut icon" href="favicon/festiva.png" type="image/x-icon" />
    <link rel="stylesheet" href="home_style.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Festiva</title>
  </head>
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

    * {
      font-family: "Poppins", sans-serif;
    }
    .attendee-form {
      position: absolute;
      z-index: 1;
      top:50px;
      width: 540px;
      height: 540px;
      background-color: #fff;
      margin-left: 15%;
      text-align: center;
      border-radius: 16px;
      background-color: #f1f3f5;
      box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    }
    header,
    footer,
    .site-info {
      filter: blur(5px);
    }
    a {
      position: relative;
      left: 382px;
      top: -10px;
    }
    ion-icon {
      font-size: 20px;
      color: #dc3a43;
      border: 3px solid #dc3a43;
      border-radius: 50px;
      padding: 2px;
    }
    p {
      display: inline-block;
      margin-top: 20px;
      font-size: 1.6em;
      border-bottom: 3px solid #dc3a43;
      padding: 0px 20px;
      border-radius: 5px;
    }

    label,
    input {
      height: 36px;
      width: 200px;
    }
    input {
      border: none;
      width: 180px;
      background: #fff;
      padding-left: 10px;
      box-shadow: 0px 2px 5px rgba(255, 0, 0, 0.3);
      border-radius: 10px;
      margin-bottom: 18px;
    }
    input.fname {
      position: relative;
      left: -10px;
    }
    input.lname {
      position: relative;
      left: 10px;
    }

    label.gender {
      display: inline-block;
      text-align: center;
      color: #dc3a43;
    }
    input[type="radio"] {
      height: 16px;
      width: 16px;
      margin: 5px;
    }
    fieldset {
      width: 480px;
      margin: 10px auto;
      border-radius: 10px;
      border: 2px solid #dc3a43;
    }
    legend {
      font-size: 1.2em;
      text-transform: uppercase;
    }
    input.phone {
      margin-top: 10px;
      width: 380px;
    }
    input.mail {
      margin-bottom: 20px;
      width: 380px;
    }
    label.t-type {
      display: inline-block;
      font-size: 1.1em;
    }
    select {
      border: 2px solid #dc3a43;
      border-radius: 5px;
      position: relative;
      left: -20px;
      padding: 3px;
    }
    input[type="range"] {
      height: 20px;
    }
    input[type="submit"] {
      background-color: #dc3a43;
      color: #fff;
      text-transform: uppercase;
      font-size: 1.1em;
      border: none;
      height: 40px;
      width: 380px;
      border-radius: 10px;
      box-shadow: 0px 2px 5px rgba(255, 0, 0, 0.3);
    }
    /* input[type="number"]:valid,
input[type="email"]:valid {
  border: 3px solid #00bf63;
} */
  </style>
  <body>
    <div id="container">
      <!-- header-code -->

      <header>
        <h2 class="logo">
          <img src="logo/site_logo.png" alt="sitelogo" height="90" width="90" />
        </h2>
        <nav class="navigation">
          <a href="#" class="homepage">Home</a>
          <a href="#" class="eventpage" id="event-btn">Events</a>
          <a href="#">Workshops</a>
          <a href="#">Contact</a>
          <a href="login.php" class="logout-btn">Logout</a>
        </nav>
      </header>

      <!-- attendee-registration-form -->

      <section class="attendee-form">
        <a href="home.php"
          ><span><ion-icon name="arrow-back-outline"></ion-icon></span
        ></a>
        <p>Event Registration</p>
        <form action="attendee.php" method="POST">
          <br />
          <input
            type="text"
            name="fname"
            id=""
            placeholder="First Name"
            class="fname"
          />
          <input
            type="text"
            name="lname"
            placeholder="Last Name"
            class="lname"
          /><br />
          <label for="gender" class="gender">You are a...</label><br />
          <input type="radio" name="gender" value="Male" id="1" />
          <label for="male" id="1">Male</label>
          <input type="radio" name="gender" value="Female" id="2" />
          <label for="female" id="2">Female</label>
          <input type="radio" name="gender" value="Other" id="3" />
          <label for="other" id="3">Other</label>
          <br />
          <fieldset>
            <legend>Contact Info</legend>
            <input
              type="number"
              name="phone"
              placeholder="Phone "
              class="phone"
            />
            <br />
            <input type="email" name="mail" placeholder="Email" class="mail" />
          </fieldset>
          <label for="" class="t-type">Preferred Ticket :</label>
          <select name="tickettype" id="">
            <option value="General">General</option>
            <option value="Reserved">Reserved</option>
            <option value="Premium">Premium</option>
            <option value="Early Bird">Early Bird</option>
            <option value="Add-ons">Add-ons</option></select
          ><br />
          <label for="rangeInput">Choose Quantity -> (1 to 10)</label>
          <br />
          <input
            type="range"
            id="rangeInput"
            min="0"
            max="10"
            name="quantity"
          />
          <br />
          <input type="submit" value="Get Ticket" class="ticket-btn" />
        </form>
      </section>

      <!-- site-content-code -->

      <section class="site-info">
        <img src="logo/bg.svg" alt="" srcset="" height="100%" width="100%" />
        <p class="site-bio">
          Hey there I’m, <br />
          <span class="site-name">Festiva</span><br />
          your online event planner.
        </p>
        <button class="visit-btn-1">
          <a href="#" id="event-btn2">Explore Events</a>
        </button>
        <button class="visit-btn-2">Read More</button>
      </section>

      <!-- main-content-events-section -->

      <!-- footer-section-code -->

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
