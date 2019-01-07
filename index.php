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
        <div style="color:white;"align="center" class=" header" >
        
            <p  align="right">
        
                <input type="button" value="Register" onclick="window.location.href='Register.php'"></input>
        
                <input type="button" value="Login" onclick="window.location.href='Login.php'"></input>
            </p>
      
            <h1> HomePage</h1>
        </div>
  </body>


  <?php
    //Start the current Sessin.
    session_start();

    //Get Database Connection.
    $con = mysqli_connect("localhost","root","jayamkavan","Jayam");

    $qer = mysqli_query($con,"SELECT username,blogname FROM blog;")or die("NO can do");

    //Iterate over all results of Query
    while ($a = mysqli_fetch_array($qer)) {
      disp($a['blogname'],$a['username']);
    }

   function disp($value,$authorname)
   {
     $f = fopen("Blog/".$value,"rw");
     echo "<div class = 'article'>".fread($f,10000)."<div align=\"right\" class = \"name\">-$authorname</div>"."</div>";
   }
  ?>
