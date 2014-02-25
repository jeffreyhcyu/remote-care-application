<?php

session_start();

if($_POST['formSubmit'] == "Submit")

{
	$_SESSION['Gout'] = $_POST['Gout'];

	$_SESSION['Heart_failure'] = $_POST['Heart_failure'];
	
	$_SESSION['Whitecoat'] = $_POST['Whitecoat'];

	$_SESSION['OrgDamage'] = $_POST['OrgDamage'];

	$_SESSION['Postural_Hypotension'] = $_POST['Postural_Hypotension'];

	$_SESSION['CCB'] = $_POST['CCB'];

	$_SESSION['BB_already'] = $_POST['BB_already'];

	$_SESSION['angio_expose'] = $_POST['angio_expose'];

	$_SESSION['angio_hered'] = $_POST['angio_hered'];

	$_SESSION['COO'] = $_POST['COO'];

	$_SESSION['CVD'] = $_POST['CVD'];

	$_SESSION['CVDrisk'] = $_POST['CVDrisk'];

	$_SESSION['HDAB'] = $_POST['HDAB'];

	$_SESSION['MI'] = $_POST['MI'];

	$_SESSION['HFRisk'] = $_POST['HFRisk'];

	$_SESSION['angina'] = $_POST['angina'];

	$_SESSION['DiabRisk'] = $_POST['DiabRisk'];

	$_SESSION['Diuretic_suitable'] = $_POST['Diuretic_suitable'];

	$_SESSION['HepImp'] = $_POST['HepImp'];

	$_SESSION['RenImp'] = $_POST['RenImp'];

	$_SESSION['renal'] = $_POST['renal'];

	$_SESSION['renovascular'] = $_POST['renovascular'];

	$_SESSION['stenosis'] = $_POST['stenosis'];

	$_SESSION['Stricture'] = $_POST['Stricture'];

	$_SESSION['oedema'] = $_POST['oedema'];

	$_SESSION['High_blood_k'] = $_POST['High_blood_k'];


}

header("Location: newPatientTargetBP.php");

?>