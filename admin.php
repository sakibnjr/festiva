<?php
include("db.php");
session_start();

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="shortcut icon" href="favicon/admin.png" type="image/x-icon" />
    <link rel="stylesheet" href="admin_style.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel</title>
  </head>
  <body>
    <div id="container">
      <!-- header-section -->

      <header>
        <a href="login.php"
          ><img
            src="logo/site_logo.png"
            height="90"
            width="90"
            alt="site_logo"
            srcset=""
        /></a>
        <p>Admin Panel</p>
        <span><ion-icon name="shield-checkmark-outline"></ion-icon></span>
        <a href="login.php" class="exit">Logout</a>
      </header>

      <!-- Add admin section starts -->

      <section>

        <?php
        
        include("db.php");
        
        if($_SERVER["REQUEST_METHOD"] == "POST"){
          $name = $_POST["name"];
          $user = $_POST["uname"];
          $pass = $_POST["pass"];
           
        
        
           $execute = $query = "INSERT INTO admin (Name, Username,Password) VALUES ('$name','$user','$pass')";
        
           if($execute){
            mysqli_query($con, $query);
        
            echo "<script type='text/javascript'> alert('New Admin Added')</script>";
           } 
        
          else{
            echo "<script type='text/javascript'> alert('Something went wrong')</script>";
          }
        
        }
        
        ?>
      
        <div class="add-admin">
      
        <form action="admin.php" method="POST" class="new-admin">
          <fieldset>
            <legend>Add New Admin</legend>
          
          <input type="text" name="name" required placeholder="Admin Name"><br>
          
          <input type="text" name="uname" placeholder="Admin Username" required><br>
          
          <input type="password" name="pass" placeholder="Admin Password" required><br><br>
          <input type="submit" value="Admin +" class="admin-add-btn">
        </fieldset>
        </form>
      
      </div>
      </section>

      <!-- Add admin section ends -->

      <!-- admin-info-view-from-database-section-starts -->

      <table width="930" border="3" align="center">
        <caption>Admin Details</caption>
        <tr>
          <th>Admin ID</th>
          <th>Name</th>
          <th>User Name</th>
          <th>Password</th>
          <th colspan="1" align="center" class="modify-col">Modify</th>
        </tr>

        <?php

    include("db.php");
    $query = "SELECT * FROM admin";

    $execute = mysqli_query($con, $query);

    while($DataRows = mysqli_fetch_array($execute)){
      $id = $DataRows['Admin_ID'];
      $name = $DataRows['Name'];
      $u_name = $DataRows['Username'];
      $pass = $DataRows['Password'];
      

    ?>
        <tr>
          <td><?php echo $id ?></td>
          <td><?php echo $name ?></td>
          <td><?php echo $u_name ?></td>
          <td><?php echo $pass ?></td>
          <td align="center">
            <a href="admindelete.php?Delete=<?php echo $id; ?>" class="delete-btn"
              >Delete</a
            >
          </td>
        </tr>

        <?php } ?>
      </table>


      <p align="center">
        <?php echo @$_GET['Delete']; ?>
      </p>


</section>

      <!-- admin-info-view-from-database-section-ends -->

      <!-- Add event section starts -->
<section>
<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");

    form {
      text-align: center;
      font-family: "Poppins", sans-serif;
    }
    .primary-fieldset {
      /* width: 915px;
      margin: 20px auto; */
      margin:18px;
      border: 3px solid #38b6ff;
      border-radius: 5px;
      padding-bottom:10px;
    }

    .secondary-fieldset {
      width: 440px;
      margin: 0px auto;
      border: 3px solid #38b6ff;
      border-radius: 5px;
    }

    .primary-legend,
    .secondary-legend {
      background-color: #38b6ff;
      color: #fff;
      font-size: 1.2em;
      border: 2px solid;
      padding: 3px 6px;
      border-radius: 10px;
    }
    .new-event-form input {
      font-size: 1em;
      margin: 10px;
      padding-left: 10px;
      border: none;
      border-bottom: 1px solid #38b6ff;
      box-shadow: 0px 0px 8px -2px #38b6ff;
      width: 360px;
      height: 36px;
      border-radius: 10px;
    }
    label.event-banner {
      position: relative;
      display: inline-block;
      border-bottom: 2px solid #38b6ff;
      letter-spacing: 2px;
      left: -80px;
      margin: 5px 0px;
    }
    input.add-event {
      display: inline-block;
      background-color: #38b6ff;
      color: #fff;
      text-transform: uppercase;
      font-size: 1.2em;
      width: 370px;
      border-radius: 10px;
      height: 40px;
    }
  </style>

