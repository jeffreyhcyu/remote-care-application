<?php
function linear_regression($patientUsername)
{
    //Database connection parameters
    $username="3yp";
    $DBpassword="project";
    $database="tallis";

    mysql_connect('remote.villocq.com:3306',$username,$DBpassword);
    @mysql_select_db($database);
    
    //get patient flag
    $patient_flag_query = mysql_query("SELECT fraudFlag FROM patientInfo WHERE patientID='$patientUsername'");
    $pFlag = mysql_fetch_array($patient_flag_query);
    $patient_flag = $pFlag[0];
    
    //get patient review date
    $patient_review_query = mysql_query("SELECT DATEDIFF(now(),lastReview) FROM patientInfo WHERE patientID='$patientUsername'");
    $daysElapsedArray = mysql_fetch_array($patient_review_query);
    $daysElapsed = $daysElapsedArray[0];
    
    
    //If last review was less than 7 days, data is not reliable enough so don't do anything.
    if ($daysElapsed <= 7) {
        return $patient_flag;
    }
    
    //See if the last 7 data points have been checked yet
    //Each data point has an associated flag (already used = 1, not yet used = 0)
    //To prevent using same data over and over again, check the last 7 data point flag
    $dataFlagQuery = mysql_query("SELECT SUM(uncertaintyFlag) FROM (SELECT date,patientCurrentBPSystolic,uncertaintyFlag FROM
                                 patientCurrentBP WHERE patientID='$patientUsername' ORDER BY date DESC LIMIT 7) AS value");
    $dataFlagArray = mysql_fetch_array($dataFlagQuery);
    $dataFlagSum = $dataFlagArray[0];
    
    //If one of the data points has been checked (i.e. day 1,2,3, etc), return the previous flag value
    if($dataFlagSum != 0){
        return $patient_flag;
    }
    
    //Now we can assume that all 7 previous data points have not yet been checked and that days elapsed
    //since the last review is greater than 7 days,continue with regression:
    
    //pre-query for the regression SQL
    mysql_query("SELECT @i:=0;"); 
    
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
                    

             SELECT patientCurrentBPSystolic AS y, @i:=@i+1 AS x FROM 
                  (SELECT date,patientCurrentBPSystolic FROM patientCurrentBP 
                  WHERE patientID='$patientUsername' ORDER BY date DESC LIMIT 7) 
             AS value ORDER BY date
                    
          
          ) as source_data
       ) as regression
    ) as final_parameters
    ";

    //Regression SQL GET
    $result = mysql_query($SQLQuery);
    $array = mysql_fetch_array($result);
    
    //The below query gets the past 7 days data again, puts into an array $dayin
    mysql_query("SELECT @i:=0;"); //pre-query
    
    $dayquery = mysql_query("SELECT patientCurrentBPSystolic AS SBP, @i:=@i+1 AS DAY FROM 
      (SELECT date,patientCurrentBPSystolic FROM patientCurrentBP WHERE patientID='$patientUsername' ORDER BY date DESC LIMIT 7) AS value ORDER BY date");
    $counter = 0;
    while($row = mysql_fetch_array($dayquery)){
        $dayin[$counter] = $row[0];
        $counter++;
    }
    
    // $dayin[index] is the 7 previous days of ACTUAL data. Remember 1st day = [0]!
    
    //Construct the 10% boundaries using the regression data.
    //Loop over i = 0 to 6. $dayout is the constructed line.
    //Top bound and upper bound are the 10% error boundaries.
    do {
        
        $dayout[$i] = $array['a']+($array['b']*($i + 1));
        $topbound[$i] = 1.1*$dayout[$i];
        $bottombound[$i] = 0.9*$dayout[$i];
        
        if($topbound[$i]<$dayin[$i]){
            $patient_flag++;
        };

        if($dayin[$i]<$bottombond[$i]){
            $patient_flag++;
        };
    } while ($i < 7)


    //Additional conditions
    if ($array['r_r']>0.98){
        $patient_flag++;
    }

    if ($array['r_r']<(-0.98)){
        $patient_flag++;
    }
        
        
    //Update queries:
    //Set the new flag value
    mysql_query("UPDATE patientInfo SET fraudFlag='$patient_flag' WHERE patientID='$patientUsername'");
    
    //Need to set the data point 'used' flag to '1' so we don't do the same calculation again
    mysql_query("UPDATE patientCurrentBP SET uncertaintyFlag='1' WHERE patientID='$patientUsername' ORDER BY date DESC LIMIT 7");
    
    mysql_close();
    
    return($patient_flag);

}

?>