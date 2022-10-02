<?php

// Define variables and initialize with empty values
$username = $password = $database = $table = $result = "";
$username_error = $password_error = $database_error = $table_error = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate database
    if(empty(trim($_POST["database"]))){
        $database_error = "*Please enter the name of the database you want to add password.*";
    } else{
            // Set parameters
			$database = trim($_POST["database"]);
        }
	
	  // Validate username
    if(empty(trim($_POST["username"]))){
        $username_error = "*Please enter the username in the table*";
    } else{
            $username = trim($_POST["username"]);
	}
    
    // Validate table
    if(empty(trim($_POST["password"]))){
        $table_error = "*Please enter the name of the table in the database.*";     
    } else{
        $table = trim($_POST["table"]);
    }
	
	
      // Validate password
    if(empty(trim($_POST["password"]))){
        $password_error = "*Please enter a password.*";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_error = "*Password must have atleast 6 characters.*";
    } else{
        $password = trim($_POST["password"]);
    }
	
	/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', $database );
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	
    
  // Check connection
if($link === false){
    $result=die("ERROR: Could not connect. " . mysqli_connect_error());
}

  // Check input errors before inserting in database
    if(empty($username_error) && empty($password_error) && empty($database_error) && empty($table_error)){

$sql="UPDATE students SET `password` = ? WHERE `username` = ?";
if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss",$param_password,$param_username);
            
            // Set parameters
			$param_username=trim($username);
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            
            // Attempt to execute the prepared statement
			if(mysqli_stmt_execute($stmt)){
				
			mysqli_stmt_store_result($stmt);
			$result="successfully updated";
			}
            // Close statement
            mysqli_stmt_close($stmt);
        }
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>POLEX PASSWORD INSERTER</title>
<style type="text/css" rel="stylesheet">
@import url("webfonts/ALBAS/stylesheet.css");

.center {
	text-align: center;
	vertical-align: middle;
	position: absolute;
	left: 50%;
	top: 10%;
	transform: translate(-50%,0%);
	background-color: rgba(0,0,0,0.5);
	height: 520px;
	width: 350px;
	padding: 0;
	border-radius: 10px;
	border: 1px solid rgba(255,153,0,1);
}
body {
	background-attachment: fixed;
	background-image: url(images/general/books2.jpg);
	background-repeat: no-repeat;
	height: 100%;
	width: 100%;
	background-size:cover;
}
.center div form div p {
}
.center h6 {
	background-color: rgba(255,153,0,1);
}
.center span {
	background-color: rgba(255,153,0,1);
	display: block;
	padding-top: 10px;
	padding-right: 5px;
	padding-bottom: 10px;
	padding-left: 5px;
	border-radius: 10px 10px 0px 0px;
	font-size: large;
	font-weight: bolder;
	color: rgba(0,0,0,1);
	font-family: ALBAS;
	margin-bottom: 20px;
}
.center div form div p input {
	border-top-width: 0px;
	border-right-width: 0px;
	border-bottom-width: 0px;
	border-left-width: 0px;
	margin: 0px;
	height: 30px;
	width: 220px;
}
.center div form div label {
	margin-bottom: 0px;
	margin: 0px;
	font-family: "Palatino Linotype", "Book Antiqua", Palatino, serif;
	font-weight: bold;
	color: rgba(255,153,0,0.9);
}
.center div form .button input {
	transition: background 0.5s,color 0.5s,box-shadow 0.5s,width 0.5s, height 0.5s;
	margin: 5px;
	height: 45px;
	width: 70px;
	border-radius: 22px;
	text-align: center;
	vertical-align: middle;
	background-color: rgba(0,0,0,0.5);
	color: rgba(255,255,255,1);
	border: 1px solid rgba(255,153,0,1);
	font-weight: bold;
}

.center div form .button input:hover {
	color:rgba(0,0,0,1);
	background: rgba(255,153,0,1);
	box-shadow: 0px 0px 9px 2px rgba(0,0,0,1);
	width:80px;
	height:50;
	
}
.center div form div p input[type=text],input[type=password] {
	padding-right: 5px;
	padding-left: 5px;
}
.logo {
	position: absolute;
}
</style>

</head>

<body>
<div class="logo"><img src="images/banner/pholexLogo.png" alt="logo" width="80" height="27"></div>
<div class="center"><span>PHOLEX PASSWORD INSERTER</span>
<div>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" >

<div class="<?php echo (!empty($database_error)) ? 'has-error' : ''; ?>">
<label>DATABASE:</label><p><input name="database" type="text" /></p>
<p><?php echo $database_error; ?></p>
</div>

<div class="<?php echo (!empty($table_error)) ? 'has-error' : ''; ?>">
<label>
TABLE:</label><p><input name="table" type="text" />
</p>
<p><?php echo $table_error; ?></p>
</div>

<div class="<?php echo (!empty($username_error)) ? 'has-error' : ''; ?>">
<label>
USERNAME:</label><p><input name="username" type="text" />
</p>
<p><?php echo $username_error; ?></p>
</div>

<div class="<?php echo (!empty($password_error)) ? 'has-error' : ''; ?>">
<label>PASSWORD:</label><p><input name="password" type="password" /></p>
<p><?php echo $password_error; ?></p>
</div>

<div class="button"><input name="Submit" type="submit" value="SUBMIT" /><input name="Reset" type="reset" value="RESET" />
</div>
<p><?php echo $result; ?></p>
</form>


</div>

</div>
</body>
</html>
