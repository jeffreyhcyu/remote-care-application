<?php

session_start();

$targetSystolic = "";
$targetDiastolic = "";

if ($_SESSION['ageGroup'] == "80+" AND $_SESSION['Whitecoat'] == "Yes")
{
$targetSystolic = "145";
$targetDiastolic = "85";
}

elseif ($_SESSION['ageGroup'] == "80+" AND $_SESSION['Whitecoat'] == "No")
{
$targetSystolic = "150";
$targetDiastolic = "90";
}


elseif ($_SESSION['ageGroup'] != "80+" AND $_SESSION['Whitecoat'] == "Yes")
{
$targetSystolic = "135";
$targetDiastolic = "85";
}

else
{
$targetSystolic = "140";
$targetDiastolic = "90";
}

$_SESSION['targetSystolic'] = $targetSystolic;
$_SESSION['targetDiastolic'] = $targetDiastolic;

?>