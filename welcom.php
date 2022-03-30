//Used to check if username and password matches
<?php
if($_POST){
$host="localhost";
$dbUsername="root";
$dbPassword="";
$dbname="test";
$username=$_POST['username'];
$password=$_POST['password'];
$conn=mysqli_connect($host,$dbUsername,$dbPassword,$dbname);
$query="SELECT * FROM login where username='$username' and password='$password'";
$result = mysqli_query($conn,$query);
if(mysqli_num_rows($result)==1)
{
    session_start();
    $_SESSION['test']='true';
    $_SESSION['username']=$username;
    //echo "Welcome,".$_SESSION['username'];
    header('location:frontpage.php');
    // header('location:Homepage.html'); //Will have to connect to Savi's part
    echo'successful';
}
else{echo'wrong username or password';}
}