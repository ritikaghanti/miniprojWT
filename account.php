<?php
$host="localhost";
$dbUsername="root";
$dbPassword="";
$dbname="test";

$conn= new mysqli ($host, $dbUsername, $dbPassword, $dbname);

$message = '';

if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
    echo"not working";
}
else
{
    $data= array(
    $fname= $_POST["fname"];
    $class=$_POST["dept"];
    $email=$_POST["email"];
    $year=$_POST["year"];
    //$sem=$_POST["sem"];
    // $img=$_POST["file-upload"];
);

echo "name".$fname;
    // $pname= rand(1000,10000)."-".$_FILES["files"]["name"];
    // $tname=$_FILES["files"]["tmp_name"];
    // $uploads_dir='pictures';
    // move_uploaded_file($tname,$uploads_dir.'/'.$pname);

    $stmt = $conn->prepare("INSERT INTO account(name,class,email,year) VALUES (?,?,?,?)");
    $stmt->bind_param("ssss",$fname,$class,$email,$year);


   $query = "
   UPDATE login 
   SET  fname= fname,
        class = dept,
        email= email,
        year=year,
   WHERE username=username";
   $upd = $conn->prepare("UPDATE login SET  fname=?, class=? ,email=?,year=? WHERE username=?);
    $upd->bind_param("sssss",$fname,$class,$email,$year,$username);
   
    $statement = $connect->prepare($query);

    $statement->execute($data);

    $stmt->execute();
    echo"file upload successful";
    header('location:uploadsuccess.html');
    $stmt->close();
    $conn->close();
}
?>