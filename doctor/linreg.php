<?php
session_start();

	//Database connection to get all the patient data out
	$username="3yp";
	$DBpassword="project";
	$database="tallis";

	mysql_connect('remote.villocq.com:3306',$username,$DBpassword);
	@mysql_select_db($database);
        
        $patientUsername = $_SESSION['patientUsername'];
	//$patient_flag = 0;
  	$patient_flag_query = mysql_query("SELECT flag FROM FraudFlag WHERE username='$patientUsername'");
      	$patient_flag = mysql_result($patient_flag_query);

        mysql_query("SELECT @i:=0;"); //pre-query
        
        //Linear Regression code 
	$SQLQuery = "

			select a as 'a',
			       b as 'b',
			       -- Correlation coefficient
			       (ss_xy * ss_xy)/ (ss_xx * ss_yy) as 'r_r'
			from (
			   -- In this inner query we calculate the parameters
			   -- and the correlation coefficient for the linear model 
			   -- that we calculated

			   select 
			      ((avg_yi * sum_xi_xi) - (avg_xi * sum_xi_yi )) /
			      (sum_xi_xi-(n* avg_xi * avg_xi)) 
			      as 'a',

			      (sum_xi_yi - (n * avg_xi * avg_yi)) /
			      (sum_xi_xi - (n * avg_xi * avg_xi)) 
			      as 'b',
			   
			      sum_xi_xi - (n * avg_xi * avg_xi ) 
			      as 'ss_xx',

			      sum_yi_yi - (n * avg_yi * avg_yi ) 
			      as 'ss_yy',

			      sum_xi_yi - (n * avg_xi * avg_yi )
			      as 'ss_xy'

			   from (
			      -- In this inner query, we build the 
			      -- variables used in the linear regression 
			      -- calculation
			      
			      select avg(y) as 'avg_yi',
			             avg(x) as 'avg_xi',
			             count(x) as 'n',
			             sum(x*x) as 'sum_xi_xi',
			             sum(y*y) as 'sum_yi_yi',
			             sum(x*y) as 'sum_xi_yi',
			             sum(x) as 'sum_xi'        
			      from (
			      
			         -- Insert source data query here
			         -- Alias the x-variable column as 'x'
			         -- Alias the y-variable column as 'y'
					
                                        # COMMENT HERE:
                                        # A POSSIBLE STATEMENT FOR LIVE DATA IS:
                                    
                                        SELECT patientCurrentBPSystolic AS y, @i:=@i+1 AS x FROM (SELECT date,patientCurrentBPSystolic FROM patientCurrentBP WHERE patientID='$patientUsername' ORDER BY date DESC LIMIT 7) AS value ORDER BY date
                                        # The above query gets the last 7 data points as 'patientCurrentBPSystolic' and 'x' ordered from 1 to 7
					
                                        # SELECT (day) AS x, (SBP) AS y FROM FraudTest WHERE id='$patient_id'
			      
			      ) as source_data
			   ) as regression
			) as final_parameters
	";

	$result = mysql_query($SQLQuery);
	$array = mysql_fetch_array($result);

			$dayone=$array['a']+($array['b']*1);
			$daytwo=$array['a']+($array['b']*2);
			$daythree=$array['a']+($array['b']*3);
			$dayfour=$array['a']+($array['b']*4);
			$dayfive=$array['a']+($array['b']*5);
			$daysix=$array['a']+($array['b']*6);
			$dayseven=$array['a']+($array['b']*7);

			$dayonetop=1.1*$dayone;
			$daytwotop=1.1*$daytwo; 
			$daythreetop=1.1*$daythree;
			$dayfourtop=1.1*$dayfour;
			$dayfivetop=1.1*$dayfive;
			$daysixtop=1.1*$daysix;
			$dayseventop=1.1*$dayseven;

			$dayonebottom=0.9*$dayone;
			$daytwobottom=0.9*$daytwo; 
			$daythreebottom=0.9*$daythree;
			$dayfourbottom=0.9*$dayfour;
			$dayfivebottom=0.9*$dayfive;
			$daysixbottom=0.9*$daysix;
			$daysevenbottom=0.9*$dayseven;

                        //The below query gets the past 7 days data again, puts into an array $dayin
			mysql_query("SELECT @i:=0;"); //pre-query
                        
			$dayquery = mysql_query("SELECT patientCurrentBPSystolic AS SBP, @i:=@i+1 AS DAY FROM (SELECT date,patientCurrentBPSystolic FROM patientCurrentBP WHERE patientID='$patientUsername' ORDER BY date DESC LIMIT 7) AS value ORDER BY date");
                        $counter = 0;
                        while($row = mysql_fetch_array($dayquery))
                              {
                                $dayin[$counter] = $row[0];
                                $counter++;
                              }
                              // $dayin[index] is the 7 previous days of actual data. Remember 1st day = 0!

            if ($array['r_r']>1){
            			$patient_flag = $patient_flag+1;
            }

            if ($array['r_r']<(-1)){
            			$patient_flag = $patient_flag+1;
            }

			if($dayonetop<$dayin[0]){
						$patient_flag = $patient_flag+1;
			};

			if($dayin[0]<$dayonebottom){
						$patient_flag = $patient_flag+1;
			};

			if($daytwotop<$dayin[1]){
						$patient_flag = $patient_flag+1;
			};

			if($dayin[1]<$daytwobottom){
						$patient_flag = $patient_flag+1;
			};

			if($daythreetop<$dayin[2]){
						$patient_flag = $patient_flag+1;
			};

			if($dayin[2]<$daythreebottom){
						$patient_flag = $patient_flag+1;
			};

			if($dayfourtop<$dayin[3]){
						$patient_flag = $patient_flag+1;
			};

			if($dayin[3]<$dayfourbottom){
						$patient_flag = $patient_flag+1;
			};

			if($dayfivetop<$dayin[4]){
						$patient_flag = $patient_flag+1;
			};

			if($dayin[4]<$dayfivebottom){
						$patient_flag = $patient_flag+1;
			};

			if($daysixtop<$dayin[5]){
						$patient_flag = $patient_flag+1;
			};

			if($dayin[5]<$daysixbottom){
						$patient_flag = $patient_flag+1;
			};

			if($dayseventop<$dayin[6]){
						$patient_flag = $patient_flag+1;
			};

			if($dayin[6]<$daysevenbottom){
						$patient_flag = $patient_flag+1;
			};

