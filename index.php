<?php
//connection.php File 
//mysqli_connect("localhost","root",""); 
//mysql_select_db("test"); 
$localhost = "localhost"; #localhost
$dbusername = "root"; #username of phpmyadmin
$dbpassword = "";  #password of phpmyadmin
$dbname = "test";  #database name

session_start();
#connection string
$conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname);
$query="select * from login"; 
$result=mysqli_query($conn,$query); 
$user=$_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="astyle.css">
    <script src="https://kit.fontawesome.com/b99e6756e.js"></script>
    <title>profile-display</title>
</head>




<body style="background-image: url(back2.jpg);">
    <div class="wrapper">
        <div class="left">
            <img src="loginicon.png" alt="profile-pic">
            <?php
$localhost = "localhost"; #localhost
$dbusername = "root"; #username of phpmyadmin
$dbpassword = "";  #password of phpmyadmin
$dbname = "test";  #database name

#connection string
$conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname);
$query="select * from login"; 
$result=mysqli_query($conn,$query); 
$user=$_SESSION['username'];

            if($result-> num_rows > 0){
              while($row=$result->fetch_assoc()){
        
         echo "<h4>".$row['name']."</h4>";
        
      }
   }
   else{
   echo"0 result";
   }

//    $count="SELECT username FROM login where $user='username'";
//         $result=mysqli_query($conn,$query);
//         if($result-> num_rows > 0)
//         {
//             while($row=$result->fetch_assoc())
//             {
//             echo $row["username"];
//             }
//         }
//                 else
//         {
//         echo $connection->error;
//         }

   ?>

            <a href="edit.html">Edit info</a>
        </div>
        <div class="right">
            <div class="info">
                <h3>My Account</h3>
                <div class="info_data">
                    <div class="data">
                        <h4>Email</h4>
                        <p><?php echo $row["email"] ?></p>
                    </div>
                    <div class="data">
                        <h4><?php echo $row["year"] ?></h4>
                        <p><?php echo $row["sem"] ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>
</body>

</html>
