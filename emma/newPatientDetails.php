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
      <p>Patient is suitable. Please enter patient info. </p>
    </section>
    
    <section>
      <form action="details.php" method="post">
        <section id="submit">
          <p>
            <label for="ageGroup">Age group:</label>
            <select name="ageGroup">
              <option value="18-54">18-54</option>
              <option value="55-79">55-79</option>
              <option value="80+">80+</option>
            </select>
          </p>

<p>
<label for='gender'>Sex:</label><br>

        <input name="gender" type="radio" 

        value="Male" checked="checked">

<span>Male</span><br />

<input type="radio" name="gender" 

value="Female">
<span>Female</span>
</p>

<p>
<label for='ethnicity'>Is the patient of Black African or Black Caribbean descent?</label><br>

        <input name="ethnicity" type="radio" 

        value="Yes" checked="checked">

<span>Yes</span><br />

<input type="radio" name="ethnicity" 

value="No">

<span>No</span>
</p>


          <br>
            <input type="submit" name="formSubmit" value="Submit">
          </p>



        </section>
      </form>
      <h3>&nbsp;</h3>
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
