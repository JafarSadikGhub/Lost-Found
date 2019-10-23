<?php
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];
$dob = $_POST['dob'];
$profession = $_POST['profession'];
$gender = $_POST['gender'];
$phone=$_POST['phone'];
$facebook=$_POST['facebook'];


//$param_password = password_hash($password, PASSWORD_DEFAULT);

if( !empty($fullname) || !empty($username) || !empty($email) || !empty($password) || !empty($address) || !empty($dob) || !empty($profession) || !empty($gender) || !empty($phone) || !empty($facebook))
{
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "lostnfound";


    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

    if(mysqli_connect_error())
    {
    	die('Connect Error('. mysqli_connect_errno(). ')' . mysqli_connect_error());
    }

    else
    {
    	//$SELECT = "SELECT email from user_info where email = ? Limit 1";
        $SELECT= "SELECT username from register where username = ? Limit 1";
        $password = password_hash($password, PASSWORD_DEFAULT);
    	$INSERT = "INSERT into register (fullname, username, email, password, address, dob, profession, gender, phone, facebook) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    	/*$stmt = $conn->prepare($SELECT);
    	$stmt->bind_param("s", $email);
    	$stmt->execute();
    	$stmt->bind_result($email);
    	$stmt->store_result();
    	$rnum = $stmt->num_rows;*/

        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($username);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

    	if($rnum == 0)
    	{
    		$stmt->close();
    		$stmt = $conn->prepare($INSERT);
    		$stmt->bind_param("ssssssssss", $fullname, $username, $email, $password, $address, $dob, $profession, $gender, $phone, $facebook);

           // $param_username = $username;

    		$stmt-> execute();
    		header('Location:login.php');
    		//echo "New Record inserted successfully";

    	}

    	else
    	{
    		echo "Somebody already registered using this username. Please try a new username";
    	}
    	$stmt->close();
    	$conn->close();




    }

}

else
{
	echo "All fields are required";
	die();
}










?>
