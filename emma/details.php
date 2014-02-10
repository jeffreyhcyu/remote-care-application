<?php

$selected = $_POST['disclaimer[]'];
if(empty($selected))
{
header('Location: https://3yp.villocq.com/emma/newPatientDetails.php'); 
}
else
{
header('Location: https://3yp.villocq.com/emma/newPatientUnsuitable.php'); 
}
?>