<form
      action="add_event.php"
      method="post"
      enctype="multipart/form-data"
      class="new-event-form"
    >
      <fieldset class="primary-fieldset">
        <legend class="primary-legend">Create an Event</legend>
        <label class="event-banner">Select Event Banner</label><br />
        <input type="file" name="image" required />
        <br />

        <input
          type="text"
          name="ename"
          placeholder="Event Name"
          required
        /><br />
        <fieldset class="secondary-fieldset">
          <legend class="secondary-legend">Event Duration</legend>
          <input
            type="date"
            name="sdate"
            placeholder="Start Date"
            required
          /><br />
          <input
            type="date"
            name="edate"
            placeholder="End Date"
            required
          /><br />
        </fieldset>
        <input type="text" name="efee" placeholder="Event Fee" required /><br />
        <input
          type="submit"
          name="submit"
          value="Add Event"
          class="add-event"
        /><br />
      </fieldset>
    </form>

    </section>

      <!-- Add event section ends -->

<!-- event-view-from-database-code-starts -->

<table width="930" border="3" align="center">
        <caption>All Events</caption>
        <tr>
          <th>Event ID</th>
          <th>Name</th>
          <th>Start Date</th>
          <th>End Date</th>
          <th>Entry Fee</th>
          <th colspan="1" align="center" class="modify-col">Modify</th>
        </tr>

        <?php

    include("db.php");
    $query = "SELECT * FROM eventinfo";

    $execute = mysqli_query($con, $query);

    while($DataRows = mysqli_fetch_array($execute)){
      $id = $DataRows['EventID'];
      $ename = $DataRows['EventName'];
      $sdate = $DataRows['EventStartDate'];
      $edate = $DataRows['EventEndDate'];
      $fee = $DataRows['Entry_Fee'];
      

    ?>
        <tr>
          <td><?php echo $id ?></td>
          <td><?php echo $ename ?></td>
          <td><?php echo $sdate ?></td>
          <td><?php echo $edate ?></td>
          <td><?php echo $fee ?></td>
          <td align="center">
            <a href="eventdelete.php?Delete=<?php echo $id; ?>" class="delete-btn"
              >Delete</a
            >
          </td>
        </tr>

        <?php } ?>
      </table>


      <p align="center">
        <?php echo @$_GET['Delete']; ?>
      </p>

<!-- event-view-from-database-code-ends -->

      <!-- search_form code section -->
      <form action="admin.php" method="GET">
        <div class="search-box">
          <input
            type="text"
            name="search"
            placeholder="Seach by ID / Name"
            class="search-query"
          /><br />
          <input
            type="submit"
            name="searchbtn"
            value="Search"
            class="search-btn"
          />
        </div>
      </form>

<!-- Registered-users-search-code -->

      <?php
include("db.php");
if(isset($_GET['searchbtn'])){
  $Search = $_GET['search'];
  $search_query = "SELECT * FROM user WHERE Name='$Search' OR User_ID='$Search'";
  $execute = mysqli_query($con,$search_query);
  while($DataRows=mysqli_fetch_array($execute)){

      $id = $DataRows['User_ID'];
      $name = $DataRows['Name'];
      $mail = $DataRows['Email'];
      $uname = $DataRows['Username'];
      $pass = $DataRows['Password'];
      ?>
      <table width="930" border="3" align="center">
        <caption>
          Search Result
        </caption>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Username</th>
          <th>Password</th>
        </tr>
        <tr>
          <td><?php echo $id ?></td>
          <td><?php echo $name ?></td>
          <td><?php echo $mail ?></td>
          <td><?php echo $uname ?></td>
          <td><?php echo $pass ?></td>
        </tr>
      </table>
      <?php
  }
}
?>

