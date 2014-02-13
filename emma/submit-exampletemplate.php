<?php

// This is an example of the php that might be needed for the new user creation form

// Configure the MySQL connection
$server="remote.villocq.com";
$username="3yp";
$DBpassword="project";
$database="tallis";

// New MySQLi Instance
$db = new mysqli($server,$username,$DBpassword,$database);

//Assign the creation form POST output to PHP variables
//If there are multiple stages of the form, use $_SESSION variables between pages to save them.
//NB: THESE WILL CHANGE DEPENDING ON WHAT IS IN THE PREVIOUS PAGES!
$patientID=$_POST['username'];
$input_password=$_POST['password'];
$doctorID=$_SESSION['userID'];
$targetSystolic = // Stuff
$targetDiastolic = //stuff
$BPcontrolled = "No";
$ageGroup = //stuff
$ethnicity = //stuff
$gender = //Stuff

$breastfeed = //stuff
$future_pregnancy = //stuff
$aspirin = //stuff
$asthma = //stuff
$BB_already = //stuff
$CCB = //stuff
$COO = //stuff
$CVD = //stuff
$CVDrisk = //stuff
$DiabRisk = //stuff
$Diuretic_suitable = //stuff
$Gout = //stuff
$HDAB = //stuff
$HFRisk = //stuff
$Heart_failure = //stuff
$HepImp = //stuff
$High_blood_k = //stuff
$MI = //stuff
$OrgDamage = //stuff
$Postural_hypotension = //stuff
$RenImp = //stuff
$Stricture = //stuff
$Whitecoat = //stuff
$angina = //stuff
$angio_expose = //stuff
$angio_hered = //stuff
$oedema = //stuff
$renal = //stuff
$renovascular = //stuff
$stenosis = //stuff


//Hashing Function
require("PasswordHash.php"); //This is the PHPass framework
$hasher = new PasswordHash(10,false); // 10 is the cost function setting
$hashedPassword = $hasher->HashPassword($input_password);
// Password is now hashed as $hashedPassword

//Prepared statement:
$newPatient = $db->prepare("INSERT INTO patientInfo VALUES('',?,?,?,?,?,'','',?,?,?,?,?,?,?,
                           ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,'','','')");

//Bind & Execute to submit to database. 
$newPatient->bind_param('sssssssssssssssssssssssssssssssssssssss',
                    $patientID,$hashedPassword,$doctorID,$targetSystolic,$targetDiastolic,
                    $BPcontrolled,$ageGroup,$ethnicity,$gender,
                    $breastfeed,$future_pregnancy,$aspirin,$asthma,$BB_already,$CCB,
                    $COO,$CVD,$CVDrisk,$DiabRisk,$Diuretic_suitable,$Gout,$HDAB,
                    $HFRisk,$Heart_failure,$HepImp,$High_blood_k,$MI,$OrgDamage,
                    $Postural_hypotension,$RenImp,$Stricture,$Whitecoat,$angina,
                    $angio_expose,$angio_hered,$oedema,$renal,$renovascular,$stenosis);
$newPatient->execute();
$newPatient->close();
//Data has now been submitted to the database

//Let's do a quick data check to make sure it was sbumitted:
$checker = $db->prepare("SELECT id,password FROM patientInfo WHERE patientID=?");
$checker->bind_param('s',$patientID);
$checker->execute();
$checker->bind_result($check_id,$check_password);
$checker->fetch();
$checker->close();

if ($check_password == $hashedPassword AND $check_id > 0)
{
    //If Successful data entry
    //Maybe, save the auto-ID as a variable to be accessed later:
    $_SESSION['patientAutoID'] = $check_id;
    //Redirect to the success page
    header('Location: https://3yp.villocq.com/emma/CHANGE-ME-Success-page.html');
}
else
{
    header('Location: Some_failure_page.html');
}

$db->close();

?>