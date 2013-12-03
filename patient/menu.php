<?php

// Check the person is logged in!
session_start();    
if (isset($_SESSION['userID']))
{
    $user_id = $_SESSION['userID'];
    //If logged in, go to the HTML page:
}
else
{
header('Location: https://3yp.villocq.com/patient'); 
}
?>

<html>
<head>
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=0.486; user-scalable=0;">
<title>Cardiac Track App</title>
<link rel="stylesheet" type="text/css" href="Cardiac_Track_Style2.css">

</head>

<body >
<div class="main_page">

<div id="title_menu">
Cardiac Track
</div>

<div class="menu_option">
<a href="update.php" style="text-decoration:none; color:white">Update
<div class="arrow" style="position: relative; top:-30px;">
<img src="arrow.png" width="80" height="100">
</a>
</div>
</div>

<div class="menu_option2">
<a href="history.php" style="text-decoration:none; color:white">
Patient History
<div class="arrow" style="position: relative; top:-30px;">
<img src="arrow.png" width="80" height="100">
</a>
</div>
</div>

<div class="menu_option2">
<a href="contact.php" style="text-decoration:none; color:white; ">Doctors Contact Details 
<div class="arrow" style="position: relative; top:-30px;">
<img src="arrow.png" width="80" height="100">
</div>
</div>

<body>

</html>
