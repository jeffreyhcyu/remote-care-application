<?php

// Check the person is logged in!
session_start();    
if (isset($_SESSION['patientAppID']))
{
    $user_id = $_SESSION['patientAppID'];
    //If logged in, go to the HTML page:
}
else
{
header('Location: https://3yp.villocq.com/patient'); 
}

// Need DB access to display the doctor's address:

// Configure the MySQL connection
$server='remote.villocq.com';
$username="3yp";
$DBpassword="project";
$database="tallis";

// New MySQLi Instance
$db = new mysqli($server,$username,$DBpassword,$database);

//Get the patient's doctor ID:
//Prepared statement
$getDoctor = $db->prepare("SELECT doctorID FROM patientInfo WHERE patientID=?");
//Execute and get
$getDoctor->bind_param('s',$user_id);
$getDoctor->execute();
$getDoctor->bind_result($doctor_id);
$getDoctor->fetch();
$getDoctor->close();

//Get the Doctor's Address:
//Prepared statement
$getAddress = $db->prepare("SELECT prefix,firstName,secondName,email,address1,address2,postcode,telephone FROM doctorInfo WHERE id=?");
//Execute and get
$getAddress->bind_param('s',$doctor_id);
$getAddress->execute();
$getAddress->bind_result($prefix,$name1,$name2,$email,$address1,$address2,$postcode,$telephone);
$getAddress->fetch();
$getAddress->close();

$db->close();

?>
<html>
<head> 
<title>Cardiac Track App</title>
<link rel="stylesheet" type="text/css" href="Cardiac_Track_Style.css">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=0.95; user-scalable=0;">
</head>

<body >
<div class="main_page">

<div id="title_menu">
Cardiac Track
</div>

<div class="page_header" style="position:relative; top:87px;">
<a href="menu.php">
<img src="menu_button.png" style="float:left" height="36px" >
</a>
Contact 
</div>

<div style="color:red"> <!--dont remove this div it keeps everything in the right place--> 
.
</div>

<div id="contact1">
<div id="contact_title1"><?php echo $prefix ?>. <?php echo $name1 ?> <?php echo $name2 ?></div>
<?php echo $email ?>
<br><?php echo $address1 ?>,</br>
<?php echo $address2 ?>,
<br><?php echo $postcode ?></br>
<br><?php echo $telephone ?></br>
</div>

<!-- Old stuff - Ignore! -->

<!--<div id="contact2">
<div id="contact_title2">Consultant Mr Hyde</div>
james.hyde@nhs.co.uk
<br>11 Harley Street,</br>
London,
<br>W1G 8QP</br>
<br>01243 786595</br>
</div>-->

<body>

</html>