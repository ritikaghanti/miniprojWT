<?php
// connect to the database
$host="localhost";
$dbUsername="root";
$dbPassword="";
$dbname="test";
$conn= new mysqli ($host, $dbUsername, $dbPassword, $dbname);
if($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);

}
else {
    $title= $_POST["title"];
    $description=$_POST["description"];
    $year=$_POST["year"];

// Uploads files
    if (isset($_POST['submit'])) { // if save button on the form is clicked
    // name of the uploaded file
    $filename = $_FILES['file-upload']['name'];

    // destination of the file on the server
    $destination = 'uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['file-upload']['tmp_name'];
    
    if (!in_array($extension, ['jpg', 'pdf', 'docx', 'jpeg'])) {
        echo "You file extension must be .jpg, .pdf or .docx or .jpeg";
    } 
     else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $stmt = $conn->prepare("INSERT into fileupload(FileName,description,year,file) values (?,?,?,?)");
    $stmt->bind_param("ssss",$title,$description,$year,$filename);
    $stmt->execute();
    echo"file upload successful";
    header('location:Dashboard.php');
    $stmt->close();
    $conn->close();
    }
    }
    }
}
?>