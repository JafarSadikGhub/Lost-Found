<?php
// Initialize the session
require("../header/header.php");
session_start();


// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
  header("location: ../issues/profile.php");
  exit;
}

$host = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbname = "a";


$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
// Include config file
//require_once "../../config.php";

// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
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
                            header("location: ../issues/profile.php");
                        } else{
                            // Display an error message if password is not valid
                            $password_err = "The password you entered was not valid.";
                        }
                    }
                } else{
                    // Display an error message if username doesn't exist
                    $username_err = "No account found with that username.";
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
<html>
	<head>
		<meta charset="utf-8">
		<title>FLO Log-In</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">
	</head>

	<body>
		<div class="wrapper" style="background-image: url('images/p4.jpg');">
			<div class="inner">
				<div class="image-holder">
					<img src="images/p3.jpg" alt="">
				</div>
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method= "POST">

					<h3>FLO Log-In</h3>
					<div class="form-wrapper <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
						<input type="text" name="username" placeholder="Username" class="form-control">
            <i class="zmdi zmdi-account"></i>
            <span class="help-block"><?php echo $username_err; ?></span>

					</div>
					<div class="form-wrapper <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
						<input type="password" name="password" placeholder="Password" class="form-control">
            <i class="zmdi zmdi-lock"></i>
            <span class= "help-block"><?php echo $password_err; ?></span>

					</div>

					<button type="submit" value="submit">Get In
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
          Don't have an account? <a href="../signup.html">Sign-In here</a>

				</form>
			</div>
		</div>

	</body>
</html>
