<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cardiac Track Pro - Log In</title>

<link href="style_login.css" rel="stylesheet" type="text/css">

<script type="text/javascript">
function submitform()
{
document.forms["jsform"].submit();
}
</script>


<body>

<div class="container">

  	<header><img src="logo_login.png" width="960" height="40" alt=""/>
  	</header>
    
    <section id="login">
    <form id="jsform" action="login.php" method="post">
      <label for="textfield">Username:</label>
      <input type="text" name="username" id="username">
      <label for="password">Password:</label>
      <input type="password" name="password" id="password">
      <input type="button" value="Log In" onClick="location.href='javascript: submitform()'">
      <?php
      session_start();
	  echo $_SESSION['loginMessage'];
	  ?>
      </form>
    </section>
    
    <br>
    
  	<footer class="footer">
        <ul>
              <a href="siteTerms.html"><li>Site Terms</li></a>
              <a href="aboutUs.html"><li>About Us</li></a>
        </ul>
  	</footer>    
      
</div>

</body>
</html>
