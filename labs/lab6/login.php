<?php
    session_start(); 
    
    $errorMessage = $_SESSION['message'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
</head>

<body>
  <div>
    <header>
      <h1>Otter Express - Admin Login</h1>
    </header>
    <?php 
      if(errorMessage){
        echo "<div>$errorMessage</div>";

      }
    ?>
    <div></div>
    <div>
        
        <form method="post" action="loginProcess.php">
            
            Username: <input type="text" name="username" /> <br />
            Password: <input type="password" name="password" /> <br />
            <input type="submit" value="Login" name="loginForm" />
            
        </form>
      
    </div>

    <footer>
    </footer>
    
    
  </div>
</body>
</html>
