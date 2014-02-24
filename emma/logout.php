<?php

session_start();
session_unset();
session_destroy();

header("https://3yp.villocq.com/emma/index.php");

?>