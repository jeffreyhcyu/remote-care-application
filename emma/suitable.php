<?php

$selected[] = $_POST['disclaimer[]'];

foreach($selected as $result) {
    echo $result, '<br>';
}

//if(!empty($selected))
//{
//header('Location: https://3yp.villocq.com/emma/newPatientUnsuitable.php'); 
//}
//else
//{
//header('Location: https://3yp.villocq.com/emma/newPatientDetails.php'); 
//}

?>