<?php

session_start();
session_unset();
session_destroy();

header("Location:https://3yp.villocq.com/doctor/index.php");

?>