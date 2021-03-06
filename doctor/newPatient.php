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

<html>
<head>
<meta charset="utf-8">
<title>Cardiac Track Pro - Add a new patient</title>

<link href="styles/style.css" rel="stylesheet" type="text/css">
<body>

<div class="container">
  	<header>
	<a href="index.php"><img src="images/logo.png" width="313" height="31" alt=""/></a>    	<form name="search" action="currentpatients/index.php" method="get">
  			<input type="text" name="w1" placeholder="Search by User ID" size="15">
			<input type="submit" value="Search">
    	</form>
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
    
    <section>
      <p>Before a new patient profile can be created, you must confirm that the patient meets the scope of this app. Please see <a href="siteTerms.html">site terms</a> for more information.</p>
      <p>Please tick all that apply:    </p>
    </section>
    
    <section>
      <form id="suitability" action="suitable.php" name="suitability" method="post">
        <table width="540">
          <tr>
            <td><label>
              <input type="checkbox" name="A" value="A" id="diabetes">
              Patient has been diagnosed with Type I or Type II diabetes</label></td>
          </tr>
          <tr>
            <td><label>
              <input type="checkbox" name="B" value="B" id="HTcrisis">
              Patient is in a state of hypertensive crisis</label></td>
          </tr>
          <tr>
            <td><label>
              <input type="checkbox" name="C" value="C" id="secondaryHT">
              Patient has secondary hypertension</label></td>
          </tr>
          <tr>
            <td><label>
              <input type="checkbox" name="D" value="D" id="pregnant">
              Patient is pregnant</label></td>
          </tr>
          <tr>
            <td><label>
              <input type="checkbox" name="E" value="E" id="young">
              Patient is younger than 18 years of age</label></td>
          </tr>
        </table>

     	<section id="submit">
	<br>
        <input type="submit" name="next" id="next" value="Next">
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
