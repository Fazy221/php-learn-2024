<?php 

require '../helper.php';
require basePath('views/home.view.html');  // instead of inserting .. everytime to go to parent dir then view folder, can make helper func then imp there

/*
// Different type of ways to import
require - will give fatal err and won't continue code
require_once - can only be run once
include - give basic err instead of fatal and keep script running
include_once - can only be run once
*/