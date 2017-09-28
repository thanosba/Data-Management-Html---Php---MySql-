<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<title>Create a Table</title>
</head>
<body>
<?php 
ini_set ('display_errors', 1);
error_reporting (E_ALL & ~E_NOTICE);

// Connect and select.
if ($dbc = @mysql_connect ('localhost', 'username', 'password')) {
	
	if (!@mysql_select_db ('myblog')) {
		die ('<p>Could select the database because: <b>' . mysql_error() . '</b></p>');
	}

} else {
	die ('<p>Could not connect to MySQL because: <b>' . mysql_error() . '</b></p>');
}

// Define the query.
$query = 'CREATE TABLE blog_entries (
	blog_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	title VARCHAR(100) NOT NULL,
	entry TEXT NOT NULL,
	date_entered DATETIME NOT NULL
	)';

// Run the query.
if (@mysql_query ($query)) {
	print '<p>The table has been created.</p>';
} else {
	die ('<p>Could not create the table because: <b>' . mysql_error() . '</b>.</p><p>The query being run was: ' . $query . '</p>');
}
	
mysql_close(); // Close the connection.

?>
</body>
</html>
