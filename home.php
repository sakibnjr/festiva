<?php
include("db.php");
session_start();

$eventsql = "SELECT * FROM eventinfo";
$all_event = $con->query($eventsql); $workshopsql = "SELECT * FROM workshop";
$all_workshop = $con->query($workshopsql); ?>

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
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }
    #container {
      max-width: 100%;
      width: 960px;
      margin: 0 auto;
    }
    header {
      max-width: 100%;
      padding: 0 100px;
      background-color: #f1f3f5;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .navigation a {
      position: relative;
      font-size: 1em;
      color: #000;
      text-decoration: none;
      font-weight: 500;
      margin-left: 40px;
    }
    .navigation a::after {
      content: "";
      position: absolute;
      left: 0;
      bottom: -6px;
      width: 100%;
      height: 3px;
      background-color: #dc3a43;
      border-radius: 5px;
      transform-origin: right;
      transform: scaleX(0);
      transition: transform 0.5s;
    }
    .navigation a:hover::after {
      transform-origin: left;
      transform: scaleX(1);
    }
    a.login-btn {
      padding: 8px;
      border: 2px solid #dc3a43;
      border-radius: 6px;
      cursor: pointer;
      font-size: 1.1em;
      color: #dc3a43;
      box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    }
    .navigation .login-btn:hover {
      background-color: #dc3a43;
      color: #fff;
      translate: 0px -2px;
    }
    .site-info {
      position: relative;
    }
    .site-bio {
      position: absolute;
      top: 30%;
      left: 8%;
    }
    .site-name {
      font-size: 2.5em;
      color: #dc3a43;
    }
    .site-info .visit-btn-1 {
      position: absolute;
      top: 60%;
      left: 8%;
    }
    .site-info .visit-btn-2 {
      position: absolute;
      top: 60%;
      left: 25%;
    }
    .visit-btn-1 a {
      text-decoration: none;
      color: #dc3a43;
      font-size: 1em;
      text-transform: uppercase;
    }
    .visit-btn-1,
    .visit-btn-2 {
      font-size: 1em;
      text-transform: uppercase;
      padding: 10px;
      background: transparent;
      border: 2px solid #dc3a43;
      border-radius: 6px;
      cursor: pointer;
      color: #dc3a43;
      box-shadow: 0 0.2rem 0.5rem rgba(0, 0, 0, 0.25);
    }
    .visit-btn-2 {
      color: #fff;
      background-color: #dc3a43;
    }
    article img {
      width: 320px;
      height: 160px;
    }
    article {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      margin: 20px auto;
      background-color: #fffdfb;
      grid-column-gap: 20px;
      grid-row-gap: 30px;
      width: 100%;
      justify-items: center;
      border-left: 10px solid #f1f3f5;
      border-right: 10px solid #f1f3f5;
      border-radius: 10px;
    }
    .box {
      display: block;
      background-color: #f1f3f5;
      border-radius: 10px;
      padding: 20px;
      /* box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px; */
      box-shadow: 0px 2px 5px rgba(255, 0, 0, 0.3);
    }
    img.event-img {
      border-radius: 10px;
    }
    div.box p {
      margin-top: 8px;
    }
    a.ticket {
      display: block;
      text-align: center;
      text-decoration: none;
      background-color: #dc3a43;
      color: #fff;
      font-size: 1.1em;
      text-transform: uppercase;
      margin-top: 10px;
      width: 320px;
      height: 36px;
      padding-top: 5px;
      border-radius: 5px;
      /* box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px; */
      box-shadow: 0px 2px 5px rgba(255, 0, 0, 0.3);
    }
    footer {
      background-color: #212529;
      color: #fff;
      padding: 20px;
    }
    footer p:first-child {
      font-size: 1.6em;
    }
    footer p:last-child {
      text-align: center;
      font-size: 0.8em;
    }
    .social-icons {
      display: grid;
      display: flex;
      justify-content: center;
      margin-left: 10px;
      margin-top: 10px;
      margin-bottom: 5px;
    }

    /* home.html designs */

    a.logout-btn {
      padding: 8px;
      border: 3px solid #dc3a43;
      border-radius: 6px;
      cursor: pointer;
      text-transform: uppercase;
      font-size: 1.1em;
      color: #dc3a43;
      /* box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px; */
      box-shadow: 0px 2px 5px rgba(255, 0, 0, 0.3);
    }
    a.logout-btn:hover {
      background-color: #dc3a43;
      color: #fff;
      translate: 0px -2px;
    }
    .eventstart,
    .eventend {
      font-size: 0.9em;
    }
    .eventend {
      text-align: right;
    }
    span.odate {
      border: 2px solid #00bf63;
      border-left: none;
      padding: 2px;
      border-radius: 5px;
    }

    span.cdate {
      border: 2px solid #dc3a43;
      border-left: none;
      padding: 2px;
      border-radius: 5px;
    }

    .eventname {
      font-size: 1.3em;
      color: #dc3a43;
      letter-spacing: 0.1em;
      font-weight: 500;
    }
    .eventfee {
      font-size: 1em;
      font-weight: 600;
    }

    /* workshop-designs */
    .workshop {
      width: 100%;
      margin: 20px auto;
      padding: 0px 10px;
      border-left: 10px solid #dc3a43;
      border-right: 10px solid #dc3a43;
      border-radius: 10px;
    }
    .workshop-name {
      font-weight: 1.4em;
      display: inline-block;
      /* font-style: italic; */
      text-transform: uppercase;
      border-left: 5px solid #dc3a43;
      border-right: 5px solid #dc3a43;
      border-radius: 5px;
      padding: 0px 5px;
      margin: 5px 0px;
    }
    .workshop-name:hover {
      border-left: 5px solid #38b6ff;
      border-right: 5px solid #38b6ff;
      color: #38b6ff;
    }

    .description {
      margin-top: 5px;
      margin-bottom: 12px;
      letter-spacing: 0.1em;
      font-family: "Times New Roman", Times, serif;
    }
    .workshop-details {
      border: 3px solid #fffdfb;
      margin: 10px;
      padding: 10px;
      border-radius: 10px;
    }
    .space {
      margin-bottom: 30px;
    }

    .w-head{
      color:#495057;
      font-size:28px;
      border-bottom:3px solid #dc3a43;
      width:280px;
      margin:0px auto;
    }

    .search-section{
      margin:10px auto;
      margin-top:50px;
      width:100%;

    }
    .event-search{
      width:100%;
      margin:0px 10px;
      font-size:1em;
      height:40px;
      border:2px solid #dc3a43;
      border-radius:8px;
      padding-left:10px;
      /* background-color:#F1F3F5; */
    }
    .search-section form{
      display:flex;
      margin-right:20px;
    }
    .search-btn{
      background-color:#dc3a43;
      color:#fff;
      padding:0px 10px;
      border:none;
      border-radius:8px;
      text-transform:uppercase;
    }

    .search-btn:hover{
      box-shadow: 0px 2px 5px rgba(255, 0, 0, 0.3);
    }

    img.search-img{
      width: 100%;
    }

    a.ticket.search-tkt{
      width: 100%;
      height:40px;
    }
    p.search-name{
      text-align:center;
      font-size:1.5em;
    }

    p.search-price{
      text-align:center;
      font-size:1.3em;
    }

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
          <a href="#" id="workshop-btn">Workshops</a>
          <a href="#">About</a>
          <a href="login.php" class="logout-btn">Logout</a>
        </nav>
      </header>

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


      <!-- search-event-section -->

      <section class="search-section">
        <form action="home.php" method="GET">
          <input type="text" 
          name="searchevent"
          placeholder="Search for an Event" 
          class="event-search" required
          >
          <input type="submit" 
          value="Search" 
          class="search-btn"
          name="eventsearchbtn"
          >
        </form>
      </section>

      <?php
  include("db.php");
  if(isset($_GET['eventsearchbtn'])){
  $Search = $_GET['searchevent'];
  $search_query = "SELECT * FROM eventinfo WHERE EventName LIKE '%$Search%' ";
  $execute = mysqli_query($con,$search_query);

  while($row = mysqli_fetch_assoc($execute)){

    ?>

<div class="box">
          <img
            src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Image']); ?>"
            class="event-img search-img"
            alt=""
          />
          <p class="eventstart">
            Starting ->
            <span class="odate"><?php echo $row['EventStartDate']; ?></span>
          </p>
          <p class="eventend">
            Ends at ->
            <span class="cdate"><?php echo $row['EventEndDate']; ?></span>
          </p>
          <p class="eventname search-name"><?php echo $row['EventName']; ?></p>
          <p class="eventfee search-price">$<?php echo $row['Entry_Fee']; ?></p>
          <a href="attendee.php" class="ticket search-tkt">Get Ticket</a>
        </div>

  
    
<?php
  }
  }
    
