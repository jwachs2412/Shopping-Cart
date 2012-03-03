<?php
require_once 'login.php';
header("Location: listProduct.php");

$db_server = mysql_connect($db_hostname, $db_username, $db_password);

if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());

mysql_select_db($db_database, $db_server)
	or die("Unable to select database: " . mysql_error());


if(isset($_POST['pname']) &&
isset($_POST['pprice']))

{
	$pid    = ('');
	$pname  = get_post('pname');
	$pprice = get_post('pprice');
	
	$query = "INSERT INTO products VALUES" .
			"('$pid', '$pname', '$pprice')";
			
	if (!mysql_query($query, $db_server))
		echo "INSERT failed: $query<br />" .
		mysql_error() . "<br /><br />";
	
	
		
}

mysql_close($db_server);

function get_post($var)
{
		return mysql_real_escape_string($_POST[$var]);
}


?>