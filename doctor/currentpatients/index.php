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
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script>

$(document).ready(function(){

  $(".menu_About_Us").click(function(){
  $(".about_us").show();
  $(".cross").show();
  $(".about_us_back").show();
  $(".about_us>p").show();
  });

  $(".cross").click(function(){
  $(".about_us").hide();
  $(".cross").hide();
  $(".about_us_back").hide();
  $(".about_us>p").hide();
  });

  $(".menu_Site_Terms").click(function(){
  $(".site_terms").show();
  $(".cross").show();
  $(".about_us_back").show();
  $(".site_terms>p").show();
  });

  $(".cross").click(function(){
  $(".site_terms").hide();
  $(".cross").hide();
  $(".about_us_back").hide();
  $(".site_terms>p").hide();
  });  

  $(".menu_Tutorial").click(function(){
  $(".Tutorial_1").show();
  $(".close").show();
  $(".about_us_back").show();
  $(".next1").show();
  $(".Tutorial_1>p").show();
  });

  $(".close1").click(function(){
  $(".Tutorial_1").hide();
  $(".close1").hide();
  $(".about_us_back").hide();
  $(".next1").hide();
  $(".Tutorial_1>p").hide();
  }); 

  $(".next1").click(function(){
  $(".Tutorial_2").show();
  $(".Tutorial_1").hide();
  $(".close2").show();
  $(".Tutorial_2_back").show();
  $(".Tutorial_2_back_b").show();
  $(".next2").show();
  $(".Tutorial_2>p").show();
  $(".about_us_back").hide();
  $(".next1").hide();
  $(".Tutorial_1>p").hide();
  $(".close1").hide();
  });

  $(".close2").click(function(){
  $(".Tutorial_2").hide();
  $(".close2").hide();
  $(".Tutorial_2_back").hide();
  $(".Tutorial_2_back_b").hide();
  $(".next2").hide();
  $(".Tutorial_2>p").hide();
  }); 

  $(".next2").click(function(){
  $(".Tutorial_3").show();
  $(".Tutorial_2").hide();
  $(".close3").show();
  $(".Tutorial_3_back").show();
  $(".Tutorial_3_back_b").show();
  $(".next3").show();
  $(".Tutorial_3>p").show();
  $(".Tutorial_2_back").hide();
  $(".Tutorial_2_back_b").hide();
  $(".next2").hide();
  $(".Tutorial_2>p").hide();
  $(".close2").hide();
  });

  $(".close3").click(function(){
  $(".Tutorial_3").hide();
  $(".close3").hide();
  $(".Tutorial_3_back").hide();
  $(".Tutorial_3_back_b").hide();
  $(".next3").hide();
  $(".Tutorial_3>p").hide();
  });

  $(".next3").click(function(){
  $(".Tutorial_4").show();
  $(".Tutorial_3").hide();
  $(".close4").show();
  $(".Tutorial_4_back").show();
  $(".Tutorial_4_back_b").show();
  $(".next4").show();
  $(".Tutorial_4>p").show();
  $(".Tutorial_3_back").hide();
  $(".Tutorial_3_back_b").hide();
  $(".next3").hide();
  $(".Tutorial_3>p").hide();
  $(".close3").hide();
  });

  $(".close4").click(function(){
  $(".Tutorial_4").hide();
  $(".close4").hide();
  $(".Tutorial_4_back").hide();
  $(".Tutorial_4_back_b").hide();
  $(".next4").hide();
  $(".Tutorial_4>p").hide();
  });

  $(".next4").click(function(){
  $(".Tutorial_5").show();
  $(".Tutorial_5").hide();
  $(".close5").show();
  $(".Tutorial_5_back").show();
  $(".Tutorial_5_back_b").show();
  $(".next5").show();
  $(".Tutorial_5>p").show();
  $(".Tutorial_4_back").hide();
  $(".Tutorial_4_back_b").hide();
  $(".next4").hide();
  $(".Tutorial_4>p").hide();
  $(".close4").hide();
  });
});
</script>

</head>
<div class="full_screen">

<div class="Tutorial_2_back">
</div>
<div class="Tutorial_2_back_b">
</div>

<div class="Tutorial_3_back">
</div>
<div class="Tutorial_3_back_b">
</div>

<div class="Tutorial_4_back">
</div>
<div class="Tutorial_4_back_b">
</div>

<div class="Tutorial_5_back">
</div>
<div class="Tutorial_5_back_b">
</div>

<div class="about_us_back">
</div>

<div class="about_us">
<div class="cross">
X
</div>
About Us
<p>This is our application which tracks blood pressure over time. This can be used to aid the treatment of primary hypertension in your patients. </p>
</div>

<div class="site_terms">
<div class="cross">
X
</div>
Site Terms 
<p>This needs to be filled with a legal disclaimer. Which highlights the fact we dont hold any liability when it comes to persrciptions.</p>
</div>

<div class="Tutorial_1">
<div class="close1">
Close
</div>
<div class="next1"> <!--dont know where this has diasppered to-->
Next >
</div>
Tutorial 
<p>This is a short tutorial to describe the main functions of Cardiac Track Pro to help you understand and best utlise the features it has to offer. Click next to proceed or click close to stop the tutorial at any time.</p>
</div>

<div class="Tutorial_2">
<div class="close2">
Close
</div>
<div class="next2">
Next >
</div>
Patient Selector 
<p>This is where you can select the data for each of your patients. They have been separated into two categories, Alerted and Normal. Those in the Alerted section have reached their review time or breached their BP target for either Systolic or Diastolic. Any can be simply selected by scrolling and clicking the patient whoes data you wish to see.</p>
</div>

<div class="Tutorial_3">
<div class="close3">
Close
</div>
<div class="next3">
Next >
</div>
Menu
<p>This is where you can add new patients that you wish to use the application, log out from the application (we suggest you do this every time you leave the application).This is also where you can find out some more information about Cardiac Track Pro. If you ever need a recap of this tutorial it is also here.</p>
</div>

<div class="Tutorial_4">
<div class="close4">
Close
</div>
<div class="next4">
Next >
</div>
Graph 
<p>This shows the graphical representation of how the selected patients, Systolic and Diastolic blood pressure varies over time. This can be used as an persrciption aid, however please individually assess each patients data uncertainty to help this see the data uncertainity metric.</p>
</div>

<div class="Tutorial_5">
<div class="close5">
Close
</div>
<div class="next5">
Next >
</div>
Medication 
<p>This shows what medication the patient is currently taking, what dose they are currently on wether this is the maximum does or not and the time they have been using this drug. The medication option will update when a Tallis review has been undertaken for the patient (see </p>
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
<div class="menu_Tutorial">
Tutorial  
</div>
<div class="menu_About_Us">
About Us  
</div>
<div class="menu_Site_Terms">
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
<div id="progressbar"><?php echo $flagno ?><div class="progress-label"><?php echo $flagno ?></div></div>
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
