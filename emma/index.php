<?php

// Check the person is logged in!
session_start();    
if (isset($_SESSION['userID']))
{
    //Continue to the page
    // This sets the current user ID as php variable!
    $doctorID = $_SESSION['userID'];
}
else
{
    //Login Failure
header('Location: https://3yp.villocq.com/emma/loginPage.php'); 
}
?>

<?php
//Database connection to get all the patient data out
$username="3yp";
$DBpassword="project";
$database="tallis";

mysql_connect('remote.villocq.com:3306',$username,$DBpassword);
@mysql_select_db($database);
?>


<html>
<head>
<meta charset="utf-8">
<title>Cardiac Track Pro - Home</title>

<link href="styles/style.css" rel="stylesheet" type="text/css">
<body>

<div class="container">
  	<header><a href="index.php"><img src="images/logo.png" width="600" height="31" alt=""/></a>
  	  <label for="search2">Patient ID:</label>
      <input type="search" name="search2" id="search2">
      <input type="button" name="button2" id="button2" value="Search" onClick="location.href='existingPatients.php'">
    <section id="searchbar"></section>
  	</header>
    
    <div class="sidebar1">
		<nav>
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="existingPatients.php">Existing patients</a></li>
              <li><a href="newPatient.php">Add a new patient</a></li>
              <li><a href="loginPage.php">Log out</a></li>
            </ul>
      </nav>
      <aside>
        	<h4>News Feed</h4>
      </aside>
  </div>

  <article class="content">
    
    <h3>Welcome, <?php echo "Need dynamic content here!"; ?></h3>
    
    <section>
      <h4>How to use this site:</h4>
      <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. </p>
    </section>
    
    <section>
      <h4>Manage patients:</h4>
      <p>Search for an existing patient using their patient ID</p>
      <p>
        <label for="search">Patient ID:</label>
        <input type="search" name="search" id="search">
        <input type="button" name="button" id="button" value="Search" onClick="location.href='existingPatients.php'">
      </p>
      <p>Or click here to create a <a href="newPatient.php">new patient profile</a></p>
    </section>
    
    
  </article>
  <div class="push"></div>
</div>  
  
  <footer class="footer">
	<ul>
          <a href="siteTerms.html"><li>Site Terms</li></a>
          <a href="aboutUs.html"><li>About Us</li></a>
	</ul>
  </footer>    


</body>
</html>
