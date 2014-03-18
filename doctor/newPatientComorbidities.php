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
    <p>Please select all of the following comorbidities which apply:<br>
    </p>
    <form method="post" action="comorbidity.php">
      <table width="718" border="0" cellpadding="5">
        <tr>
          <td width="40" align="center"><strong>Yes</strong></td>
          <td width="40" align="center"><strong>No</strong></td>
          <td width="600"></td>
        </tr>
        
        <tr>
          <td align="center"><input name="Asthma" type="radio" value="Yes"></td>
          <td align="center"><input name="Asthma" type="radio" value="No" checked></td>
          <td>Asthma</td>
         </tr>
        
        <tr>
          
          <td align="center"><input name="Aspirin" type="radio" value="Yes"></td>
          <td align="center"><input name="Aspirin" type="radio" value="No" checked></td>
          <td>Patient is currently taking Aspirin</td>
         </tr>
        
        <tr>
          
          <td align="center"><input name="Whitecoat" type="radio" value="Yes"></td>
          <td align="center"><input name="Whitecoat" type="radio" value="No" checked></td>
          <td>'White coat' hypertension</td>            
        </tr>  
        
        <tr>
          <td align="center"><input name="OrgDamage" type="radio" value="Yes"></td>
          <td align="center"><input name="OrgDamage" type="radio" value="No" checked></td>
          <td>Target organ damage due to hypertension</td>
          </tr>
        
        <tr>
          <td align="center"><input name="Postural_hypotension" type="radio" value="Yes"></td>
          <td align="center"><input name="Postural_hypotension" type="radio" value="No" checked></td>
          <td>History of postural hypotension and micturition syncope</td>
          </tr>
        
        
        <tr>
          <td align="center"><input name="CCB" type="radio" value="Yes"></td>
          <td align="center"><input name="CCB" type="radio" value="No" checked></td>
          <td>Calcium channel blocker (CCB) intolerance</td>
          </tr>
        
        <tr>
          <td align="center"><input name="BB_already" type="radio" value="Yes"></td>
          <td align="center"><input name="BB_already" type="radio" value="No" checked></td>
          <td>Already on a beta-blocker for an indication other than hypertension</td>
          </tr>
        
        <tr>
          <td align="center"><input name="angio_expose" type="radio" value="Yes"></td>
          <td align="center"><input name="angio_expose" type="radio" value="No" checked></td>
          <td>History of angioedema associated with previous exposure to an ACE inhibitor</td>
          </tr>
        
        <tr>
          <td align="center"><input name="angio_hered" type="radio" value="Yes"></td>
          <td align="center"><input name="angio_hered" type="radio" value="No" checked></td>
          <td>Hereditary or idiopathic angioedema</td>
          </tr>
        
        <tr>
          <td align="center"><input name="COO" type="radio" value="Yes"></td>
          <td align="center"><input name="COO" type="radio" value="No" checked></td>
          <td>Cardiac outflow obstruction</td>
          </tr>
        
        <tr>
          <td align="center"><input name="CVD" type="radio" value="Yes"></td>
          <td align="center"><input name="CVD" type="radio" value="No" checked></td>
          <td>Clinically-apparent cardiovascular disease (CVD)</td>
          </tr>
        
        <tr>
          <td align="center"><input name="CVDrisk" type="radio" value="Yes"></td>
          <td align="center"><input name="CVDrisk" type="radio" value="No" checked></td>
          <td>10 year CVD risk of 20% or greater</td>
          </tr>
        
        <tr>
          <td align="center"><input name="HDAB" type="radio" value="Yes"></td>
          <td align="center"><input name="HDAB" type="radio" value="No" checked></td>
          <td>Higher degree atrioventricular block</td>
          </tr>
        
        <tr>
          <td align="center"><input name="MI" type="radio" value="Yes"></td>
          <td align="center"><input name="MI" type="radio" value="No" checked></td>
          <td>Previous myocardial infarction (MI) without heart failure</td>
          </tr>
        
        <tr>
          <td align="center"><input name="Heart_failure" type="radio" value="Yes"></td>
          <td align="center"><input name="Heart_failure" type="radio" value="No" checked></td>
          <td>Heart failure</td>
          </tr>
        
        <tr>
          <td align="center"><input name="HFRisk" type="radio" value="Yes"></td>
          <td align="center"><input name="HFRisk" type="radio" value="No" checked></td>
          <td>High risk of heart failure</td>
          </tr>
        
        <tr>
          <td align="center"><input name="angina" type="radio" value="Yes"></td>
          <td align="center"><input name="angina" type="radio" value="No" checked></td>
          <td>Angina</td>
          </tr>
        
        <tr>
          <td align="center"><input name="DiabRisk" type="radio" value="Yes"></td>
          <td align="center"><input name="DiabRisk" type="radio" value="No" checked></td>
          <td>High risk of developing diabetes</td>
          </tr>
        
        <tr>
          <td align="center"><input name="Gout" type="radio" value="Yes"></td>
          <td align="center"><input name="Gout" type="radio" value="No" checked></td>
          <td>Gout</td>
          </tr>
        
        <tr>
          <td align="center"><input name="Diuretic_suitable" type="radio" value="Yes"></td>
          <td align="center"><input name="Diuretic_suitable" type="radio" value="No" checked></td>
          <td>Diuretic intolerance</td>
          </tr>
        
        <tr>
          <td align="center"><input name="HepImp" type="radio" value="Yes"></td>
          <td align="center"><input name="HepImp" type="radio" value="No" checked></td>
          <td>Hepatic impairment</td>
          </tr>
        
        <tr>
          <td align="center"><input name="RenImp" type="radio" value="Yes"></td>
          <td align="center"><input name="RenImp" type="radio" value="No" checked></td>
          <td>Renal impairment</td>
          </tr>
        
        <tr>
          <td align="center"><input name="renal" type="radio" value="Yes"></td>
          <td align="center"><input name="renal" type="radio" value="No" checked></td>
          <td>Renal disease</td>
          </tr>
        
        <tr>
          <td align="center"><input name="renovascular" type="radio" value="Yes"></td>
          <td align="center"><input name="renovascular" type="radio" value="No" checked></td>
          <td>Known or suspected renovascular disease</td>
          </tr>
        
        <tr>
          <td align="center"><input name="stenosis" type="radio" value="Yes"></td>
          <td align="center"><input name="stenosis" type="radio" value="No" checked></td>
          <td>Bilateral renal artery stenosis</td>
          </tr>
        
        <tr>
          <td align="center"><input name="Stricture" type="radio" value="Yes"></td>
          <td align="center"><input name="Stricture" type="radio" value="No" checked></td>
          <td>Gastrointestinal obstruction, oesophageal obstruction, or any degree of stricture</td>
          </tr>
        
        <tr>
          <td align="center"><input name="oedema" type="radio" value="Yes"></td>
          <td align="center"><input name="oedema" type="radio" value="No" checked></td>
          <td>Oedema</td>
          </tr>
        
        <tr>
          <td align="center"><input name="High_blood_k" type="radio" value="Yes"></td>
          <td align="center"><input name="High_blood_k" type="radio" value="No" checked></td>
          <td>Blood potassium level > 4.5mmol/L</td>
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
