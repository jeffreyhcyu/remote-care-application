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
              <li><a href="currentpatients/index.php">Existing patients</a></li>
              <li><a href="newPatient.php">Add a new patient</a></li>
              <li><a href="logout.php">Log out</a></li>
            </ul>
      </nav>
            <aside>
      <div class="patient_selector">

<div id="alert">
<div id="alerted">
  <strong>Alerted patients:</strong> </div><br>


<?php
//Database connection to get all the patient data out
$username="3yp";
$DBpassword="project";
$database="tallis";

mysql_connect('remote.villocq.com:3306',$username,$DBpassword);
@mysql_select_db($database);

$result = mysql_query("SELECT id, patientID FROM patientInfo WHERE BPcontrolled='No' AND doctorID='$doctorID'");
$num = mysql_num_rows($result);

while($row = mysql_fetch_array($result))
  {
  echo '<div class="Apatient" data-idNo=' . $row['id']. '>'; //inserted the data tag data-id
  echo '<div class="Identification" data-idNo=' . $row['id']. '>';
  echo $row['patientID'] . " id:" . $row['id'];
  echo '</div>';
  echo '</div>';
  }

?>

</div>
<br>

</div>
      </aside>
  </div>

  <article class="content">
    
    <h3>Add a new patient:</h3>

        <section>
      <p>Please enter the patient's details below: </p>
    </section>
    
    <section>
      <form action="details.php" method="post">
        <section id="submit">
          <p>&nbsp;          </p>
          <p>
            <label for="ageGroup">Age group:</label>
            <select name="ageGroup">
              <option value="18-54">18-54</option>
              <option value="55-79">55-79</option>
              <option value="80+">80+</option>
            </select>
          </p>
          <p>&nbsp;</p>

<p>
<label for='gender'>Sex:</label>
<input name="gender" type="radio" value="Male" checked="checked">
<span>Male</span>
<input type="radio" name="gender" value="Female">
<span>Female</span>
</p>

<p>&nbsp;</p>
<p>
  <label for='ethnicity'>Is the patient of Black African or Black Caribbean descent?</label>
  <input name="ethnicity" type="radio" value="Yes">
  <span>Yes</span>
  <input type="radio" name="ethnicity" value="No" checked>
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
