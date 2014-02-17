<?php
	//Database connection to get all the patient data out
	$username="3yp";
	$DBpassword="project";
	$database="tallis";

	mysql_connect('remote.villocq.com:3306',$username,$DBpassword);
	@mysql_select_db($database);

	$patient_id = 2;

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

$SQLQuery2 = "SELECT Day, SBP FROM FraudTest WHERE id='$patient_id'";
			
	$result2 = mysql_query($SQLQuery2);
	//$array2 = mysql_fetch_array($result2);
	echo "<table border='1'><tr><th>Firstname</th><th>Lastname</th></tr>";
	while($row = mysql_fetch_array($result2)){
    print "<tr><td>".$row['Day']."</td><td>".$row['SBP']."</td></tr>";
}	print "</table>";


			//var_dump($array2);

			/*echo $dayone.'<br>';
			echo $daytwo.'<br>';
			echo $daythree.'<br>';
			echo $dayfour.'<br>';
			echo $dayfive.'<br>';
			echo $daysix.'<br>';
			echo $dayseven.'<br>';

			echo $dayonetop.'<br>';
			echo $daytwotop.'<br>';
			echo $daythreetop.'<br>';
			echo $dayfourtop.'<br>';
			echo $dayfivetop.'<br>';
			echo $daysixtop.'<br>';
			echo $dayseventop.'<br>';
	
			echo $dayonebottom.'<br>';
			echo $daytwobottom.'<br>';
			echo $daythreebottom.'<br>';
			echo $dayfourbottom.'<br>';
			echo $dayfivebottom.'<br>';
			echo $daysixbottom.'<br>';
			echo $daysevenbottom.'<br>';
			*/
	mysql_close();

?>

