<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<title>Edit a Blog Entry</title>
</head>
<body>
<?php 
ini_set ('display_errors', 1);
error_reporting (E_ALL & ~E_NOTICE);

// Connect and select.
if ($dbc = @mysql_connect ('localhost', 'username', 'password')) {
	
	if (!@mysql_select_db ('myblog')) {
		die ('<p>Select the database because: <b>' . mysql_error() . '</b></p>');
	}

} else {
	die ('<p>Not connect to MySQL because: <b>' . mysql_error() . '</b></p>');
}

if (isset ($_POST['submit'])) { // Handle the form.
	
	// Define the query.
	$query = "UPDATE blog_entries SET title='{$_POST['title']}', entry='{$_POST['entry']}' WHERE blog_id={$_POST['id']}";
	$r = mysql_query ($query); // Execute the query.
	
	// Report on the result.
	if (mysql_affected_rows() == 1) {
		print '<p>Blog entry has been updated.</p>';
	} else {
		print "<p>Update the entry because: <b>" . mysql_error() . "</b>. The query was $query.</p>";
	}

} else { // Display the entry in a form.

	// Check for a valid entry ID in the URL.
	if (is_numeric ($_GET['id']) ) {
	
		// Define the query.
		$query = "SELECT * FROM blog_entries WHERE blog_id={$_GET['id']}";
		if ($r = mysql_query ($query)) { // Run the query.
		
			$row = mysql_fetch_array ($r); // Retrieve the information.
			
			// Make the form.
			print '<form action="edit_entry.php" method="post">
		<p>Entry Title: <input type="text" name="title" size="40" maxsize="100" value="' . $row['title'] . '" /></p>
		<p>Entry Text: <textarea name="entry" columns="40" rows="5">' . $row['entry'] . '</textarea></p>
		<input type="hidden" name="id" value="' . $_GET['id'] . '" />
		<input type="submit" name="submit" value="Update this Entry!" />
		</form>';
	
		} else { // Couldn't get the information.
			print "<p>Retrieve the entry because: <b>" . mysql_error() . "</b>. The query was $query.</p>";
		}

	} else { // No ID set.
		print '<p><b>Must have made a mistake in using this page.</b></p>';
	}

} // End of main IF.

mysql_close(); // Close the database connection.

?>
</body>
</html>
