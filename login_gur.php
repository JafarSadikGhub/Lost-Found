<?php
// Initialize the session
session_start();
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: test.html");
  exit;
}
// Include connection file
require_once "connection.php";
//require_once "header.php";
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if GuardianUsername is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter GuardianUsername.";
    } else{
        $username = trim($_POST["username"]);
    }
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM user WHERE username = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            // Set parameters
            $param_username = $username;
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                // Check if GuardianUsername exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["GuardianId"] = $id;
                            $_SESSION["GuardianUsername"] = $username;
                            // Redirect user to welcome page
                            header("location: test.html");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if GuardianUsername doesn't exist
                    $username_err = "No account found with that GuardianUsername.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        // Close statement
        mysqli_stmt_close($stmt);
    }
    // Close connection
    mysqli_close($conn);
}
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Faces|Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  	<link rel="stylesheet" href="//icofont/css/icofont.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  	<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link href="css/login.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Play" rel="stylesheet">
  </head>
  <body>


    <div class="signin">

      <form action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <h2 style="color:#fff;">Log In</h2>
       <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
        <input type="text" name="username" placeholder="Username"/><br /><br />
        <span class="help-block"><?php echo $username_err; ?></span>
       </div>
       <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
        <input type="password" name="password" placeholder="Password" /><br /><br />
        <span class= "help-block"><?php echo $password_err; ?></span>
       </div>
        <!--<a href="cong.html">-->
        <button type="submit" value="submit">Login</button><br/><br />
        <div GuardianId="container">
          <a href="reset.html" style=" margin-right:0px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;">Reset password?</a>
          <a href="forgot.html" style=" margin-left:30px; font-size:13px; font-family:Tahoma, Geneva, sans-serif;">Forget password</a>
        </div><br>
        Don't have account ? <br><br>
        <a href="signup_cen.html"><input type="button" value="Sign up" onclick="myFunction()"><br>Sign Up As guardian</a>
        <a href="signup_gur.html"><input type="button" value="Sign up" onclick="myFunction()"><br>Sign Up as center</a>


      </form>
    </div>

  </body>
</html>
