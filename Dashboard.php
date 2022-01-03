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
$query="select * from student"; 
$result=mysqli_query($conn,$query); 
$user=$_SESSION['username'];

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
       <link rel="stylesheet" href="sidebar.css">   <!-- Stylesheet for sidebar  -->
      <link href="Style2.css" rel="stylesheet">    <!--Stylesheet for search bar -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
      <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   </head>
   <body style="background-image: url(back2.jpg);">
      <div class="btn">
         <span class="fas fa-bars"></span>
      </div>
      <nav class="sidebar">
         <div class="text">
            <h6>Welcome,<?php echo $user?> </h6>
            <a href="Dashboard.html" style="color: rgb(96, 100, 100); text-decoration: none;">Dashboard</a>
         </div>
         <ul>
            <li>
               <a href="#" class="feat-btn">My Notes
               <span class="fas fa-caret-down first"></span>
               </a>
               <ul class="feat-show">
                  <li><a href="Dashboard.php">View All Notes</a></li>
                  <li><a href="s_Upload.html">Upload Notes</a></li>
               </ul>
            </li>
            <li>
               <a href="#" class="serv-btn">My Account
               <span class="fas fa-caret-down second"></span>
               </a>
               <ul class="serv-show">
                  <li><a href="index.html">My Profile</a></li>
                  <li><a href="edit.html">Edit Profile</a></li>
               </ul>
            </li>
            <li><a href="main.html">Log Out</a></li>
         </ul>
      </nav>
      
      <!-- <form action="./" method="get">
         <div class="searchbar">
             <input type="text" class="searchbar__input" name="q" placeholder="Search Notes">
             <button type="submit" class="searchbar__button" >
               <i class="fa fa-search"></i>
             </button>
         </div> 
     </form> -->
<!--<img src="backgroumd.jpg" width=1200 height=600 align="right" hspace=3>  -->

<table class="paleBlueRows" align="right">
   <thead>
   <tr>
   <th>Filename</th>
   <th>Description</th>
   <!-- <th>Filetype</th> -->
   <!-- <th>Uploaded By</th> -->
   <!-- <th>Uploaded On</th> -->
   <th>Year</th>
   <!-- <th>Category</th> -->
   <th>Download Link</th>
   </tr>
   </thead>
   <?php
   $localhost = "localhost"; #localhost
   $dbusername = "root"; #username of phpmyadmin
   $dbpassword = "";  #password of phpmyadmin
   $dbname = "test";  #database name
    
   #connection string
   $conn = mysqli_connect($localhost,$dbusername,$dbpassword,$dbname);
   if($conn->connect_error){
      die('Connection Failed : '.$conn->connect_error);
   }
   $sql="SELECT * FROM fileupload";
   $result=$conn->query($sql);
   if($result-> num_rows > 0){
      while($row=$result->fetch_assoc()){
         // while($row=mysql_fetch_array($sql)){
         ?>
         <tr>
            <td><?php echo $row["FileName"] ?></td>
            <td><?php echo $row["description"] ?></td>
            <!-- <td><?php echo "uploaded" ?></td> -->
            <td><?php echo $row["year"] ?></td>
            <td><a download="<?php echo $row["file"] ?>" href=uploads/ <?php echo $row["file"] ?>"><?php echo $row["file"]?> </a></td>
            

       <?php  
      }
      echo"</table>";
   }
   else{
   echo"0 result";
   }
   $conn->close();
   ?>

   </tr>
   </table>
   
   <div class="dropdown">
      <button onclick="myFunction()" class="dropbtn">Filter By:</button>
      <div id="myDropdown" class="dropdown-content">
         <!-- <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()"> -->
         <a href="#year">Year</a>
         <a href="#semester">Semester</a>
         <a href="#dept">Department</a>
      </div>
   </div>
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
         
         /* JS code for filter */
      function myFunction() {
         document.getElementById("myDropdown").classList.toggle("show");
      }

      function filterFunction() {
         var input, filter, ul, li, a, i;
         input = document.getElementById("myInput");
         filter = input.value.toUpperCase();
         div = document.getElementById("myDropdown");
         a = div.getElementsByTagName("a");
         for (i = 0; i < a.length; i++) {
            txtValue = a[i].textContent || a[i].innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
               a[i].style.display = "";
            } else {
               a[i].style.display = "none";
            }
         }
      }
      </script>
   </body>
</html>
