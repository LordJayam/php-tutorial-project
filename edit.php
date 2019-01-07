<html>

  <head>
    <title> Add a blog entry.</title>
  </head>

  <body>

  		<form method="post" action="edit.php">
  		<textarea name = "blog" rows="24" cols="120">
  			<?php
  			session_start();
  			$title = $_SESSION['title'];
  			echo $title."\n\n\n";
  			$f = fopen("/home/jayam/workspace/Blog/".$title,"rw");
            $size = filesize("/home/jayam/workspace/Blog/");

            echo fread($f, $size);
            ?>

  		</textarea>

  		<input type="submit" name="submit" value ="sumbit"/>
  		</form>
  		<?php
  		 $bl = $_POST["blog"] or die("You're my Sunflower!!");
	  		 $f = fopen( "/home/jayam/workspace/Blog/".$title,"w");
         fwrite($f,$bl);
         ?>
  </body>
  <body>