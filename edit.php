
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="astyle.css">
    <!-- <script src="https://kit.fontawesome.com/b99e6756e.js"></script> -->
    <title>profile-display</title>
</head>

<body style="background-image: url(back2.jpg);">
    <form action="account.php" method="POST" enctype="multipart/form-data">

        <div class="wrapper">
            <div class="left">
                <!-- <img src=" loginicon.png" alt="profile-pic">
                <label for="file-upload" class="custom-file-upload">
                    <input type="file" id="file-upload">Upload
                </label> -->
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
                
                $user=$_SESSION['username'];
                //$query="select * from login WHERE username=".$user; 
                
                $stmt = $conn->prepare("select * from login WHERE username=?");
                
                $stmt->bind_param("s",$user);
                $stmt->execute();
                // $stmt->store_result();
                
                $result = $stmt->get_result();
                //$row = $result->fetch_assoc();
                // $result=mysqli_query($conn,$query); 
                // $stmt->close();
                // $conn->close();

                // if($result-> num_rows > 0){
                while($row=$result->fetch_assoc()){
         
                ?>
                <label for="fname" class="form_label for-left">Name</label>
                <input class="form_field" value="<?php echo $row['name'] ?>" required type="text" name="fname">
            

                <input class="form_field" value="<?php echo $row['department']?>" required type="text" name="dept">
                <label for="dept" class="form_label for-left">Department</label>



                <!-- <label for="fname" class="form_label for-left">Name</label>
                <input class="form_field" value="<?php echo $row['name'] ?>" required type="text" name="fname">
            

                <label for="dept" class="form_label for-left">Department</label>
                <input class="form_field" value="<?php echo $row['department'] ?>" required type="text" name="dept"> -->

                
                <input type="submit" name="submit">
                <!-- <a href="uploadsuccess.html">Save info</a> -->
     
       
               </div>
                <div class="right">
                <div class="info">
                    <h3>Edit My Account</h3>
                    <div class="info_data">                   
                    <div class="data">

                            <input class="form_field" value="<?php echo $row['email'] ?>" required type="email" name="email">
                            <label for="email" class="form_label">Email</label>

                            <input class="form_field" value="<?php echo $row['sem'] ?>" required type="text" name="sem">
                            <label for="sem" class="form_label">Semester</label>
                        </div>
                        
                        <div class="data">

                            <input class="form_field" value="<?php echo $row['year'] ?>" required type="text" name="year">
                            <label for="year" class="form_label">Year</label>
                        </div>
                        
                    </div>
                </div>
                <div>
                    <a href="Dashboard.php">Back</a>
                </div>
                <?php
            }
   ?>           
            </div>
        </div>
        </div>
        </div>
    </form>
    <script>
         $('.btn').click(function(){
           $(this).toggleClass("click");
           $('.sidebar').toggleClass("show");
         });
           $('.feat-btn').click(function(){
             $('nav ul .feat-show').toggleClass("show");
             $('nav ul .first').toggleClass("rotate");
           });
           $('.serv-btn').click(function(){
             $('nav ul .serv-show').toggleClass("show1");
             $('nav ul .second').toggleClass("rotate");
           });
           $('nav ul li').click(function(){
             $(this).addClass("active").siblings().removeClass("active");
           });
      </script>

</body>
</html>