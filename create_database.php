<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<title>Create the Database</title>
</head>
<body>
<?php 
ini_set ('display_errors', 1);
error_reporting (E_ALL & ~E_NOTICE);

// Attempt to connect to MySQL and print out messages.
if ($dbc = @mysql_connect ('localhost', 'username', 'password')) {
	
	print '<p>Successfully connected to MySQL.</p>';
	
	if (@mysql_query ('CREATE DATABASE myblog')) {
		print '<p>The database has been created.</p>';
	} else {
		die ('<p>Could not create the database because: <b>' . mysql_error() . '</b></p>');
	}
	
	if (@mysql_select_db ('myblog')) {
		print '<p>The database has been selected.</p>';
	} else {
		die ('<p>Could not select the database because: <b>' . mysql_error() . '</b></p>');
	}
	
	mysql_close(); // Close the connection.

} else {

	die ('<p>Could not connect to MySQL because: <b>' . mysql_error() . '</b></p>');

}

?>
</body>
</html>
