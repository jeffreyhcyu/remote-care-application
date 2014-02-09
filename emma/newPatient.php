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
<title>Cardiac Track Pro - Add a new patient</title>

<link href="styles/style.css" rel="stylesheet" type="text/css">
<body>

<div class="container">
  	<header><a href="index.php"><img src="images/logo.png" width="600" height="31" alt=""/></a>
  	  <label for="search2">Patient ID:</label>
      <input type="search" name="search2" id="search2">
      <input type="button" name="button2" id="button2" value="Search" onClick="location.href='existingPatients.php'">
<nav></nav>
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
    
    <h3>Add a new patient:</h3>
    
    <section>
      <p>Is patient suitable? Please tick all that apply. </p>
      <p>&nbsp;</p>
    </section>
    
    <section>
      <form id="form1" name="form1" method="post">
        <table width="540">
          <tr>
            <td><label>
              <input type="checkbox" name="disclaimer" value="checkbox" id="disclaimer_0">
              Patient has been diagnosed with Type I or Type II diabetes</label></td>
          </tr>
          <tr>
            <td><label>
              <input type="checkbox" name="disclaimer" value="checkbox" id="disclaimer_1">
              Patient is in a state of hypertensive crisis</label></td>
          </tr>
          <tr>
            <td><label>
              <input type="checkbox" name="disclaimer" value="checkbox" id="disclaimer_2">
              Patient has secondary hypertension</label></td>
          </tr>
          <tr>
            <td><label>
              <input type="checkbox" name="disclaimer" value="checkbox" id="disclaimer_3">
              Patient is pregnant</label></td>
          </tr>
          <tr>
            <td><label>
              <input type="checkbox" name="disclaimer" value="checkbox" id="disclaimer_4">
              Patient is younger than 18 years of age</label></td>
          </tr>
        </table>
<section id="submit">
<br>
        <input type="button" name="next" id="next" value="Next" onClick="location.href='newPatientDetails.php'">
        </section>
      </form>
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
