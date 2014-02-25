		<?php

		// enable sessions
		session_start();

		// Configure the MySQL connection
		$username="3yp";
		$DBpassword="project";
		$database="tallis";

		mysql_connect('remote.villocq.com:3306',$username,$DBpassword);
		@mysql_select_db($database);

		//Pull the user ID + PW out of the stored session
		$id = $_SESSION['userID'];

		//Perform the SQL Query
		$SQLQuery = "SELECT b.date, b.patientCurrentBPSystolic, b.patientCurrentBPDiastolic
	    FROM patientCurrentBP AS b JOIN patientInfo AS i ON b.patientID=i.patientID WHERE i.id=$current";

		$result = mysql_query($SQLQuery);
		$num = mysql_num_rows($result);


		//This builds an array that contains the BP values. This array is then used by the javascript to make the chart.
		//Source code below provided by: http://www.kometschuh.de/GoogleChartToolswithJSON.html
		$data[0] = array('day','SystolicBP','DiastolicBP');		
		for ($i=1; $i<($num+1); $i++)
		{
		    $data[$i] = array(substr(mysql_result($result, $i-1, "date"), 0, 10),
		    		(int) mysql_result($result, $i-1, "patientCurrentBPSystolic"),
				(int) mysql_result($result, $i-1, "patientCurrentBPDiastolic") );
		}

		echo json_encode($data);

		mysql_close();
		   
		?>
