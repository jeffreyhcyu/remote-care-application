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

?>