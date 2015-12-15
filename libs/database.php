<?php
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($mysqli->connect_errno){
    echo 'Kan niet verbinden (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error;
}

mysqli_set_charset($mysqli,"utf8");