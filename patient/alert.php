<?php

// Check the person is logged in!!
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

<div class="page_header" style="positon:relative; top:87px;">
<a href="menu.php">
<img src="menu_button.png" style="float:left" height="40px" >
</a>
Update
</div>

<div style="color=red"> <!--dont remove this div it keeps everything in the right place--> 
.
</div>

<div id="result_positive">
Your blood pressure is too high. 
Please make an appointment to see your GP.
</div>

<div class="alert_contact">
<a href="contact.php" style="text-decoration:none; color:white; ">Doctors Contact Details 
<div class="arrow" style="position: relative; top:-15px;">
<img src="arrow.png" width="40" height="50">
</div>
</div>

<body>

</html>