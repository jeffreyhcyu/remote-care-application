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

// Configure the MySQL connection
$server="remote.villocq.com";
$username="3yp";
$DBpassword="project";
$database="tallis";

// New MySQLi Instance
$db = new mysqli($server,$username,$DBpassword,$database);

if($_POST['formSubmit'} == "Submit")
{
	$errorMessage = "";

		if(empty($_POST['ageGroup'])) 
        {
			$errorMessage .= "<li>Please select age group.</li>";
		}
		
		if(empty($_POST['gender'])) 
        {
		$errorMessage .= "<li>Please select a sex</li>";
		}


		if(empty($_POST['ethnicity'])) 

        {

		$errorMessage .= "<li>Please indicate if patient is of Black African or Black Caribbean descent.</li>";

		}


$varAgeGroup = $_POST['ageGroup'];

$varGender = $_POST['gender'];

$varEthnicity = $_POST['ethnicity'];


$sql = "INSERT INTO patientInfo (ageGroup, gender, ethnicity) VALUES (".

							PrepSQL($varAgeGroup) . ", " .

							PrepSQL($varGender) . ", " .

							PrepSQL($varEthnicity) . ", " .


			mysql_query($sql);

  // The user is directed to this page after completing the form. 
  // This code assumes that the thankyou form is in the same folder as the example form.
			
			header("Location: newPatientComorbidities.php");

			exit();

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
    
<?php

		    if(!empty($errorMessage)) 

		    {

			    echo("<p>There was an error with your form:</p>\n");

			    echo("<ul>" . $errorMessage . "</ul>\n");

            }

        ?>

        <section>
      <p>Patient is suitable. Please enter patient info. </p>
    </section>
    
    <section>
      <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <section id="submit">
          <p>
            <label for="ageGroup">Age group:</label>
            <select name="ageGroup">
	      <option value="">Select...</option>
              <option value="18-54"<? if($varAgeGroup=="18-54") echo(" selected=\"selected\"");?>18-54</option>
              <option value="55-79"<? if($varAgeGroup=="55-79") echo(" selected=\"selected\"");?>55-79</option>
              <option value="80+"<? if($varAgeGroup=="80+") echo(" selected=\"selected\"");?>80+</option>
            </select>
          </p>

<p>
<label for='gender'>Sex:</label>

        <input name="gender" type="radio" 

        value="Male" checked="checked"<? if($varGender=="Male") echo(" selected=\"selected\"");?>

        <span class="examplestyle">Male</span><br />

  <input type="radio" name="gender" 

  value="Female"<? if($varGender=="Female") echo(" selected=\"selected\"");?>
  <span class="examplestyle"> 

 Female
  </span>
</p>

<p>
<label for='ethnicity'>Is the patient of Black African or Black Caribbean descent?</label>

        <input name="ethnicity" type="radio" 

        value="Yes" checked="checked"<? if($varEthnicity=="Yes") echo(" selected=\"selected\"");?>

        <span class="examplestyle">Yes</span><br />

  <input type="radio" name="ethnicity" 

  value="No"<? if($varGender=="No") echo(" selected=\"selected\"");?>
  <span class="examplestyle"> 
No
  </span>
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
