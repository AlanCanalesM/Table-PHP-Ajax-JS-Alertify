/* Connecting to the database. */
<?php
	$serverName = "localhost";
	$connectionInfo = array("Database"=>"usuarios", "UID"=>"sa", "PWD"=>"alan123", "CharacterSet"=>"UTF-8");
	$con = sqlsrv_connect($serverName, $connectionInfo);

	

?>