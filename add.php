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

    <form id = "form" action="add.php" method="post">
      
      <label> <h1>Add Title:<h1></label>
      <input type="text" name = "title"/>
      <h1> Add Text: <h1>
      <textarea name="blog" rows="24" cols="120">
      </textarea>
      <input type="submit" value="Submit">
  
    </form>

  </body>
  
  <?php
  session_start();

  //Get the value of blog textarea.
  $bl = $_POST["blog"] or die("You're my Sunflower!!");
  $title = $_POST["title"] or die("Fuck ya MOFO!!");
  
  //Write the user's input into the files.
  $f = fopen( "Blog/".$title,"w");
  fwrite($f,$bl);

  $username = $_SESSION["username"];
  $con = mysqli_connect("localhost","root","jayamkavan","Jayam");

  //Update the database.
  $q = mysqli_query($con,"INSERT INTO blog(username, blogname)
  VALUES ('$username','$title')") or die ("Fuck you in the ear!!");
  echo "Done";

  //Redirect to dashboard.
  header("Location: dashboard.php");


  ?>
</html>
