<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<title>Connect to MySQL</title>
</head>
<body>
<?php 
ini_set ('display_errors', 1);
error_reporting (E_ALL & ~E_NOTICE);

// Attempt to connect to MySQL and print out messages.
if ($dbc = @mysql_connect ('localhost', 'username', 'password')) {
	
	print '<p>Successfully connected to MySQL.</p>';
	
	mysql_close(); // Close the connection.

} else {

	die ('<p>Not connect to MySQL because: <b>' . mysql_error() . '</b></p>');

}

?>
</body>
</html>
