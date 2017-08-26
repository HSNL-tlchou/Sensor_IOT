<?php
//setting header to json
header('Content-Type: application/json');

//database
define('DB_HOST', 'node-red-db.coyycnldhfix.ap-northeast-1.rds.amazonaws.com');
define('DB_USERNAME', 'hsnl33564');
define('DB_PASSWORD', 'hsnl33564');
define('DB_NAME', 'node_red');

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}

//query to get data from the table
$query = sprintf("select temp,timestamp from node_red.soil_info where '2017-05-07 00:52:55' < timestamp and timestamp < '2017-05-08 03:52:07'");

//execute query
$result = $mysqli->query($query);

//loop through the returned data
$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);
