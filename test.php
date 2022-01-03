//Inserting login credentials into database
<?php
$name= $_POST['name'];
$username=  $_POST['username'];
$password=  $_POST['password'];
$email= $_POST['email'];
$dept= $_POST['dept'];
$year= $_POST['year'];
$sem= $_POST['sem'];



//Database connection

$host="localhost";
$dbUsername="root";
$dbPassword="";
$dbname="test";

$conn= new mysqli ($host, $dbUsername, $dbPassword, $dbname);
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}else{
    $stmt = $conn->prepare("insert into login(name, username, password,email,department,year,sem) values(?,?,?,?,?,?,?)");
    $stmt->bind_param("sssssss",$name,$username,$password,$email,$dept,$year,$sem);
    $stmt->execute();
    echo"registration successful";
    header('location:main.html');
    $stmt->close();
    $conn->close();
}
?>