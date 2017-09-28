<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
	<title>Add a Blog Entry</title>
</head>
<body>
<?php 
ini_set ('display_errors', 1);
error_reporting (E_ALL & ~E_NOTICE);

if (isset ($_POST['submit'])) { // Handle the form.

	// Connect and select.
	if ($dbc = @mysql_connect ('localhost', 'username', 'password')) {
		
		if (!@mysql_select_db ('myblog')) {
			die ('<p>Select the database because: <b>' . mysql_error() . '</b></p>');
		}
	
	} else {
		die ('<p>Not connect to MySQL because: <b>' . mysql_error() . '</b></p>');
	}
	
	
	// Define the query.
	$query = "INSERT INTO blog_entries (blog_id, title, entry, date_entered) VALUES ('{$_POST['title']}', '{$_POST['entry']}', NOW())";
	
	// Execute the query.
	if (@mysql_query ($query)) {
		print '<p>The entry has been added.</p>';
	} else {
		print "<p>Add the entry because: <b>" . mysql_error() . "</b>. The query was $query.</p>";
	}

	mysql_close();

} 

// Display the form.
?>
<form action="add_entry.php" method="post">
<p>Entry Title: <input type="text" name="title" size="40" maxsize="100" /></p>
<p>Entry Text: <textarea name="entry" cols="40" rows="5"></textarea></p>
<input type="submit" name="submit" value="Add to the Blog!" />
</form>
</body>
</html>
