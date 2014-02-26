<?php

function doctorname($id){
    
    // Configure the MySQL connection
    $server="remote.villocq.com";
    $username="3yp";
    $DBpassword="project";
    $database="tallis";
    
    // New MySQLi Instance
    $db = new mysqli($server,$username,$DBpassword,$database);
    
    $getDr = $db->prepare("SELECT firstName,secondName,prefix FROM doctorInfo WHERE id = ?");
    $getDr->bind_param('s',$id);
    $getDr->execute();
    $getDr->bind_result($firstName,$secondName,$prefix);
    $getDr->fetch();
    $getDr->close();
    $db->close();
    
    $fullName = $prefix . ". " . $firstName . " " . $secondName;

    return $fullName;

}


function patientsidebar($doctorID){
    
    //Database connection
    $username="3yp";
    $DBpassword="project";
    $database="tallis";
    
    mysql_connect('remote.villocq.com:3306',$username,$DBpassword);
    @mysql_select_db($database);
    
    $result = mysql_query("SELECT id, patientID FROM patientInfo WHERE BPcontrolled='No' AND doctorID='$doctorID'");
    $num = mysql_num_rows($result);
    
    while($row = mysql_fetch_array($result))
    {
      echo '<div class="Apatient" data-idNo=' . $row['id']. '>'; //inserted the data tag data-id
      echo '<div class="Identification" data-idNo=' . $row['id']. '>';
      echo $row['patientID'] . " id:" . $row['id'];
      echo '</div>';
      echo '</div>';
    }     


}

?>