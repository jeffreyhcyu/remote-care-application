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
  $(".Tutorial_4").hide();
  $(".close5").show();
  $(".Tutorial_5_back").show();
  $(".Tutorial_5_back_b").show();
  $(".Tutorial_5_back_c").show();
  $(".next5").show();
  $(".Tutorial_5>p").show();
  $(".Tutorial_4_back").hide();
  $(".Tutorial_4_back_b").hide();
  $(".next4").hide();
  $(".Tutorial_4>p").hide();
  $(".close4").hide();
  });

  $(".close5").click(function(){
  $(".Tutorial_5").hide();
  $(".close5").hide();
  $(".Tutorial_5_back").hide();
  $(".Tutorial_5_back_b").hide();
  $(".Tutorial_5_back_c").hide();
  $(".next5").hide();
  $(".Tutorial_5>p").hide();
  });

  $(".next5").click(function(){
  $(".Tutorial_6").show();
  $(".Tutorial_5").hide();
  $(".close6").show();
  $(".Tutorial_6_back").show();
  $(".Tutorial_6_back_b").show();
  $(".Tutorial_6_back_c").show();
  $(".next6").show();
  $(".Tutorial_6>p").show();
  $(".Tutorial_5_back").hide();
  $(".Tutorial_5_back_b").hide();
  $(".Tutorial_5_back_c").hide();
  $(".next5").hide();
  $(".Tutorial_5>p").hide();
  $(".close5").hide();
  });

  $(".next6").click(function(){
  $(".Tutorial_6").hide();
  $(".Tutorial_6_back").hide();
  $(".Tutorial_6_back_b").hide();
  $(".Tutorial_6_back_c").hide();
  $(".next6").hide();
  $(".Tutorial_6>p").hide();
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
<div class="Tutorial_5_back_c">
</div>

<div class="Tutorial_6_back">
</div>
<div class="Tutorial_6_back_b">
</div>
<div class="Tutorial_6_back_c">
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
<!--start add of site terms-->
<h3>Site terms</h3><br>

<p>This site provides pharmacological therapy advice in line with the following references:</p>
<p>&nbsp;</p>

<ul>
  <li><a href="http://publications.nice.org.uk/hypertension-cg127">National Institute for Health and Clinical  Excellence (NICE). Hypertension: clinical management of primary hypertension in adults. Clinical Guideline 127. London: NICE; 2011</a></li>
    <li><a href="http://healthguides.mapofmedicine.com/choices/pdf/hypertension2.pdf">Map of Medicine Health Guides. Hypertension - pharmacological therapy. 2012</a></li>
</ul>

<br>

<p>Out of scope of application:</p>
<p>&nbsp;</p>

<ul>
  <li>hypertension in children</li>
  <li>hypertension in pregnancy</li>
  <li>hypertension in patients with diabetes</li>
  <li>specialist management of secondary hypertension</li>
  <li>specialist management of hypertensive crises</li>
  </ul>
<h3>Terms &amp; Conditions for using this website</h3>
<p><br>
  BY ACCESSING, USING OR DOWNLOADING  MATERIALS FROM THIS WEB SITE YOU AGREE TO THE FOLLOWING TERMS &amp; CONDITIONS,  DISCLAIMER AND PRIVACY POLICY</p>
<p><br>
  If you do not agree with any of the following, do  not use this site or download any materials from it. If you have any further  questions about this Legal Notice or its implementation, please email via the  contact page. If we decide to change this Legal Notice, we will post those  changes on this page so that you are always aware of the terms under which you  may use this site, what information we collect, how we use it and in what  circumstances we disclose it.</p>
<h4><br>
  A. TERMS &amp; CONDITIONS</h4>
<p><br>
  <strong>1. Copyright Information</strong>&nbsp;Copyright and all other intellectual property  rights, in the material available on this site, is owned by CARDIAC TRACK and  third parties and may only be used in the ways described in this Legal Notice.  Except as otherwise indicated on this Web Site you may view, or download and  print a single copy of documents and graphics from this Web Site provided that:<br>
  (a) the material is used solely for research, personal or non-commercial  purposes;<br>
  (b) the material is not modified or altered in anyway; and<br>
  (c) you do not remove any part of this legal notice.<br>
  All other rights, title and interest not expressly granted herein are expressly  reserved. Accordingly, You are not permitted to copy, broadcast, download,  store (in any medium), transmit, show or play in public, adapt or change in any  way the content of this Web Site for any other purpose whatsoever without the  prior written permission of CARDIAC TRACK.</p>
<p><br>
  <strong>2. TradeMark Information</strong>&nbsp;All company, product or service names  referenced in this Web Site are used for identification purposes only and may  be trademarks of their respective owners. CARDIAC TRACK's trade marks may be  used only with permission from CARDIAC TRACK. Trademarks referenced in this Web  Site include but are not limited to:</p>
<ul>
  <li>Third Party trademarks - All other  brands and names are property of their respective owners.</li>
</ul>
<p><strong>3. Links to Other Sites</strong>&nbsp;Links and frames connecting this site with  other sites are for convenience only and do not mean that CARDIAC TRACK  endorses or approves those other sites, their content or any changes or updates  to such sites.</p>
<p><br>
  <strong>4. Confidential Information</strong>&nbsp;Except as expressly provided, any  non-personal information or material sent to CARDIAC TRACK will be deemed not  to be confidential. By sending CARDIAC TRACK any non-personal information or  material, you grant CARDIAC TRACK an unrestricted, irrevocable, royalty free,  perpetual licence to use, reproduce, display, perform, modify, transmit and  distribute those materials or information, and you also agree that CARDIAC  TRACK is free to use any ideas, concepts, know-how or techniques that you send  us for any purpose. However, we will not release your name or otherwise  publicise the fact that you submitted materials or other information to us  unless: (a) you grant us permission to do so; (b) we first notify you that the  materials or other information you submit to a particular part of a site will  be published or otherwise used with your name on it; or (c) we are required to  do so by law.</p>
<p><br>
  <strong>5. Cookies</strong>&nbsp;Cookies are small pieces of information that are stored  by your browser on your computer's hard drive, and enable CARDIAC TRACK to  provide features such as remembering your settings. Cookies can be deleted from  your hard drive if you wish. Most web browsers automatically accept cookies,  but you can change your browser settings to prevent that. This web site only  uses cookies when they are required for its proper working.</p>
<p><br>
  <strong>6.Governing Law &amp; Jurisdiction</strong>&nbsp;This Web Site (excluding linked  sites) is controlled by CARDIAC TRACK from its offices within the United  Kingdom. The interpretation, construction and effect of this Legal Notice and  Disclaimer shall be governed and construed in all respects in accordance with  the Laws of England. You and CARDIAC TRACK also agree to submit to the  exclusive jurisdiction of the English Courts.</p>
<h4><br>
  B. DISCLAIMER</h4>
<p><br>
  Except as expressly provided otherwise in an  agreement between you and CARDIAC TRACK, all information, software, products  and related graphics contained on this web site are provided &quot;as is&quot;  without warranty of any kind, either expressed or implied, including but not  limited to the implied warranties of satisfactory quality, fitness for a  particular purpose, title and non-infringement of third party intellectual  property rights.<br>
  In no event shall CARDIAC TRACK be liable for any  direct, indirect, incidental, special or consequential damages for loss of  profits, revenue, data or use incurred by you or any third party, whether in  action in contract, tort, or otherwise, arising from your access to, or use of,  this web site. CARDIAC TRACK make no representations about the suitability,  reliability, or timeliness, and accuracy of the information, software, products  and related graphics contained on this web site. CARDIAC TRACK reserves the  right to make improvements, changes or updates to this web site at any time  without notice.</p>
<h4><br>
  C. PRIVACY POLICY</h4>
<p><br>
  Personal information received by CARDIAC TRACK will  be kept in a secure manner and processed in accordance with the laws relating  to data protection.<br>
  Except as expressly provided, any non-personal  information or material sent to CARDIAC TRACK will be deemed not to be  confidential and will be dealt in accordance with paragraph A4 above.<br>
  We shall keep information that personally  identifies you or allows us to contact you (&quot;Personal Information&quot;)  confidential. We may, however, from time to time use your Personal Information  to contact you about new products and services which may be of interest to you  and for other related marketing purposes.<br>
  By using this site, you agree to the terms of the CARDIAC  TRACK privacy policy. If you do not agree to these terms, please do not use  this site.</p></font>
</div>
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
<p>This shows what medication the patient is currently taking, what dose they are currently on wether this is the maximum does or not and the time they have been using this drug. The medication option will update when a Tallis review has been undertaken for the patient (see the next tutorial step for details)</p>
</div>

<div class="Tutorial_6">
<div class="next6">
Finish >
</div>
Patient Info  
<p>This is where the basic data about the current patient can be found, their age when they have last been check in a surgery and the Target BP whihc has been set for them.
There is also a data uncertainity metric. This has been devised to see if the measurements that have been recorded by the patient themselves are infact feasible. Hence allowing 
you to make an informed decision about whether taking their home recoreded data into account when perscribing new drugs is correct. <!--The metric is based two statistical functions firstly 
on a linear regression. This is performed on the last 7 data points. An acceptable percentage error bound is set around this and any data points outside the bound increase the metric.
Secondly the correlation coefficient is calculated if this lies outside the set accepted range then the metric is further increased.-->
</p>
<p> The final button is to launch the tallis web enactment. This faccilitates the perscription suggestion part of the application. It collates the patient data to provide a new
medication suggestion, you are then required to set the new medication course for the patient and this will update the information shown to you on each patient.  
</p>
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
