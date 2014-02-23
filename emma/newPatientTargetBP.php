<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Cardiac Track Pro - Home</title>

<link href="styles/style.css" rel="stylesheet" type="text/css">
<body>

<div class="container">
  	<header><a href="index.php"><img src="images/logo.png" width="600" height="31" alt=""/></a>
  	  <label for="search2">Patient ID:</label>
      <input type="search" name="search2" id="search2">
      <input type="button" name="button2" id="button2" value="Search" onClick="location.href='existingPatients.php'">
<nav></nav>
      <section id="searchbar"></section>
  	</header>
    
    <div class="sidebar1">
		<nav>
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="existingPatients.php">Existing patients</a></li>
              <li><a href="newPatient.php">Add a new patient</a></li>
              <li><a href="loginPage.php">Log out</a></li>
            </ul>
      </nav>
      <aside>
        	<h4>News Feed</h4>
      </aside>
  </div>

  <article class="content">
    
  <?php

session_start();

if $_SESSION['ageGroup'] == "80+" AND $_SESSION['Whitecoat'] == "Yes"
{
$_SESSION[targetSystolic] = "145"

$_SESSION[targetDiastolic] = "85"
}


if $_SESSION['ageGroup'] == "80+" AND $_SESSION['Whitecoat'] == "No"
{
$_SESSION[targetSystolic] = "150"

$_SESSION[targetDiastolic] = "90"
}


if $_SESSION['ageGroup'] != "80+" AND $_SESSION['Whitecoat'] == "Yes"
{
$_SESSION[targetSystolic] = "135"

$_SESSION[targetDiastolic] = "85"
}


if $_SESSION['ageGroup'] != "80+" AND $_SESSION['Whitecoat'] == "No"
{
$_SESSION[targetSystolic] = "140"

$_SESSION[targetDiastolic] = "90"
}

echo $_SESSION[targetSystolic];
echo $_SESSION[targetDystolic];
?>
    
  </article>
  <div class="push"></div>
  
  </div>
  
  <footer class="footer">
	<ul>
          <a href="siteTerms.html"><li>Site Terms</li></a>
          <a href="aboutUs.html"><li>About Us</li></a>
	</ul>
  </footer>    


</body>
</html>
