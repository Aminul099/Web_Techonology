<?php  
require_once '../Model/Model.php';
session_start();

function verify($username,$password)
{
  if(verifyLoginData($username,$password)==TRUE)
  {
    
    return TRUE;
  }
  else {
    return FALSE;
  }
}





?>