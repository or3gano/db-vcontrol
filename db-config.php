<?php

$hostname = 'localhost';
$db_name = 'db_vcontrol';
$db_user = 'root';
$db_pass = '';



/// CREATE DB AND UPDATE ALL PATCHES IF FIRST INSTALL ///
$con = mysqli_connect($hostname, $db_user, $db_pass);	// db connecttion
$db_exists = mysqli_select_db($con,$db_name);


// puts all patch files into an array
if ($handle = opendir('db-patches')) {
	$patch_array = array();
    while (false !== ($file = readdir($handle))) {
		if ($file != "." && $file != "..") {
			$patch_array[] = 'db-patches/' . $file;
		}
    }
    closedir($handle);
}


// runs all patch files
if(!$db_exists) {
	$version = 1;
	foreach( $patch_array as $sqlFile) {
		$patch_name = 'Patch ' . $version;
		
		// read the sql file
		$f = fopen($sqlFile,"r+");
		$sqlFile = fread($f, filesize($sqlFile));
		$sqlArray = explode(';',$sqlFile);
		foreach ($sqlArray as $stmt) {
		  if (strlen($stmt)>3 && substr(ltrim($stmt),0,2)!='/*') {
			$result = mysqli_query($con, $stmt);
			if (!$result) {
			  $sqlErrorCode = mysqli_errno($con);
			  $sqlErrorText = mysqli_error($con);
			  $sqlStmt = $stmt;
			  break;
			}
			else {
			  $sqlErrorCode = 0;
			}
		  }
		}

		// result messages
		if (!$sqlErrorCode) {
		  echo $patch_name . " executed succesfully!<br>";
		}
		else {
		  echo "An error occured during installation!<br/>";
		  echo "Error code: $sqlErrorCode<br/>";
		  echo "Error text: $sqlErrorText<br/>";
		  echo "Statement:<br/> $sqlStmt<br/>";
		}
		mysqli_select_db($con,$db_name);
		mysqli_query($con, "INSERT INTO db_patches (patch_name, updated) VALUES ('" . $patch_name . "','" . date('Y-m-d') . "')" );
		$version++;
	}
}




/*
///CONNECT TO DATABASE
$db_con = mysqli_connect($hostname, $db_user, $db_pass, $db_name);
if (!$db_con) {
  die ("MySQL Connection error");
}




///UPDATE DB IF THERE IS NEW PATCH
// check for new patch
$patch_version = mysqli_query($db_con,'SELECT * FROM db_patches ORDER BY patch_id DESC LIMIT 1') + 1;
$sqlFile = 'patch' . $patch_version . '.sql';	// patch file name
if 

// read the sql file
$f = fopen($sqlFile,"r+");
$sqlFile = fread($f, filesize($sqlFileToExecute));
$sqlArray = explode(';',$sqlFile);
foreach ($sqlArray as $stmt) {
  if (strlen($stmt)>3 && substr(ltrim($stmt),0,2)!='/*') {
    $result = mysqli_query($stmt);
    if (!$result) {
      $sqlErrorCode = mysqli_errno();
      $sqlErrorText = mysqli_error();
      $sqlStmt = $stmt;
      break;
    }
  }
}
if ($sqlErrorCode == 0) {
  echo "Script is executed succesfully!";
} else {
  echo "An error occured during installation!<br/>";
  echo "Error code: $sqlErrorCode<br/>";
  echo "Error text: $sqlErrorText<br/>";
  echo "Statement:<br/> $sqlStmt<br/>";
}
//
///
*/

?>


