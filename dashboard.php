<style>
body{
  background-color: grey;
}

.article{
  background-color: white;
  border-radius: 10px;
  margin: 20px;
  padding: 5px;
}
.name{
  color: blue;
}
</style>

<html>
    <head>
    </head>
    <body>
        <?php include 'header.php';?>
        
        <div class=" header" >
            <h1 style="color:white;"align="center"> Dashboard <h1>
        </div>
    
    <div style="color: blue"> <a href="add.php"> Add a article </a> </div>
    
    <div style="color: blue"> <a href="update.php"> Update a Article </a> </div>
  </body>


<?php
  session_start();
  //Get current username from session[given in Login.php]
  $username = $_SESSION['username'];
  

  $con = mysqli_connect("localhost","root","jayamkavan","Jayam");

  $qer = mysqli_query($con,"SELECT blogname FROM blog WHERE username = '$username';")or die("NO can do");

  //Print all blogs of the User.
  while ($a = mysqli_fetch_array($qer)) {
    disp($a['blogname'],$username);
  }

 function disp($value,$authorname)
 {
   $f = fopen("/home/jayam/workspace/Blog/".$value,"rw");
   $size = filesize("/home/jayam/workspace/Blog/");
   echo "<div class = 'article'>".fread($f,$size)."<div align=\"right\" class = \"name\">-$authorname</div>"."</div>";
 }
?>
