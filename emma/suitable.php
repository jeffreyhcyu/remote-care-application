<?php

$selectedA = $_POST['A'];
$selectedB = $_POST['B'];
$selectedC = $_POST['C'];
$selectedD = $_POST['D'];
$selectedE = $_POST['E'];

if(!empty($selectedA))
{
header('Location: https://3yp.villocq.com/emma/newPatientUnsuitable.php'); 
}
else
{
header('Location: https://3yp.villocq.com/emma/newPatientDetails.php'); 
}

?>