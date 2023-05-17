<?php
define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PASSWORD","");
define("DB_NAME","palengkenation");

//create conn
$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//check conn
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}