<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

session_start();

if($_POST['formSubmit'] == "Submit")
{
$_SESSION['patientID'] = $_POST['patientID'];
$_SESSION['input_password'] = $_POST['input_password'];
}

// This is an example of the php that might be needed for the new user creation form

//Assign the creation form POST output to PHP variables
//If there are multiple stages of the form, use $_SESSION variables between pages to save them.
//NB: THESE WILL CHANGE DEPENDING ON WHAT IS IN THE PREVIOUS PAGES! Values below are for testing only!

//Patient Details
$patientID = $_SESSION['patientID'];
$input_password = $_SESSION['input_password'];
$doctorID = $_SESSION['userID'];
$targetSystolic = $_SESSION['targetSystolic'];
$targetDiastolic = $_SESSION['targetDiastolic'];
$BPcontrolled = "No";
$ageGroup = $_SESSION['ageGroup'];
$ethnicity = $_SESSION['ethnicity'];
$gender = $_SESSION['gender'];

//Comorbidities:
$breastfeed = $_SESSION['breastfeed'];
$future_pregnancy = $_SESSION['future_pregnancy'];
$aspirin = $_SESSION['aspirin'];
$asthma = $_SESSION['asthma'];
$BB_already = $_SESSION['BB_already'];
$CCB = $_SESSION['CCB'];
$COO = $_SESSION['COO'];
$CVD = $_SESSION['CVD'];
$CVDrisk = $_SESSION['CVDrisk'];
$DiabRisk = $_SESSION['DiabRisk'];
$Diuretic_suitable = $_SESSION['Diuretic_suitable'];
$Gout = $_SESSION['Gout'];
$HDAB = $_SESSION['HDAB'];
$HFRisk = $_SESSION['HFRisk'];
$Heart_failure = $_SESSION['Heart_failure'];
$HepImp = $_SESSION['HepImp'];
$High_blood_k = $_SESSION['High_blood_k'];
$MI = $_SESSION['MI'];
$OrgDamage = $_SESSION['OrgDamage'];
$Postural_hypotension = $_SESSION['Postural_hypotension'];
$RenImp = $_SESSION['RenImp'];
$Stricture = $_SESSION['Stricture'];
$Whitecoat = $_SESSION['Whitecoat'];
$angina = $_SESSION['angina'];
$angio_expose = $_SESSION['angio_expose'];
$angio_hered = $_SESSION['angio_hered'];
$oedema = $_SESSION['oedema'];
$renal = $_SESSION['renal'];
$renovascular = $_SESSION['renovascular'];
$stenosis = $_SESSION['stenosis'];

//Blood test results, set them to 'null' for now:
$eGFRbase = null;
$creatininebase = null;
$potassiumbase = null;

//DrugInfo:
$numberDrugs = "0";
$isonmaxdose = "No";
$drug1 = null;
$drug1class = null;
$drug1prescription = null;

///////////////////////////////////////////////////////////////////////////////

// Configure the MySQL connection
$server="remote.villocq.com";
$username="3yp";
$DBpassword="project";
$database="tallis";

// New MySQLi Instance
$db = new mysqli($server,$username,$DBpassword,$database);

//Hashing Function
require("PasswordHash.php"); //This is the PHPass framework
$hasher = new PasswordHash(10,false); // 10 is the cost function setting
$hashedPassword = $hasher->HashPassword($input_password);
// Password is now hashed as $hashedPassword

//Prepared statement:
//NB: Dates are set to: lastReview:Today, nextReview:T+30days
$newPatient = $db->prepare("INSERT INTO patientInfo VALUES('',?,?,?,?,?,now(),DATE_ADD(now(), INTERVAL 1 MONTH),?,?,?,?,?,?,?,
                           ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,'0')");

//Bind & Execute to submit to database. 
$newPatient->bind_param('ssssssssssssssssssssssssssssssssssssssssss',
                    $patientID,$hashedPassword,$doctorID,$targetSystolic,$targetDiastolic,
                    $BPcontrolled,$ageGroup,$ethnicity,$gender,
                    $breastfeed,$future_pregnancy,$aspirin,$asthma,$BB_already,$CCB,
                    $COO,$CVD,$CVDrisk,$DiabRisk,$Diuretic_suitable,$Gout,$HDAB,
                    $HFRisk,$Heart_failure,$HepImp,$High_blood_k,$MI,$OrgDamage,
                    $Postural_hypotension,$RenImp,$Stricture,$Whitecoat,$angina,
                    $angio_expose,$angio_hered,$oedema,$renal,$renovascular,$stenosis,
                    $eGFRbase,$creatininebase,$potassiumbase);
$newPatient->execute();
$newPatient->close();
//Data has now been submitted to the database

//This creates a new record in the patient drugs table:
$newPatientDrugs = $db->prepare("INSERT INTO patientDrugs VALUES('',?,?,?,?,?,?,null,null,null,null,null,null,null,null,null)");
$newPatientDrugs->bind_param('ssssss',$patientID,$numberDrugs,$isonmaxdose,$drug1,$drug1class,$drug1prescription);
$newPatientDrugs->execute();
$newPatientDrugs->close();

//All records have now been created

//Quick data check to make sure data to patientInfo was submitted (concatenate + hash some columns):
$checker = $db->prepare("SELECT SHA2(concat(patientID,password,doctorID,targetSystolic,
                        targetDiastolic,gender),'512') FROM patientInfo WHERE patientID = ?");
$checker->bind_param('s',$patientID);
$checker->execute();
$checker->bind_result($SQL_hash);
$checker->fetch();
$checker->close();

//Create a hash of the same columns from the PHP data:
$concat = $patientID . $hashedPassword . $doctorID . $targetSystolic . $targetDiastolic . $gender;
$PHP_hash = hash('SHA512',$concat);

if ($SQL_hash == $PHP_hash)
{
    $getID = $db->prepare("SELECT id FROM patientInfo WHERE patientID=?");
    $getID->bind_param('s',$patientID);
    $getID->execute();
    $getID->bind_result($autoID);
    $getID->fetch();
    $getID->close();
    $_SESSION['autoID'] = $autoID;
    
    //If Successful data entry
    //Redirect to the success page
    header('Location: https://3yp.villocq.com/doctor/newPatientSuccess.php');
 
}
else
{
    
    header('Location: https://3yp.villocq.com/doctor/newPatientFailure.php');
}

$db->close();

?>