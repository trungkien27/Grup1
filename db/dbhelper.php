<?php
require_once('config.php');


function execute($sql) {
	
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	mysqli_set_charset($conn, 'utf8');

	
	mysqli_query($conn, $sql);

	
	mysqli_close($conn);
}


function executeResult($sql, $onlyOne = false) {
	
	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	mysqli_set_charset($conn, 'utf8');

	
	$resultset = mysqli_query($conn, $sql);

	if($onlyOne) {
		$data = mysqli_fetch_array($resultset, 1);
	} else {
		$data = [];
		while(($row = mysqli_fetch_array($resultset, 1)) != null) {
			$data[] = $row;
		}
	}
	
	mysqli_close($conn);

	return $data;
}

// function executeResult ($sql){
// 	$conn = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);

// 	$result = mysqli_query($conn , $sql);
// 	$data = [];
	
// 	if ($result!='') {
// 			while( ($row = mysqli_fetch_array($result , 1)) != null ){
// 			$data[] = $row;
// 		}
// 	}else{
// 		echo 'Kiem tra lai cau truy van: '.$sql;
// 	}

// 	mysqli_close($conn);
// 	return $data;
// }