?>

      <!-- main-content-events-section -->

      <article id="event-section">
        <?php
          while($row = mysqli_fetch_assoc($all_event)){
       ?>
        <div class="box">
          <img
            src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['Image']); ?>"
            class="event-img"
            alt=""
          />
          <p class="eventstart">
            Starting ->
            <span class="odate"><?php echo $row['EventStartDate']; ?></span>
          </p>
          <p class="eventend">
            Ends at ->
            <span class="cdate"><?php echo $row['EventEndDate']; ?></span>
          </p>
          <p class="eventname"><?php echo $row['EventName']; ?></p>
          <p class="eventfee">$<?php echo $row['Entry_Fee']; ?></p>
          <a href="attendee.php" class="ticket">Get Ticket</a>
        </div>

        <?php

          }
     ?>
      </article>

      <!-- workshop-section-starts -->

      <section id="workshoparea" class="workshop">
        <p align="center" class="w-head">Event Workshops</p>
        <?php
          while($row = mysqli_fetch_assoc($all_workshop)){
       ?>
        <div class="workshop-details">
          <p class="eventname"><?php echo $row['EventName']; ?></p>
          <p class="workshop-name"><?php echo $row['WorkShopTitle']; ?></p>
          <p class="description"><?php echo $row['Description']; ?></p>
          <p>
            Starts @ <span class="odate"><?php echo $row['StartTime']; ?></span>
          </p>
          <p>
            Ends @
            <span class="cdate space"><?php echo $row['EndTime']; ?></span>
          </p>
        </div>
        <?php

          }
     ?>
      </section>

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
    <script>
      const eventButton = document.getElementById("event-btn");
const eventButton2 = document.getElementById("event-btn2");
const eventSection = document.getElementById("event-section");

eventButton.addEventListener("click", () => {
  eventSection.scrollIntoView({
    behavior: "smooth",
  });
});

eventButton2.addEventListener("click", () => {
  eventSection.scrollIntoView({
    behavior: "smooth",
  });
});

const workshopbtn = document.getElementById("workshop-btn");
const workshopsection = document.getElementById("workshoparea");

workshopbtn.addEventListener("click", () => {
  workshopsection.scrollIntoView({
    behavior: "smooth",
  });
});

    </script>
  </body>
</html>
