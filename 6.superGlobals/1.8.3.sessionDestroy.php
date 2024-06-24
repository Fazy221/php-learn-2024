<?php 

session_start();

echo "Session delete once this file runs which means all user data will be lost";

session_destroy();