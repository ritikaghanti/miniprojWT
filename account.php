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


//     if($message == '')
//   {
//    $data = array(
//     ':user_name'    => $_POST["user_name"],
//     ':user_avatar'   => $user_avatar,
//     ':user_birthdate'  => $_POST["user_birthdate"],
//     ':user_gender'   => $_POST["user_gender"],
//     ':user_address'   => $_POST["user_address"],
//     ':user_city'    => $_POST["user_city"],
//     ':user_zipcode'   => $_POST["user_zipcode"],
//     ':user_state'    => $_POST["user_state"],
//     ':user_country'   => $_POST["user_country"],
//     ':register_user_id' => $_POST["register_user_id"]
//    );

// $query = "
//    UPDATE register_user 
//    SET user_name = :user_name, 
//    user_avatar = :user_avatar, 
//    user_birthdate = :user_birthdate, 
//    user_gender = :user_gender, 
//    user_address = :user_address, 
//    user_city = :user_city, 
//    user_zipcode = :user_zipcode, 
//    user_state = :user_state, 
//    user_country = :user_country 
//    WHERE register_user_id = :register_user_id
//    ";


//    $query = "
//    UPDATE login 
//    SET  fname= fname,
//    class = :dept,
//    email= :email,
//    year=:year,
//    WHERE username=:username";
   
//    name = :fname, 
//    class = :class, 
//    email = :email,
//    year = :year
//    WHERE register_user_id = :register_user_id
//    ";

//    $statement = $connect->prepare($query);

//    $statement->execute($data);

    $stmt->execute();
    echo"file upload successful";
    header('location:uploadsuccess.html');
    $stmt->close();
    $conn->close();
}
?>