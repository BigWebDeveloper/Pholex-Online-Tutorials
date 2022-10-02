<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: welcomepage.php");
  exit;
}
 
// Include config file
require_once "php/config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_error = $password_error = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_error = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
	
	  // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_error = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_error) && empty($password_error)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM students WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if username exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location:student_home.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_error = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_error = "No account found with that username.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
	}
?>

<!doctype html>
<!--[if lt IE 7]> <html class="ie6 oldie"> <![endif]-->
<!--[if IE 7]>    <html class="ie7 oldie"> <![endif]-->
<!--[if IE 8]>    <html class="ie8 oldie"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="">

<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Home</title>
<link href="boilerplate/boilerplate.css" rel="stylesheet" type="text/css">
<link href="css/layout.css" rel="stylesheet" type="text/css">
<link href="css/animate.CSS" rel="stylesheet" type="text/css">
<link href="css/font.css" rel="stylesheet" type="text/css">
<!-- 
To learn more about the conditional comments around the html tags at the top of the file:
paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/

Do the following if you're using your customized build of modernizr (http://www.modernizr.com/):
* insert the link to your js here
* remove the link below to the html5shiv
* add the "no-js" class to the html tags at the top
* you can also remove the link to respond.min.js if you included the MQ Polyfill in your modernizr build 
-->
<!--[if lt IE 9]>
<script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="boilerplate/respond.min.js"></script>
<script src="SpryAssets/SpryEffects.js" type="text/javascript"></script>
<script type="text/javascript">
function MM_effectSquish(targetElement)
{
	Spry.Effect.DoSquish(targetElement);
}
function MM_effectSlide(targetElement, duration, from, to, toggle)
{
	Spry.Effect.DoSlide(targetElement, {duration: duration, from: from, to: to, toggle: toggle});
}
</script>
<script type="text/javascript" src="script/jquery.js"></script>
</head>
<body>
<div class="gridContainer clearfix" >
  <div id="banner" onClick="MM_effectSlide('banner', 1000, '100%', '0%', false)">
    <div id="top">
    	<a href="index.html" title="Pholex Online Tutorial"><img src="images/banner/pholexLogo.png" alt="logo" width="80" height="27"></a>

    </div>
    <div id="middle" >
   	  <div id="margin" class="bounceIn"><img src="images/banner/pholexLogo.png" alt="Pholexlogo"></div>
     </div>
  </div>
  <div id="main">
    <div id="section1">
      <div id="up">
        <div id="s1logo"><img src="images/banner/pholexLogo.png" alt="s1logo" width="80" height="27"></div>
        <div id="s2">
          <div id="s2a">
          <center>PHOLEX ONLINE TUTORIAL</center>
          <center id="font"><blockquote>Login with the password sent to you by pholex</blockquote></center>
          </div>
          <div id="s2b">LOGIN FORM</div>
        </div>
      </div>
      <div id="down">
        <div id="setmagin"><form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" name="loginform" id="loginform">
		
        	<p class="<?php echo (!empty($username_error)) ? 'has-error' : ''; ?> " >
			<input name="username" type="text" id="firstname" placeholder="Username" size="" value="">
			<div class="help-block"><?php echo $username_error; ?></div>
			</p>
            
            <p class="<?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
			<input name="password" type="password" id="password" placeholder="Password" size="10">
			<div class="help-block"><?php echo $password_error; ?></div>
			</p>	
			
            <h3 class="right"><input name="lo
            gin" type="submit" id="login" value="LOGIN"></h3>
            <h3 class="left"><input name="reset" type="reset" id="reset" value="RESET"></h3>
        </form>
        <marquee>please make sure you sign in with the correct username and password.</marquee>
        </div>
        <p>&nbsp;</p>	
      </div>
    </div>
    <div id="section2"><img src="images/general/study.jpg" alt="study" width="100%" height="100%">
    </div>
  </div>
  </div>
</body>
</html>
