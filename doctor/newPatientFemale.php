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
header('Location: https://3yp.villocq.com/doctor/loginPage.php'); 
}
?>

<!doctype html>
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
<nav></nav>
      <section id="searchbar"></section>
  	</header>
    
    <div class="sidebar1">
		<nav>
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="currentpatients/index.php" target="_blank">Existing patients</a></li>
              <li><a href="newPatient.php">Add a new patient</a></li>
              <li><a href="logout.php">Log out</a></li>
            </ul>
      </nav>
            <aside>
      <div class="patient_selector">

<div id="alert">
<div id="alerted">
  <strong>Alerted patients:</strong> </div>


<?php
require("functions.php");
patientsidebar($doctorID);
?>

</div>
<br>

</div>
      </aside>
  </div>

  <article class="content">
  
  <h3>Add a new patient:</h3>
  
  <p>You have indicated that the patient is <strong>female</strong>.</p>
  <p>Please answer the following questions:</p>
  <form method="post" action="female.php">
          <table width="718" border="0" cellpadding="5">
            <tr>
            <td width="40" align="center"><strong>Yes</strong></td>
            <td width="40" align="center"><strong>No</strong></td>
            <td width="600"></td>
            </tr>
            <tr>
              <td align="center"><input name="breastfeed" type="radio"  value="Yes"></td>
              <td align="center"><input type="radio" name="breastfeed" value="No" checked></td>
              <td>Is the patient currently breastfeeding?</td>
            </tr>
            <tr>
              <td align="center"><input name="future_pregnancy" type="radio" value="Yes"></td>
              <td align="center"><input type="radio" name="future_pregnancy" value="No" checked></td>
              <td>Is the patient looking to become pregnant in the next 12 months?</td>
            </tr>
          </table>
<br>
<input type="submit" name="formSubmit" value="Submit">
  </form>
    
    
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
