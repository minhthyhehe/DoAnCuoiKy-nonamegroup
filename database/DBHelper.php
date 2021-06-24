<?php
require_once ('config.php');

function execute($sql) {
	//save data into table
	// open connection to database
	$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	//insert, update, delete
	mysqli_query($con, $sql);
	$last_id = mysqli_insert_id($con);
	//close connection
	mysqli_close($con);
	return $last_id;
}

function executeResult($sql) {
	//save data into table
	// open connection to database
	$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	//insert, update, delete
	$result = mysqli_query($con, $sql);
	$data   = [];
	if ($result != null) {
		while ($row = mysqli_fetch_array($result, 1)) {
			$data[] = $row;
		}
	}
	

	//close connection
	mysqli_close($con);

	return $data;
}

function executeSingleResult($sql) {
	//save data into table
	// open connection to database
	$con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	//insert, update, delete
	$result = mysqli_query($con, $sql);
	$row = null;
	if ($result != null) {
		$row    = mysqli_fetch_array($result, 1);
	}
	//close connection
	mysqli_close($con);

	return $row;
}