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
              <td>'White coat' hypertension</td>
              <td align="center"><input name="Whitecoat" type="radio" value="Yes"></td>
              <td align="center"><input name="Whitecoat" type="radio" value="No" checked></td>
            </tr>  
    
	    <tr>
              <td>Target organ damage due to hypertension</td>
              <td align="center"><input name="OrgDamage" type="radio" value="Yes"></td>
              <td align="center"><input name="OrgDamage" type="radio" value="No" checked></td>
            </tr>
    
	    <tr>
              <td>History of postural hypotension and micturition syncope</td>
              <td align="center"><input name="Postural_hypotension" type="radio" value="Yes"></td>
              <td align="center"><input name="Postural_hypotension" type="radio" value="No" checked></td>
            </tr>
    
	    
	    <tr>
              <td>Calcium channel blocker (CCB) intolerance</td>
              <td align="center"><input name="CCB" type="radio" value="Yes"></td>
              <td align="center"><input name="CCB" type="radio" value="No" checked></td>
            </tr>
    
	    <tr>
              <td>Already on a beta-blocker for an indication other than hypertension</td>
              <td align="center"><input name="BB_already" type="radio" value="Yes"></td>
              <td align="center"><input name="BB_already" type="radio" value="No" checked></td>
            </tr>
    
	    <tr>
              <td>History of angioedema associated with previous exposure to an ACE inhibitor</td>
              <td align="center"><input name="angio_expose" type="radio" value="Yes"></td>
              <td align="center"><input name="angio_expose" type="radio" value="No" checked></td>
            </tr>
    
	    <tr>
              <td>Hereditary or idiopathic angioedema</td>
              <td align="center"><input name="angio_hered" type="radio" value="Yes"></td>
              <td align="center"><input name="angio_hered" type="radio" value="No" checked></td>
            </tr>
    
	    <tr>
              <td>Cardiac outflow obstruction</td>
              <td align="center"><input name="COO" type="radio" value="Yes"></td>
              <td align="center"><input name="COO" type="radio" value="No" checked></td>
            </tr>
    
	    <tr>
              <td>Clinically-apparent cardiovascular disease (CVD)</td>
              <td align="center"><input name="CVD" type="radio" value="Yes"></td>
              <td align="center"><input name="CVD" type="radio" value="No" checked></td>
            </tr>
    
	    <tr>
              <td>10 year CVD risk of 20% or greater</td>
              <td align="center"><input name="CVDrisk" type="radio" value="Yes"></td>
              <td align="center"><input name="CVDrisk" type="radio" value="No" checked></td>
            </tr>
    
	    <tr>
              <td>Higher degree atrioventricular block</td>
              <td align="center"><input name="HDAB" type="radio" value="Yes"></td>
              <td align="center"><input name="HDAB" type="radio" value="No" checked></td>
            </tr>
    
	    <tr>
              <td>Previous myocardial infarction (MI) without heart failure</td>
              <td align="center"><input name="MI" type="radio" value="Yes"></td>
              <td align="center"><input name="MI" type="radio" value="No" checked></td>
            </tr>
    
	    <tr>
              <td>Heart failure</td>
              <td align="center"><input name="Heart_failure" type="radio" value="Yes"></td>
              <td align="center"><input name="Heart_failure" type="radio" value="No" checked></td>
            </tr>
    
	    <tr>
              <td>High risk of heart failure</td>
              <td align="center"><input name="HFRisk" type="radio" value="Yes"></td>
              <td align="center"><input name="HFRisk" type="radio" value="No" checked></td>
            </tr>
    
	    <tr>
              <td>Angina</td>
              <td align="center"><input name="angina" type="radio" value="Yes"></td>
              <td align="center"><input name="angina" type="radio" value="No" checked></td>
            </tr>
    
	    <tr>
              <td>High risk of developing diabetes</td>
              <td align="center"><input name="DiabRisk" type="radio" value="Yes"></td>
              <td align="center"><input name="DiabRisk" type="radio" value="No" checked></td>
            </tr>
    
	    <tr>
              <td>Gout</td>
              <td align="center"><input name="Gout" type="radio" value="Yes"></td>
              <td align="center"><input name="Gout" type="radio" value="No" checked></td>
            </tr>
    
	    <tr>
              <td>Diuretic intolerance</td>
              <td align="center"><input name="Diuretic_suitable" type="radio" value="Yes"></td>
              <td align="center"><input name="Diuretic_suitable" type="radio" value="No" checked></td>
            </tr>
    
	    <tr>
              <td>Hepatic impairment</td>
              <td align="center"><input name="HepImp" type="radio" value="Yes"></td>
              <td align="center"><input name="HepImp" type="radio" value="No" checked></td>
            </tr>
    
	    <tr>
              <td>Renal impairment</td>
              <td align="center"><input name="RenImp" type="radio" value="Yes"></td>
              <td align="center"><input name="RenImp" type="radio" value="No" checked></td>
            </tr>
    
	    <tr>
              <td>Renal disease</td>
              <td align="center"><input name="renal" type="radio" value="Yes"></td>
              <td align="center"><input name="renal" type="radio" value="No" checked></td>
            </tr>
    
	    <tr>
              <td>Known or suspected renovascular disease</td>
              <td align="center"><input name="renovascular" type="radio" value="Yes"></td>
              <td align="center"><input name="renovascular" type="radio" value="No" checked></td>
            </tr>
    
	    <tr>
              <td>Bilateral renal artery stenosis</td>
              <td align="center"><input name="stenosis" type="radio" value="Yes"></td>
              <td align="center"><input name="stenosis" type="radio" value="No" checked></td>
            </tr>
    
	    <tr>
              <td>Gastrointestinal obstruction, oesophageal obstruction, or any degree of stricture</td>
              <td align="center"><input name="Stricture" type="radio" value="Yes"></td>
              <td align="center"><input name="Stricture" type="radio" value="No" checked></td>
            </tr>
    
	    <tr>
              <td>Oedema</td>
              <td align="center"><input name="oedema" type="radio" value="Yes"></td>
              <td align="center"><input name="oedema" type="radio" value="No" checked></td>
            </tr>
    
	    <tr>
              <td>Blood potassium level > 4.5mmol/L</td>
              <td align="center"><input name="High_blood_k" type="radio" value="Yes"></td>
              <td align="center"><input name="High_blood_k" type="radio" value="No" checked></td>
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
