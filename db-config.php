<?php

$hostname = 'localhost';
$db_name = 'db_vcontrol';
$db_user = 'root';
$db_pass = '';



///     CREATE DB AND UPDATE ALL PATCHES IF FIRST INSTALL       ///

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
	foreach( $patch_array as $sqlFile) {
		$patch_name = str_replace('db-patches/', '', $sqlFile);
		
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
		mysqli_query($con, "INSERT INTO db_patches (patch_name, updated) VALUES ('" . $patch_name . "','" . date('Y-m-d') . "')" );
	}
}





///     CONNECT TO DATABASE     ///
$db_con = mysqli_connect($hostname, $db_user, $db_pass, $db_name);
if (!$db_con) {
  die ("MySQL Connection error");
}




///     UPDATE DB IF THERE IS NEW PATCH     ///

// get all patches installed and patches in db_patches directory

$query = mysqli_query($db_con,"SELECT * FROM db_patches ORDER BY patch_id DESC LIMIT 1");	// get most recent patch installed from db
$db_patch_array = mysqli_fetch_array($query);	// the array of the most recent patch installed
$current_patch_version = $db_patch_array['patch_name'];	// return the name of the most recently installed patch

$count_query = mysqli_query($db_con,"SELECT * FROM db_patches");	// get all patches installed from db
$number_patches_installed = mysqli_num_rows ($count_query);	// count number of patches installed

$number_patch_files = count($patch_array);	// count the number of patch files in the db_patches directory


// install new patch if not already installed

if( $number_patch_files > $number_patches_installed ) {

// backup database before patching
exec ( 'mysqldump.exe --opt --skip-extended-insert --complete-insert --host=' . $hostname . ' --user=' . $db_user . ' --password="' . $db_pass . '" db_vcontrol>db-backups/backup' . date('Y-m-d') . '.sql' );
echo 'Database backed up successfully!';
    
// install new patches patches
for ( $i=$number_patches_installed; $i<($number_patch_files); $i++ ) {

	$next_patch = $patch_array[$i];	// return the file path of the next uninstalled patch in the db_patches directory
	$patch_name = str_replace('db-patches/', '', $next_patch);	// create patch name for db tracking

	// read the sql file and run each line as a mysqli_query
	$f = fopen($next_patch,"r+");
	$next_patch = fread($f, filesize($next_patch));
	$sqlArray = explode(';',$next_patch);
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
	mysqli_query($con, "INSERT INTO db_patches (patch_name, updated) VALUES ('" . $patch_name . "','" . date('Y-m-d') . "')" );
	$count_query = mysqli_query($db_con,"SELECT * FROM db_patches");	// get all patches installed from db
	$number_patches_installed = mysqli_num_rows ($count_query);	// count number of patches installed
	
	$query = mysqli_query($db_con,"SELECT * FROM db_patches ORDER BY patch_id DESC LIMIT 1");	// get most recent patch installed from db
	$db_patch_array = mysqli_fetch_array($query);	// the array of the most recent patch installed
	$current_patch_version = $db_patch_array['patch_name'];	// return the name of the most recently installed patch
}
}




///     DISPLAY CURRENT PATCH INFORMATION   ///
echo 'Current Patch Version: ' . $current_patch_version . '<br>';
echo 'Number Patches Installed: ' . $number_patches_installed . '<br>';
echo 'Number Patch Files: ' . $number_patch_files . '<br>';


?>


