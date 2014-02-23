<?php

session_start();


if $_SESSION['ageGroup'] == "80+" AND $_SESSION['Whitecoat'] == "Yes"
{
$_SESSION[targetSystolic] = "145"

$_SESSION[targetDiastolic] = "85"
}


if $_SESSION['ageGroup'] == "80+" AND $_SESSION['Whitecoat'] == "No"
{
$_SESSION[targetSystolic] = "150"

$_SESSION[targetDiastolic] = "90"
}


if $_SESSION['ageGroup'] != "80+" AND $_SESSION['Whitecoat'] == "Yes"
{
$_SESSION[targetSystolic] = "135"

$_SESSION[targetDiastolic] = "85"
}


if $_SESSION['ageGroup'] != "80+" AND $_SESSION['Whitecoat'] == "No"
{
$_SESSION[targetSystolic] = "140"

$_SESSION[targetDiastolic] = "90"
}
?>