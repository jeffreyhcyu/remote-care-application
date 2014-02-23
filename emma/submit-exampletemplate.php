<?php

// This is an example of the php that might be needed for the new user creation form

//Assign the creation form POST output to PHP variables
//If there are multiple stages of the form, use $_SESSION variables between pages to save them.
//NB: THESE WILL CHANGE DEPENDING ON WHAT IS IN THE PREVIOUS PAGES! Values below are for testing only!

//Patient Details
$patientID = "form-test2";
$input_password = "thisisapassword2";
$doctorID = "2";
$targetSystolic = "120";
$targetDiastolic = "60";
$BPcontrolled = "No";
$ageGroup = "55-79";
$ethnicity = "Yes";
$gender = "Male";

//Comorbidities:
$breastfeed = "No";
$future_pregnancy = "No";
$aspirin = "No";
$asthma = "No";
$BB_already = "No";
$CCB = "No";
$COO = "No";
$CVD = "No";
$CVDrisk = "No";
$DiabRisk = "No";
$Diuretic_suitable = "No";
$Gout = "No";
$HDAB = "No";
$HFRisk = "No";
$Heart_failure = "No";
$HepImp = "No";
$High_blood_k = "No";
$MI = "No";
$OrgDamage = "No";
$Postural_hypotension = "No";
$RenImp = "No";
$Stricture = "No";
$Whitecoat = "No";
$angina = "No";
$angio_expose = "No";
$angio_hered = "No";
$oedema = "No";
$renal = "No";
$renovascular = "No";
$stenosis = "No";

//Blood test results, set them to 'null' for now:
$eGFRbase = null;
$creatininebase = null;
$potassiumbase = null;

//DrugInfo:
$numberDrugs = "1";
$isonmaxdose = "No";
$drug1 = "drug1";
$drug1class = "drugclass";
$drug1prescription = "99";

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
                           ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");

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

//Need to create additional records:
//This is for the Fraud Detection system:
$newFlag = $db->prepare("INSERT INTO FraudFlag VALUES('',?,'0')");
$newFlag->bind_param('s',$patientID);
$newFlag->execute();
$newFlag->close();

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
    //If Successful data entry
    //Redirect to the success page
    //header('Location: https://3yp.villocq.com/emma/CHANGE-ME-Success-page.html');
    echo "SUCCESS!";
}
else
{
    //header('Location: Some_failure_page.html');
    echo "FAILURE :(";
}

$db->close();

?>