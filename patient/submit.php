<?php

// Php code for handling the BP submission form

session_start();

// Configure the MySQL connection
$server='remote.villocq.com';
$username="3yp";
$DBpassword="project";
$database="tallis";

// New MySQLi Instance
$db = new mysqli($server,$username,$DBpassword,$database);

//Assign the form POST output to PHP variables
$id=$_SESSION['userID'];
$sysBP=$_POST['sysBP'];
$diaBP=$_POST['diaBP'];

//Prepared statement
$submit = $db->prepare("INSERT INTO patientCurrentBP VALUES ('',now(),?,?,?)");

//Bind & Execute to submit to database
$submit->bind_param('sss',$id,$sysBP,$diaBP);
$submit->execute();
// Data has now been submitted!


//// Below code handles the BP target checking ////

//Get the patient's target Systolic BP:
//Prepared statement
$getSystolic = $db->prepare("SELECT targetSystolic FROM patientInfo WHERE patientID=?");
//Execute and get result
$getSystolic->bind_param('s',$id);
$getSystolic->execute();
$getSystolic->bind_result($targetSystolic);
$getSystolic->fetch();
$getSystolic->close();

//Get the patient's target Diastolic BP:
//Prepared statement
$getDiastolic = $db->prepare("SELECT targetDiastolic FROM patientInfo WHERE patientID=?");
//Execute and get result
$getDiastolic->bind_param('s',$id);
$getDiastolic->execute();
$getDiastolic->bind_result($targetDiastolic);
$getDiastolic->fetch();
$getDiastolic->close();

//Date checking. $DaysElapsed is days betwwen first BP reading in the database and today.
// ==>> NB! Need to think of a way to reset the count when secondary treatment is enacted!
//Get earliest date that data was submitted:
//Prepared statement
$getDate = $db->prepare("SELECT min(date) FROM patientCurrentBP WHERE patientID=?");
//Execute & get
$getDate->bind_param('s',$id);
$getDate->execute();
$getDate->bind_result($earliestDate);
$getDate->fetch();
$getDate->close();

//Now get a difference in days between earliestDate and today:
//Prepared statement
$dateDiff = $db->prepare("SELECT DATEDIFF(now(),?) AS date_difference");
//Execute & get
$dateDiff->bind_param('s',$earliestDate);
$dateDiff->execute();
$dateDiff->bind_result($daysElapsed);
$dateDiff->fetch();
$dateDiff->close();

//Decision Logic for the target BP checking
//
// First check if 30 days has elapsed:
if ($daysElapsed < 30)
    {
    $daysRemaining=30-$daysElapsed;
    header("Location: https://3yp.villocq.com/patient/pending.php"); 
    $_SESSION['daysRemaining'] = $daysRemaining;
    }
    
else
    {
    // If Systolic is high:
    if ($targetSystolic < $sysBP)
	{  
	echo "Your Systolic BP is too high.";
	echo "<br>";
        $flag = "No"; //i.e bp not controlled
	}
    
    //If Diastolic is high:
    if ($targetDiastolic < $diaBP)
	{  
	echo "Your Diastolic BP is too high.";
	echo "<br>";
        $flag = "No";
	}

    //If BP is lower than target on both:
    if ($targetSystolic >= $sysBP AND $targetDiastolic >= $diaBP)
	{
        $flag = "Yes"; //i.e. bp is controlled
        }
    
    //Now submit the flag to the database.
    //The flag is:BPcontrolled=yes/no
    
    //Prepared statement
    $setFlag = $db->prepare("UPDATE patientInfo SET BPcontrolled=? WHERE patientID=?");
    //Execute
    $setFlag->bind_param('ss',$flag,$id);
    $setFlag->execute();
    
    //If a flag is set for high BP, refer to doctor. Otherwise send to 'success' page:
    if ($flag == "No") //Reminder: no = BP NOT controlled
        { 
        header("Location: https://3yp.villocq.com/patient/alert.php"); //Send to alert page
        }
    else
        {
        header("Location: https://3yp.villocq.com/patient/continue_Cardiac_track2.html"); //Send to continue page
        }
    }
    
$db->close();
?>