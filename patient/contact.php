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
<title>Cardiac Track App</title>
<link rel="stylesheet" type="text/css" href="Cardiac_Track_Style2.css">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=0.486; user-scalable=0;">
</head>

<body >
<div class="main_page">

<div id="title_menu">
Cardiac Track
</div>

<div class="page_header" style="positon:relative; top:174px;">
<a href="menu.php">
<img src="menu_button.png" style="float:left" height="80px" >
</a>
Contact 
</div>

<div style="color=red"> <!--dont remove this div it keeps everything in the right place--> 
.
</div>

<div id="contact1">
<div id="contact_title1">GP Dr Jekyll</div>
henry.jekyll@nhs.co.uk
<br>11 Harley Street,</br>
London,
<br>W1G 8QP</br>
<br>01243 786594</br>
</div>

<div id="contact2">
<div id="contact_title2">Consultant Mr Hyde</div>
james.hyde@nhs.co.uk
<br>11 Harley Street,</br>
London,
<br>W1G 8QP</br>
<br>01243 786595</br>
</div>

<body>

</html>