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
  	<header><a href="index.php"><img src="images/logo.png" width="600" height="31" alt=""/></a>
  	  <label for="search2">Patient ID:</label>
      <input type="search" name="search2" id="search2">
      <input type="button" name="button2" id="button2" value="Search" onClick="location.href='existingPatients.php'">
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

<div id="patients">
  <em><strong>Patients</strong></em> </div>
<div id="alert">
<div id="alerted">
  <strong>High BP</strong> </div>


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

$result5 = mysql_query("SELECT id, patientID FROM patientInfo WHERE BPcontrolled='Yes' AND doctorID='$doctorID'");
$num5 = mysql_num_rows($result5);

$current=$_GET["w1"]; //This is the current patient ID number selected on the left side

if (empty($current)) //Default case if no patient selected
{
    $current = "0";
}

$result2 = mysql_query("SELECT * FROM patientDrugs WHERE id=$current");
$med = mysql_fetch_array($result2);

$result3 = mysql_query("SELECT * FROM patientInfo WHERE id=$current");
$info=mysql_fetch_array($result3);

$result6 = mysql_query("SELECT * FROM doctorInfo WHERE id=$doctorID");
$docInfo=mysql_fetch_array($result6);

$result7 = mysql_query("SELECT b.patientCurrentBPSystolic,b.patientCurrentBPDiastolic,b.number
                       FROM patientCurrentBP AS b JOIN patientInfo AS i on b.patientID=i.patientID WHERE i.id='$current'
                       ORDER BY b.number DESC LIMIT 1");
$BP=mysql_fetch_array($result7);
                       
//This section sets a global session variable with the selected patientUsername
//This is used for the LinReg checking. $_SESSION is used in linreg!
$result8 = mysql_query("SELECT patientID FROM patientInfo WHERE id = '$current'");
$result8array=mysql_fetch_array($result8);
$patientUsername = $result8array['patientID'];
$_SESSION['patientUsername'] = $patientUsername;

// Include the linreg.php file. linear_regression is a function that returns the current flag value.

require("linreg.php");
$flagno = linear_regression($patientUsername);

?>

<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable(
		<?php

		// This PHP getes the chart data
		

		// Configure the MySQL connection
		$username="3yp";
		$DBpassword="project";
		$database="tallis";

		mysql_connect('remote.villocq.com:3306',$username,$DBpassword);
		@mysql_select_db($database);

		$current=$_GET["w1"];

		//Perform the SQL Query
		$SQLQuery = "SELECT b.date, b.patientCurrentBPSystolic, b.patientCurrentBPDiastolic
	    FROM patientCurrentBP AS b JOIN patientInfo AS i ON b.patientID=i.patientID WHERE i.id='$current'";

		$result4 = mysql_query($SQLQuery);
		$num = mysql_num_rows($result4);


		//This builds an array that contains the BP values. This array is then used by the javascript to make the chart.
		//Source code below provided by: http://www.kometschuh.de/GoogleChartToolswithJSON.html
		$data[0] = array('day','SystolicBP','DiastolicBP');		
		for ($i=1; $i<($num+1); $i++)
		{
		    $data[$i] = array(substr(mysql_result($result4, $i-1, "date"), 0, 10),
		    		(int) mysql_result($result4, $i-1, "patientCurrentBPSystolic"),
				(int) mysql_result($result4, $i-1, "patientCurrentBPDiastolic") );
		}

		echo json_encode($data);


		mysql_close();

		?>
    );

        var options = {
          //title: 'Blood Pressure',
          //titleTextStyle: {color: 'red', fontSize: '40', fontName: 'arial' },
          //chartArea.top: '30',
          //backgroundColor.stroke: {#80807D},
          //vAxis.baselineColor: 'red',
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
         
      }
    </script>

</div>

<div id="normal">
<div id="normaled">
  <strong>Normal </strong></div>
<?php
while($row5 = mysql_fetch_array($result5))
  {
  echo '<div class="Npatient" data-idNo=' . $row5['id']. '>'; //inserted the data tag data-id
  echo '<div class="Identification" data-idNo=' . $row5['id']. '>';
  echo $row5['patientID'] . " id:" . $row5['id'];
  echo '</div>';
  echo '</div>';
  }
?>
</div>

<script>
$( ".Identification" ).click(function() {
// 'Getting' data-attributes using dataset 
var idNum = this.getAttribute("data-idNo");
//var idNumber = idNum.dataset.idNo; // leaves = 47;
window.location.href = "index.php?w1=" + idNum;
});
</script>

</div>
      </aside>
  </div>

  <article class="content">
    
    <h3>Welcome, <?php require("functions.php"); $doctorName = doctorname($doctorID); echo $doctorName;?></h3>
    
    <section>
      <h4>How to use this site:</h4>
      <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. </p>
    </section>
    
    <section>
      <h4>Manage patients:</h4>
      <p>Search for an existing patient using their patient ID</p>
      <p>
        <label for="search">Patient ID:</label>
        <input type="search" name="search" id="search">
        <input type="button" name="button" id="button" value="Search" onClick="location.href='existingPatients.php'">
      </p>
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
