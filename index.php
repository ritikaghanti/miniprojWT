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
session_start();
$conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname);
$user=$_SESSION['username'];
$email="";
$Year="";
$sem="";
// echo $user;
$query="SELECT * from login WHERE username='$user' "; 
$result=mysqli_query($conn,$query); 


            if($result-> num_rows > 0){
              while($row=$result->fetch_assoc()){
        
         echo "<h4>".$row['name']."</h4>";
        $email=$row['email'];
        $Year=$row['year'];
        $sem=$row['sem'];
      }
   }
   else{
   echo"0 result";
   }
   ?>

            <a href="edit.php">Edit info</a>
        </div>
        <div class="right">
            <div class="info">
                <h3>My Account</h3>
                <div class="info_data">
                    <div class="data">
                        <h4>Email</h4>
                        <p><?php echo $email ?></p>
                        <h4>Year</h4>
                            <p><?php echo $Year ?></p>
                            <h4>Sem</h4>
                        <p><?php echo $sem ?></p>
                    </div>
                    <div class="data">
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

    

</body>
</html>
