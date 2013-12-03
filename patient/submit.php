<?php
session_start();
// Php code for handling the BP submission form

// Configure the MySQL connection
$username="3yp";
$DBpassword="project";
$database="tallis";

mysql_connect('remote.villocq.com:3306',$username,$DBpassword);
@mysql_select_db($database) or die("Error! Something bad happened!");

//Assign the form POST output to PHP variables
$id=$_SESSION['userID'];
$input_password=$_SESSION['userPassword'];
$sysBP=$_POST['sysBP'];
$diaBP=$_POST['diaBP'];

//Insert the form output into a new row of the patientCurrentBP table
$enterBPquery="INSERT INTO patientCurrentBP VALUES ('',now(),AES_ENCRYPT('$id','$input_password'),AES_ENCRYPT('$sysBP','$input_password'),AES_ENCRYPT('$diaBP','$input_password'))";
mysql_query($enterBPquery);


//Below code handles the BP target checking
//
//Check the patient's target Systolic BP
$getSystolic="SELECT AES_DECRYPT(patientTargetBPSystolic,'$input_password') FROM patientTargetBP WHERE AES_DECRYPT(patientID,'$input_password')='$id'";
$targetSystolic=mysql_result(mysql_query($getSystolic),0);

//Check the patient's target Diastolic BP
$getDiastolic="SELECT AES_DECRYPT(patientTargetBPDiastolic,'$input_password') FROM patientTargetBP WHERE AES_DECRYPT(patientID,'$input_password')='$id'";
$targetDiastolic=mysql_result(mysql_query($getDiastolic),0);

//Date checking. $DaysElapsed is days betwwen first BP reading in the database and today
// ==>> NB! Need to think of a way to reset the count when secondary treatment is enacted!
$getDate="SELECT min(date) FROM patientCurrentBP WHERE patientID=AES_ENCRYPT('$id','$input_password')";
$earliestDate=mysql_result(mysql_query($getDate),0);
$dateDifference="SELECT DATEDIFF(now(),'$earliestDate') AS date_difference";
$daysElapsed=mysql_result(mysql_query($dateDifference),0);


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
	mysql_query("UPDATE patientTargetBP SET flag='1' WHERE AES_DECRYPT(patientID,'$input_password')='$id'");
        $flag = 1;
	}
    
    //If Diastolic is high:
    if ($targetDiastolic < $diaBP)
	{  
	echo "Your Diastolic BP is too high.";
	echo "<br>";
	mysql_query("UPDATE patientTargetBP SET flag='1' WHERE AES_DECRYPT(patientID,'$input_password')='$id'");
        $flag=1;
	}

    //If BP is lower than target on both:
    if ($targetSystolic >= $sysBP AND $targetDiastolic >= $diaBP)
	{
	mysql_query("UPDATE patientTargetBP SET flag='0' WHERE AES_DECRYPT(patientID,'$input_password')='$id'");
        $flag=0;
	header("Location: https://3yp.villocq.com/patient/continue_Cardiac_track2.html"); //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!THE LINK NEEDS CHANGING
    }

    //If a flag is set for high BP, refer to doctor
    elseif ($flag=1)
        {
        header("Location: https://3yp.villocq.com/patient/alert.php"); //!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!THE LINK NEEDS CHANGING
        }
    }
    
//Close the DB connection
mysql_close();
?>