<?php 

/* Sessions are for storing individual user data in system. On it's initialization, a session's id is generated
 in browser's cookies. session_start() has to be called in start of each file which is supposed to use it. 
 To end session, can use destroy_session() so any information will be destroyed to user */

 session_start();

  $_SESSION['name'] = 'Faizan';
  echo $_SESSION['name'];