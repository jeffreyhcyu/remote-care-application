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
header('Location: https://3yp.villocq.com/doctor'); 
}
?>

<html>

<head>
<title>Cardiac Track Professional</title>
<link rel="stylesheet" type="text/css" href="Cardiac_Track_Style_Pro.css">
<script src="//code.jquery.com/jquery-1.10.2.js"></script>

      <!--this is the begining of the j query for the spurious bar-->
  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.9.1.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css">
  
 
  <!-- THIS IS THE MORE COMPLEX LABLED ONE  <script>
  $(function() {
    var progressbar = $( "#progressbar" ),
      progressLabel = $( ".progress-label" );
 
    progressbar.progressbar({
      value: false,
      change: function() {
        progressLabel.text( progressbar.progressbar( "4" ) + "%" );
      },
      complete: function() {
        progressLabel.text( "Complete!" );
      }
    });
    </script>
     <!--this is the end of the j query for the spurious bar-->
</head>
<div class="full_screen">

<div class="about_us_back">
</div>
<div class="about_us">
About Us
<p>This is our application which tracks blood pressure over time</p>
</div>
<!--Start of left hand of page-->

<div class="patient_selector">

<div id="patients">
Patients
</div>

<div id="alert">
<div id="alerted">
High BP
</div>
<div id="alert_height">

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
</div>

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
Normal
</div>
<div id="normal_height">
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
</div>
<script>
$( ".Identification" ).click(function() {
// 'Getting' data-attributes using dataset 
var idNum = this.getAttribute("data-idNo");
//var idNumber = idNum.dataset.idNo; // leaves = 47;
window.location.href = "index.php?w1=" + idNum;
});
</script>
<a href="https://3yp.villocq.com/doctor/newPatient.php" target="_blank">
<div class="menu">
Add New Patient
</div>
</a>
<a href="https://3yp.villocq.com/doctor/logout.php">
<div class="menu">
Log Out
</div>
</a>
<div class="menu">
Tutorial  
</div>
<div class="menu">
About Us  
</div>
<div class="menu">
Site Terms  
</div>
</div>
<!--End of left hand of page-->

<div id="graph_container">
<div class="subtitle">
Current User <?php echo $docInfo['prefix'] . ". " . $docInfo['firstName'] . " " . $docInfo['secondName'] ?>
</div>
<div id="chart_div" style="	position: relative;
	left: 200px;
	left: 15vw;
  top:100px;
	top:3.5vh;
  height:500px;
	height:48vh;
  width:1100px;
	width:58vw;
  opacity:0.9;
	filter:alpha(opacity=90); /* For IE8 and earlier */
	z-index: 5;"></div> 
</div>

<div id="info_container">
<div class="subtitle">
Patient Info
</div>
<table id="info_table">
<tr>
<td>
ID Number
</td>
<td><?php echo $_GET['w1']?><td>
</tr>
<tr>
<td>Age</td>
<td><?php echo $info['ageGroup'] ?></td>
</tr>
<tr>
<td>Last/Next review </td>
<td><?php echo $info['lastReview']; echo " - "; echo $info['nextReview'];?><td>
</tr>
<tr>
<td>Target BP</td>
<td>
<?php
    echo $info['targetSystolic'];
    echo "/";                    
    echo $info['targetDiastolic'];
?>
</td>
</tr>
<tr style="color:red;">
<td>Current BP</td>
<td>
<?php
    echo $BP['patientCurrentBPSystolic'];
    echo "/";                    
    echo $BP['patientCurrentBPDiastolic'];
?>
</td>
</tr>
<tr>
<script>
    $(function() {
        $( "#progressbar" ).progressbar(
        {
        value: <?php echo $flagno ?>*10
        });
        });
        /* 
        SHOULD WORK BUT HIDES THE PROGRESS BAR 
               $(document).ready(function(){
          $("button").click(function(){
            $.ajax({url:"clearFraud.php";
            }});
          });
        });
        
        $(function clearDBfraud(){
          
        });
        */
</script>
<td>Data Uncertainty</td>
<td>
<div id="progressbar"><div class="progress-label"><?php echo $flagno ?></div></div>
</td>
</tr>
<tr>
<td>Uncertainty Reset</td>
<td>
<button class="button" onClick="window.open('clearFraud.php');">Reset</button>
</td>
</tr>
<tr>
<td>Launch Tallis</td>
<td>
<button class="button" onClick="window.open('http://remote.villocq.com:8081/tallis-enactment-1.7.2/EnactFile.page?protocol=BPManager&pfdi_patientID=<?php echo $patientUsername; ?>');">Launch TWE</button>
</td>
</tr>
</table>
</div>


<div id="med_container">
<div class="subtitle">
Medication
</div>



<div class="med_table1">
Med 1
<table id="med_table">
<tr>
<td>
<?php echo $med['drug1'] ?>
</td>
</tr>
<tr>
<td>Class</td>
<td><?php echo $med['drug1class'] ?></td>
</tr>
<tr>
<td>Daily Dosage</td>
<td><?php echo $med['drug1prescription'] ?></td>
</tr>	
<tr>
<td>On Max Dosage</td>
<td><?php echo $med['isOnMaxDose'] ?></td>
</tr>
<tr>
<td>Time using drug</td>
<td></td> <!--NEED DB STUFF TO IMPLEMENT-->
</tr>
</table>
</div>

<div class="med_table2">
Med 2
<table id="med_table">
<tr>
<td>
<?php echo $med['drug2'] ?>
</td>
</tr>
<tr>
<td>Class</td>
<td><?php echo $med['drug2class'] ?></td>
</tr>
<tr>
<td>Daily Dosage</td>
<td><?php echo $med['drug2prescription'] ?></td>
</tr>	
<tr>
<td>On Max Dosage</td> <!--needs on for each-->
<td><?php echo $med['isOnMaxDose'] ?></td>
</tr>
<tr>
<td>Time using drug</td>
<td></td> <!--NEED DB STUFF TO IMPLEMENT-->
</tr>
</table>
</div>

<div class="med_table3">
Med 3
<table id="med_table">
<tr>
<td>
<?php echo $med['drug3'] ?>
</td>
</tr>
<tr>
<td>Class</td>
<td><?php echo $med['drug3class'] ?></td>
</tr>
<tr>
<td>Daily Dosage</td>
<td><?php echo $med['drug3prescription'] ?></td>
</tr>	
<tr>
<td>On Max Dosage</td> <!--needs on for each-->
<td><?php echo $med['isOnMaxDose'] ?></td>
</tr>
<tr>
<td>Time using drug</td>
<td></td> <!--NEED DB STUFF TO IMPLEMENT-->
</tr>
</table>
</div>

<div class="med_table4">
Med 4
<table id="med_table">
<tr>
<td>
<?php echo $med['drug4'] ?>
</td>
</tr>
<tr>
<td>Class</td>
<td><?php echo $med['drug4class'] ?></td>
</tr>
<tr>
<td>Daily Dosage</td>
<td><?php echo $med['drug4prescription'] ?></td>
</tr>	
<tr>
<td>On Max Dosage</td> <!--needs on for each-->
<td><?php echo $med['isOnMaxDose'] ?></td>
</tr>
<tr>
<td>Time using drug</td>
<td></td> <!--NEED DB STUFF TO IMPLEMENT-->
</tr>
</table>
</div>
</div>


</div>
</html>
