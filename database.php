<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud_challenge";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   }catch(PDOException $err) {
       echo "Connection failed: " . $err->getMessage();
   }

function getData($sql, $method){
    global $conn;

    $statement = $conn->prepare($sql);
    $statement->execute();

    if($method == 'fetchall'){
        $result = $statement->fetch(PDO::FETCH_BOTH);
    }
    else {
        $result = $statement->fetchAll(PDO::FETCH_BOTH); 
    }
    return $result;
}
?>