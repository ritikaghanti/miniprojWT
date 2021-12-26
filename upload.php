<?php
$host="localhost";
$dbUsername="root";
$dbPassword="";
$dbname="test";

$conn= new mysqli ($host, $dbUsername, $dbPassword, $dbname);

// if(isset(($_FILES['submit'])))
// {
// $title=$_POST["title"];
// $description=$_POST["description"];
// $year=$_POST["year"];


// $pname=rand(1000,10000)."-".$_FILES["file"]["name"];
// $tname=$_FILES["files"]["tmp_name"];
// $uploads_dir='uploads';
// move_uploaded_file($tname,$uploads_dir.'/'.$pname);
// $sql="INSERT into fileupload(FileName,file) values ('$title','$pname')";

// //$sql="INSERT into fileupload(FileName,description,year,file) values ('$title','$description','$year','$pname')";
// if(mysqli_query($conn,$sql)){
//     echo"connection successful";
// } else{
//     echo"connection not successful";
// }
// }
// else {
//     echo"work";
// }



if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}
else
{
    $title= $_POST["title"];
    $description=$_POST["description"];
    $year=$_POST["year"];


    $pname= rand(1000,10000)."-".$_FILES["file"]["name"];
    $tname=$_FILES["files"]["tmp_name"];
    $uploads_dir='uploads';
    move_uploaded_file($tname,$uploads_dir.'/'.$pname);
    //$sql="";

    //$sql="INSERT into fileupload(FileName,description,year,file) values ('$title','$description','$year','$pname')";
    //$sql="INSERT into fileupload(FileName,description,file) values ('$title','$description','$pname')";
    //$stmt = $conn->prepare("INSERT into fileupload(FileName,file) values (?,?)");
    $stmt = $conn->prepare("INSERT into fileupload(FileName,description,year,file) values (?,?,?,?)");
    $stmt->bind_param("ssss",$title,$description,$year,$pname);
    $stmt->execute();
    echo"file upload successful";
    header('location:uploadsuccess.html');
    $stmt->close();
    $conn->close();
}
?>