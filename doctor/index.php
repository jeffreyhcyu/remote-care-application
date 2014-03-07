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
<title>Cardiac Track Pro - Home</title>

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
              		<li><a href="currentpatients/index.php">Existing patients</a></li>
              		<li><a href="newPatient.php">Add a new patient</a></li>
              		<li><a href="logout.php">Log out</a></li>
            		</ul>
 
	
            </nav>
		
      <aside>
      <div class="patient_selector">

	<div id="alert">
	<div id="alerted">
 		 <strong>Alerted patients:</strong>
	</div>

			<?php require("functions.php"); patientsidebar($doctorID);?>

</div>
<br>

</div>
      </aside>
  </div>

  <article class="content">
    
    <h3>Welcome, <?php $doctorName = doctorname($doctorID); echo $doctorName;?></h3>
    
    <section>
      <p>This is the <i>Cardiac Track Pro</i> portal. Here, you can monitor your patients' progress and update their treatment.     </p>
    </section>
<br>
    <section> </section>
    <section>
      <h4>Manage patients:</h4>
      <p>Search for an existing patient using their patient ID</p>
      <form name="input" action="currentpatients/index.php" method="get">
        <p>User ID: <input type="text" name="w1"><input type="submit" value="Submit"></p>
  </form>
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
