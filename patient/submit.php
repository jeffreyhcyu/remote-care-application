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
$input_password=$_SESSION['userPassword'];
$sysBP=$_POST['sysBP'];
$diaBP=$_POST['diaBP'];

//Prepared statement
$submit = $db->prepare("INSERT INTO patientCurrentBP VALUES ('',now(),AES_ENCRYPT(?,?),AES_ENCRYPT(?,?),AES_ENCRYPT(?,?))");

//Bind & Execute to submit to database
$submit->bind_param('ssssss',$id,$input_password,$sysBP,$input_password,$diaBP,$input_password);
$submit->execute();
// Data has now been submitted!


//// Below code handles the BP target checking ////

//Get the patient's target Systolic BP:
//Prepared statement
$getSystolic = $db->prepare("SELECT AES_DECRYPT(patientTargetBPSystolic,?) FROM patientTargetBP WHERE AES_DECRYPT(patientID,?)=?");
//Execute and get result
$getSystolic->bind_param('sss',$input_password,$input_password,$id);
$getSystolic->execute();
$getSystolic->bind_result($targetSystolic);
$getSystolic->fetch();
$getSystolic->close();

//Get the patient's target Diastolic BP:
//Prepared statement
$getDiastolic = $db->prepare("SELECT AES_DECRYPT(patientTargetBPDiastolic,?) FROM patientTargetBP WHERE AES_DECRYPT(patientID,?)=?");
//Execute and get result
$getDiastolic->bind_param('sss',$input_password,$input_password,$id);
$getDiastolic->execute();
$getDiastolic->bind_result($targetDiastolic);
$getDiastolic->fetch();
$getDiastolic->close();

//Date checking. $DaysElapsed is days betwwen first BP reading in the database and today.
// ==>> NB! Need to think of a way to reset the count when secondary treatment is enacted!
//Get earliest date that data was submitted:
//Prepared statement
$getDate = $db->prepare("SELECT min(date) FROM patientCurrentBP WHERE patientID=AES_ENCRYPT(?,?)");
//Execute & get
$getDate->bind_param('ss',$id,$input_password);
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
        $flag = 1;
	}
    
    //If Diastolic is high:
    if ($targetDiastolic < $diaBP)
	{  
	echo "Your Diastolic BP is too high.";
	echo "<br>";
        $flag = 1;
	}

    //If BP is lower than target on both:
    if ($targetSystolic >= $sysBP AND $targetDiastolic >= $diaBP)
	{
        $flag = 0;
        }
    
    echo $flag;
    
    //Now submit the flag to the database:
    //Prepared statement
    $setFlag = $db->prepare("UPDATE patientTargetBP SET flag=? WHERE AES_DECRYPT(patientID,?)=?");
    //Execute
    $setFlag->bind_param('iss',$flag,$input_password,$id);
    $setFlag->execute();
    
    //If a flag is set for high BP, refer to doctor. Otherwise send to 'success' page:
    if ($flag=1)
        { 
        //header("Location: https://3yp.villocq.com/patient/alert.php"); //Send to alert page
        }
    else
        {
        //header("Location: https://3yp.villocq.com/patient/continue_Cardiac_track2.html"); //Send to continue page
        }
    }
    
$db->close();
?>