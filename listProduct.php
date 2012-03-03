<?php
require_once 'login.php';

$db_server = mysql_connect($db_hostname, $db_username, $db_password);

if (!$db_server) die("Unable to connect to MySQL: " . mysql_error());

mysql_select_db($db_database, $db_server)
	or die("Unable to select database: " . mysql_error());
	
$query = "SELECT * FROM products";
$result = mysql_query($query);

if(!result) die ("Database access failed: " . mysql_error());
$rows = mysql_num_rows($result);
?>
<u><strong>LIST OF OUR PRODUCTS</strong></u>
<?php
for ($j = 0; $j < $rows; ++$j)
{
		$row = mysql_fetch_row($result);
		echo <<<_END
<pre>
 Product Name: $row[1]
Product Price: $$row[2]
</pre>
_END;
}

mysql_close($db_server);
	
?>