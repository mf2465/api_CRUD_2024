<?php
class Database{

private $host = 'localhost';
private $user = 'id22362038_rest_api_demo';
private $password = 'Costamar393$';
private $database = 'id22362038_rest_api_demo'; 

public function getConnection(){ 
$conn = new mysqli($this->host, $this->user, $this->password, $this->database);
if($conn->connect_error){
die("Error failed to connect to MySQL: " . $conn->connect_error);
} else {
return $conn;
}
}
}
?>