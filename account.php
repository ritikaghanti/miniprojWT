<?php
$host="localhost";
$dbUsername="root";
$dbPassword="";
$dbname="test";

$conn= new mysqli ($host, $dbUsername, $dbPassword, $dbname);

if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
    echo"not working";
}
else
{
    $fname= $_POST["fname"];
    $class=$_POST["fclass"];
    $email=$_POST["email"];
    $year=$_POST["year"];
    $sem=$_POST["sem"];
    $img=$_POST["file-upload"];

    $pname= rand(1000,10000)."-".$_FILES["files"]["name"];
    $tname=$_FILES["files"]["tmp_name"];
    $uploads_dir='pictures';
    move_uploaded_file($tname,$uploads_dir.'/'.$pname);

    $stmt = $conn->prepare("INSERT into account(name,class,email,year,image,sem) values (?,?,?,?,?,?)");
    $stmt->bind_param("ssssss",$fname,$class,$email,$year,$pname,$sem);
    $stmt->execute();
    echo"file upload successful";
    header('location:uploadsuccess.html');
    $stmt->close();
    $conn->close();
}
?>