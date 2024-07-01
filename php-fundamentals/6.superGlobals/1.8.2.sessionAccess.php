<?php 

 session_start();
 if(isset($_SESSION['name'])) {
    echo "Session name is " . $_SESSION['name'];
 } else {
    echo "Session not set";
 }

 