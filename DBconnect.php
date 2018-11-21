<?php

function dbConnect($host, $dbname, $user, $pass) {
  try {
    $connStr = 'mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8';
    $dbConn = new PDO($connStr, $user, $pass);
  } catch (PDOException $e) {
    $dbConn = false;
  }
  return $dbConn;
}
