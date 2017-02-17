<!-- orderform.php -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">  
 <head>
 <title>PHP Test</title>
 
 </head>
 <body>

<?php

try 
{
//-- 1.0 Database connection
	// Connecting, selecting database
	$pdo = new PDO("mysql:host=$hostname;dbname=mysql", $username, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
//-- 2.0 SQL select statement
	$query = 'SELECT 
	P.lID
	,P.sDescription
	,D.sValue
	FROM details as P
	LEFT JOIN decode as D
	ON D.tType = P.tType;';
	
	$stmt = $pdo->query( $query );

//-- 3.0  Setting up the form
	echo '<form method="post" action="receipt.php">';
//-- 4.0 Basic one shot input boxes for the user name and email
	echo "Name: <input type='type' name='buyername'> <br>";
	echo "Email: <input type='type' name='email'> <br> <br> <br>";
//-- 4.1 Column name		
	echo "Quantity: <br>";
//-- 5.0 Create a inputbox with the name of the unique item key from the database
	while ( $line = $stmt->fetch()) 
	{
		echo "<input type='text' name={$line['lID']}>";
		echo " : {$line['sDescription']}<br>";
	}
//-- 6.0 Setup the submit button		
	echo "<input type='submit' value='Send order'>";
	echo "</form>";

	
} 
catch ( Exception $e )
{ 
    echo $e->getMessage();
} 
?>
</body>
</html>
