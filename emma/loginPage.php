<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cardiac Track Pro - Log In</title>

<link href="styles/style_login.css" rel="stylesheet" type="text/css">

<script type="text/javascript">
function submitform()
{
document.forms["jsform"].submit();
}
</script>

<body>

<div class="container">

  	<header><img src="images/logo_login.png" width="960" height="340" alt=""/>
  	</header>
    
    <section id="login">
    <form id="jsform" action="login.php" method="post">
   
      <input type="text" name="username" id="username" placeholder="Username">
   
      <input type="password" name="password" id="password" placeholder="Password">
     
      <input type="button" value="Log In" onClick="location.href='javascript: submitform()'">
	
    <br>
	<article>
		<?php
		session_start();
		echo $_SESSION['loginMessage'];
		?>
	</article>
    
    </form>
    </section>
      
    <div class="push"></div>

</div>
     
</body>
</html>
