//Inserting login credentials into database
<?php
$name= $_POST['name'];
$username=  $_POST['username'];
$password=  $_POST['password'];

//Database connection

$host="localhost";
$dbUsername="root";
$dbPassword="";
$dbname="test";

$conn= new mysqli ($host, $dbUsername, $dbPassword, $dbname);
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into login(name, username, password) values(?,?,?)");
    $stmt->bind_param("sss",$name,$username,$password);
    $stmt->execute();
    echo"registration successful";
    $stmt->close();
    $conn->close();
}
?>