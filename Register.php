<style>
#left{
    font-size: 17;
    text-align: right;
    padding: 10px;
    margin:auto;
    display: inline-block;
    width: 40%;
    vertical-align: top;
}
#right{
    text-align: left;
    display: inline-block;
    padding: 10px;
    margin:auto;
        vertical-align: top;
}
#main{
  width: 80%;
  background-color: white;
  border-radius: 10px;
  margin: auto;
  vertical-align:  middle;
  padding: 20px;

}

body{
  background-color: silver;
}
form{
  vertical-align:middle;
}

</style>

<html>
    <head>
        <title> Register Page. </title>
    </head>

  <body>
      <?php include 'header.php'; ?>
      
      <div class=" header" >
          <h1 style="color:white;"align="center"> Register Now! <h1>
      </div>
      
        <div id="main" >
          <form method="POST" action="Register.php">
              <div>
              <div id= "left"> <label> Username: </label> </div>
              <div id= "right" > <input name="username" type="text"/></div>
            </div>
      
            <div>
                <div id= "left"> <label> Password </label> </div>
                <div id= "right"> <input name="password" type="password"/>  </div>
            </div>
            
            <br>
            <br>
            <br>
            <br>
            
            <div align= "center"> <input type="submit" value="Create Account"/></div>

          </form>
        </div>
  </body>
</html>

<?php
  $username = $_POST["username"] or die("No Prob");
  $password = $_POST["password"];
  $con = mysqli_connect("localhost","root","jayamkavan","Jayam");
  if(!$con)
      echo "<p> Cannot Connect.<br>Please Try Again Later</p>";
  
    //Insert new User's password/username into the database.
    
    $sec = mysqli_query($con,"INSERT INTO Users(username,password) VALUES('$username','$password')") or die(echo "<p> Udername taken.";);
  echo "User Created";
?>