//
//			echo $patient_flag.'<br>';
//			
//			echo $dayin[0].'<br>'; 
//			echo $dayin[1].'<br>';
//			echo $dayin[2].'<br>';
//			echo $dayin[3].'<br>';
//			echo $dayin[4].'<br>';
//			echo $dayin[5].'<br>';
//			echo $dayin[6].'<br>';
//			//var_dump($array2);*/
//			
//                        echo '<br>';
//                        
//			echo $dayone.'<br>';
//			echo $daytwo.'<br>';
//			echo $daythree.'<br>';
//			echo $dayfour.'<br>';
//			echo $dayfive.'<br>';
//			echo $daysix.'<br>';
//			echo $dayseven.'<br>';
//			
//                        echo '<br>';
//                        
//			echo $dayonetop.'<br>';
//			echo $daytwotop.'<br>';
//			echo $daythreetop.'<br>';
//			echo $dayfourtop.'<br>';
//			echo $dayfivetop.'<br>';
//			echo $daysixtop.'<br>';
//			echo $dayseventop.'<br>';
//			
//                        echo '<br>';
//                           
//			echo $dayonebottom.'<br>';
//			echo $daytwobottom.'<br>';
//			echo $daythreebottom.'<br>';
//			echo $dayfourbottom.'<br>';
//			echo $dayfivebottom.'<br>';
//			echo $daysixbottom.'<br>';
//			echo $daysevenbottom.'<br>';

//update query 
mysql_query("UPDATE FraudFlag SET flag='$patient_flag' WHERE username='$patientUsername'");

//Delete the old values
//mysql_query("DELETE FROM FraudFlag WHERE username='$patientUsername'");

//New query here
//mysql_query("INSERT INTO FraudFlag VALUES('','$patientUsername','$patient_flag')");
  
mysql_close();

?>

