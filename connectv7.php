<?php

$servername = "sql.steemsql.com:1433";
$username = "steemit";
$password = "steemit";


// Use try catch exception handling. Details: https://www.w3schools.com/PhP/php_exception.asp

try {

    // connect to SteemSQL via PDO. Make sure pdo and pdo_dblib extensions are enabled.
    $conn = new PDO("dblib:host=$servername;dbname=DBSteem", $username, $password);
    
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // print connection successful message if connection successful.
    if ($conn) {
        echo "Connection to database established.<br>";
    }
    // test query. Select the name column from the Accounts table where the Id is 29666. Result should be magicmonk.
    $sql = "SELECT name FROM Accounts WHERE Id='29666'";
    
    // execute the query. Store the results in sth variable.
    $sth = $conn->prepare($sql);
    $sth->execute();
    
    // print the results. If successful, magicmonk will be printed on page.
    while ($row = $sth->fetch(PDO::FETCH_NUM)) {
          echo $row[0];
        }

}

// if cannot connect to database, print error message    
catch(PDOException $e)  {
    echo "Connection failed: " . $e->getMessage();
}

// terminate connectiion
unset($conn); unset($sth);
  

?>  