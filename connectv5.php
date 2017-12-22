<?php

// Only works with PHP v5 with mssql extension enabled. If unsure how to do this, read the article at https://steemit.com/cn/@magicmonk/php-steemsql-using-php-to-connect-to-the-steemsql-database
// Outgoing traffic to port 1433 needs to be unblocked. May need to speak to web host technician for this.

// establish connection to server
$connection = mssql_connect("sql.steemsql.com:1433", "steemit", "steemit") or die('Could not connect to the server!');

// select DBSteem database
mssql_select_db('DBSteem') or die('Could not select a database');

// if connection established, print success message
if ($connection) {
  echo "Connection established via PHP5 mssql. <br>";
}

// run first SQL query on the database. Select the name column from the accounts table where the ID is 29666.
$SQL = "SELECT name FROM Accounts WHERE Id='29666'";

// store the results in the results variable
$result = mssql_query($SQL) or die('A error occured: ' . mysql_error());

// fetch the row in the result
$row = mssql_fetch_array($result);

// print out the result. If 'magicmonk' is displayed, it means the query was successful.
echo $row[0];
                                                    
// close connection
mssql_close($connection);
?>