<!-- Registered-users-data-view-from-database-code -->

      <table width="930" border="3" align="center">
        <caption></caption>
        <tr>
          <caption>Website Users</caption>
          <th>User ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Username</th>
          <th>Password</th>
          <th colspan="2" align="center" class="modify-col">Modify</th>
        </tr>

        <?php

    include("db.php");
    $query = "SELECT * FROM user";

    $execute = mysqli_query($con, $query);

    while($DataRows = mysqli_fetch_array($execute)){
      $id = $DataRows['User_ID'];
      $name = $DataRows['Name'];
      $mail = $DataRows['Email'];
      $uname = $DataRows['Username'];
      $pass = $DataRows['Password'];

    ?>
        <tr>
          <td><?php echo $id ?></td>
          <td><?php echo $name ?></td>
          <td><?php echo $mail ?></td>
          <td><?php echo $uname ?></td>
          <td><?php echo $pass ?></td>
          <td align="center">
            <a href="update.php?Update=<?php echo $id; ?>" class="update-btn"
              >Update</a
            >
          </td>
          <td align="center">
            <a href="delete.php?Delete=<?php echo $id; ?>" class="delete-btn"
              >Delete</a
            >
          </td>
        </tr>

        <?php } ?>
      </table>


      <p align="center">
        <?php echo @$_GET['Delete']; ?>
      </p>
      <p align="center"><?php echo @$_GET['Update']; ?></p>

  
<!-- Attendee Code Section -->

<!-- Attendee Seach Code Starts -->

<form action="admin.php" method="GET">
        <div class="search-box">
          <input
            type="text"
            name="search"
            placeholder="Seach by ID / First Name"
            class="search-query"
          /><br />
          <input
            type="submit"
            name="searchbtn"
            value="Search"
            class="search-btn"
          />
        </div>
      </form>

 <?php
include("db.php");
if(isset($_GET['searchbtn'])){
  $Search = $_GET['search'];
  $search_query = "SELECT * FROM attendee WHERE FirstName='$Search' OR AttendeeID='$Search'";
  $execute = mysqli_query($con,$search_query);
  while($DataRows1=mysqli_fetch_array($execute)){

    $aid = $DataRows1['AttendeeID'];
    $fname = $DataRows1["FirstName"];
    $lname = $DataRows1["LastName"];
    $gender = $DataRows1["Gender"];
    $phone = $DataRows1["Phone"];
    $email = $DataRows1["Email"];
    $ticket = $DataRows1["TicketType"];
    $quantity = $DataRows1["Quantity"];

      ?>
      <table width="930" border="3" align="center">
        <caption>
          Search Result
        </caption>
        <tr>
         <th>AttendeeID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Gender</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Ticket Type</th>
          <th>Quantity</th>
        </tr>
        <tr>
        <td><?php echo $aid ?></td>
          <td><?php echo $fname ?></td>
          <td><?php echo $lname ?></td>
          <td><?php echo $gender ?></td>
          <td><?php echo $phone ?></td>
          <td><?php echo $email ?></td>
          <td><?php echo $ticket ?></td>
          <td><?php echo $quantity ?></td>
        </tr>
      </table>
      <?php
  }
}
?>


<!-- Attendee Seach Code Ends -->

<!-- Users who have purchased ticket-data view from database code starts -->

<table width="930" border="3" align="center">
<caption>Event Attendee Informations</caption>
        <tr>
          <th>AttendeeID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Gender</th>
          <th>Phone</th>
          <th>Email</th>
          <th>Ticket Type</th>
          <th>Quantity</th>
          <th align="center" class="modify-col">Modify</th>
        </tr>

        <?php

    include("db.php");
    $attendee_query = "SELECT * FROM attendee";

    $execute2 = mysqli_query($con, $attendee_query);

    while($DataRows1 = mysqli_fetch_array($execute2)){


      $aid = $DataRows1['AttendeeID'];
      $fname = $DataRows1["FirstName"];
      $lname = $DataRows1["LastName"];
      $gender = $DataRows1["Gender"];
      $phone = $DataRows1["Phone"];
      $email = $DataRows1["Email"];
      $ticket = $DataRows1["TicketType"];
      $quantity = $DataRows1["Quantity"];

    ?>
        <tr>
          <td><?php echo $aid ?></td>
          <td><?php echo $fname ?></td>
          <td><?php echo $lname ?></td>
          <td><?php echo $gender ?></td>
          <td><?php echo $phone ?></td>
          <td><?php echo $email ?></td>
          <td><?php echo $ticket ?></td>
          <td><?php echo $quantity ?></td>

          </td>
          <td align="center">
            <a href="attendee_remove.php?Delete=<?php echo $aid; ?>" class="delete-btn"
              >Delete</a
            >
          </td>
        </tr>

        <?php } ?>
      </table>

      <!-- Users who have purchased ticket-data view from database code ends -->

<!-- Attendee Code Section Ends -->






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
