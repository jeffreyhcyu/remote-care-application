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
              <li><a href="existingPatients.php">Existing patients</a></li>
              <li><a href="newPatient.php">Add a new patient</a></li>
              <li><a href="logout.php">Log out</a></li>
            </ul>
      </nav>
      <aside>
        	<h4>News Feed</h4>
      </aside>
  </div>

  <article class="content">
    <h3>Add a new patient:</h3>
    <p>Please select all of the following comorbidities which apply:</p>
    <br>
    <form method="post" action="comorbidity.php">
 <table width="717" border="0" cellpadding="5">
            <tr>
            <td width="579"></td>
            <td width="50" align="center"><strong>Yes</strong></td>
            <td width="50" align="center"><strong>No</strong></td>
            </tr>
             <tr>
              <td>Gout</td>
              <td align="center"><input name="Gout" type="radio" value="Yes"></td>
              <td align="center"><input type="radio" name="Gout" value="No" checked></td>
            </tr>
            <tr>
              <td>Heart failure</td>
              <td align="center"><input name="Heart_failure" type="radio"  value="Yes"></td>
              <td align="center"><input type="radio" name="Heart_failure" value="No" checked></td>
            </tr>
            <tr>
              <td>White coat hypertension</td>
              <td align="center"><input name="Whitecoat" type="radio" value="Yes"></td>
              <td align="center"><input type="radio" name="Whitecoat" value="No" checked></td>
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
