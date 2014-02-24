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
              <li><a href="loginPage.php">Log out</a></li>
            </ul>
      </nav>
      <aside>
        	<h4>News Feed</h4>
      </aside>
  </div>

  <article class="content">
    
    <form method="post" action="comorbidity.php">
       

<p>
<label for='Gout'>Gout</label><br>

        <input name="Gout" type="radio" 

        value="Yes" checked="checked">

<span>Yes</span><br />

<input type="radio" name="Gout" 

value="No">

<span>No</span>
</p>

<p>
<label for='Heart_Failure'>Heart failure</label><br>

        <input name="Heart_Failure" type="radio" 

        value="Yes" checked="checked">

<span>Yes</span><br />

<input type="radio" name="Heart_Failure" 

value="No">

<span>No</span>
</p>

<p>
<label for='Whitecoat'>White coat hypertension</label><br>

        <input name="Whitecoat" type="radio" 

        value="Yes" checked="checked">

<span>Yes</span><br />

<input type="radio" name="Whitecoat" 

value="No">

<span>No</span>
</p>


          <p>
            <input type="submit" name="formSubmit" value="Submit">
          </p>
        </p>
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
