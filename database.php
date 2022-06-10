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

    if($method == 'fetch'){
        $result = $statement->fetch(PDO::FETCH_LAZY);
    }
    else {
        $result = $statement->fetchAll(PDO::FETCH_ASSOC); 
    }
    return $result;
}
    
?>