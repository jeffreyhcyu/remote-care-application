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
?>

<html>
<head>
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=0.95; user-scalable=0;">
<title>Cardiac Track App</title>
<link rel="stylesheet" type="text/css" href="Cardiac_Track_Style.css">
<link rel="apple-touch-icon" href="/iphone_icon.png"/>
</head>

<body >
<div class="main_page">

<div id="title_menu">
Cardiac Track
</div>

<div class="menu_option">
<a href="update.php" style="text-decoration:none; color:white">Update
<div class="arrow" style="position: relative; top:-15px;">
<img src="arrow.png" width="40" height="50">
</a>
</div>
</div>

<div class="menu_option2">
<a href="history.php" style="text-decoration:none; color:white">
Patient History
<div class="arrow" style="position: relative; top:-15px;">
<img src="arrow.png" width="40" height="50">
</a>
</div>
</div>

<div class="menu_option2">
<a href="contact.php" style="text-decoration:none; color:white; ">Doctors Contact Details 
<div class="arrow" style="position: relative; top:-15px;">
<img src="arrow.png" width="40" height="50">
</div>
</div>

<body>

</html>
