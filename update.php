<style>
textarea{
  font-family: serif;
  margin: 20px;
}
.body{
  padding: 10px;
}
</style>


<!DOCTYPE html>

<html>

  <head>
    <title> Add a blog entry.</title>
  </head>

  <body>

    <form id = "form" action="update.php" method="post">
      <label> <h1>Title:<h1></label>
      <input type="text" name = "title"/>
      <input type="submit" value="Submit name">
      
      <h1>Text: </h1>

          <?php
          
          
          $title = $_POST['title'];
          $f = fopen("/home/jayam/workspace/Blog/".$title,"rw");
          $size = filesize("/home/jayam/workspace/Blog/");

          //Let's verify the author of article.
          $con = mysqli_connect("localhost","root","jayamkavan","Jayam");
          $qer = mysqli_query($con,"SELECT username from blog where blogname = '$title';") or die("Can't Connect!!");
          

          session_start();
          $username = $_SESSION['username'];
          $a = mysqli_fetch_array($qer);

          //if the current user created the file.
          if($a[0] == $username){
          ?>

    <div style="width:60%; background-color:blue;" align=center>
    
    <?php
      echo fread($f,$size);
          }
      
      else{
        echo "NOT YOUR BLOG!!!!!";
      }
      
      $_SESSION['title'] = $title;
    ?>
    </div>
    </form>
    <form method="get" action="edit.php">
      <input type="submit" name="update" value="edit">
    </form>
  </body>
