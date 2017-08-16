<?php
  session_start();
  // connect to database
  $db = mysql_connect("localhost", "root", "", "registration");

  if (isset($_POST['register_bin'])) {
  	session_start();
  	$username = mysql_real_escape_string($_POST['username']);
  	$email = mysql_real_escape_string($_POST['email']);
  	$password = mysql_real_escape_string($_POST['password']);
  	$password2 = mysql_real_escape_string($_POST['password2']);
    
    if ($password == $password2) {
        //creat user
         $password = nd5($password); //hash password before storing for security purposes
         $sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
         mysql_query($db, $sql);
         $_SESSION['message'] = "You are now logged in";
         $_SESSION['message'] = $username;
         header("location: home.php");
    }else{
    	//failed
    	$_SESSION['message'] = "The two password do not match";
    }


  }


?>

<html>
<head>
  <title>Register page</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="header">
	<h1>Registration Page</h1>
</div>
<form method="post" action="rgister.php">
  <table>
     <tr>
        <td>Username:</td>
        <td><input type="text" name="username" class="textInput"></td>

     </tr>
     <tr>
        <td>Email:</td>
        <td><input type="email" name="email" class="textInput"></td>

     </tr>
     <tr>
        <td>Password:</td>
        <td><input type="password" name="password" class="textInput"></td>

     </tr>
     <tr>
        <td>Password again:</td>
        <td><input type="password" name="password2" class="textInput"></td>

     </tr>
     <tr>
        <td></td>
        <td><input type="submit" name="register_bin" value="Register"></td>

     </tr>

  </table>

</form>
</body>


</html>