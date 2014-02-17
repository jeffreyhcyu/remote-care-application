<?php
	//Database connection to get all the patient data out
	$username="3yp";
	$DBpassword="project";
	$database="tallis";

	mysql_connect('remote.villocq.com:3306',$username,$DBpassword);
	@mysql_select_db($database);

	$patient_id = 1;

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
					
					SELECT (day) AS x, (SBP) AS y FROM FraudTest WHERE id='$patient_id'
			      
			      ) as source_data
			   ) as regression
			) as final_parameters
	";

			$result = mysql_query($SQLQuery);
			$array = mysql_fetch_array($result);

			echo '<pre>'; print_r($array); echo '<pre/>';
	mysql_close();

?>

