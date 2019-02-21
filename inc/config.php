<?php
  // If no constant __CONFIG__ is defined, do not load this page
  if(!defined("__CONFIG__")){
    exit("You do not have a config file");
  }
  if(!isset($_SESSION)){
    session_start();
  }
  //allow errors
  error_reporting(-1);
  ini_set('display_errors', 'On');

  //Include the DB.php file
  include_once "classes/DB.php";

  $con = DB::getConnection();
?>
