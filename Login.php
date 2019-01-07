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
        <title> Login Page. </title>
    </head>

  <body>
        <?php include 'header.php';?>
    
    <div class=" header" >
        <h1 style="color:white;"align="center"> Login <h1>
    </div>
      
    <div id="main" >
        <form method="POST" action="Login.php">
            <div>
                <div id= "left"> <label> Username: </label> </div>
                <div id= "right" > <input name="username" type="text"/></div>
            </div>
            
            <div>
                
                <div id= "left"> <label> Password </label> </div>
                <div id= "right"> <input name="password" type="password"/></div>
            </div>
            
            <br>
            <br>
            <br>
            <br>
            
              <div align= "center"> <input type="submit" value="Login"/></div>
          </form>
        </div>
  </body>
</html>

<?php
//get username and password.
$username  = $_POST["username"] or die("No Prob");
$password = $_POST["password"] or die("GEt off");


$con = mysqli_connect("localhost","root","jayamkavan","Jayam");

//If connection failed.
if(!$con)
    echo "<p> Cannot Connect.<br>Please Try Again Later</p>";

$sec = mysqli_query($con,"SELECT password FROM Users WHERE
                    username = '$username'");

$a = mysqli_fetch_array($sec  );

//If username exists AND password matches-
if($sec && ($a["password"] == $password)){
  
  //Login the user with help of sessions.
  session_start();
  $_SESSION['username'] = "$username";
  
  //Redirect to Dashboard.
  header("Location: dashboard.php");
  exit;
}
else {
    echo "Invalid Username/Password";
}

http_redirect("dashboard.php");

?>
