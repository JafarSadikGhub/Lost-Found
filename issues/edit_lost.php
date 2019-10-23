<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "a");
 // header("lost_details.php");
  $msg = "";
$ID= $_GET['ID'];
if(isset($_POST['update']))
{
    $sql= "UPDATE lost SET
    $name='$_POST[name]',
    $age='$_POST[age]',
    $height='$_POST[height]',
    $father='$_POST[father]',
    $mother='$_POST[mother]',
    $lostdt='$_POST[lostdt]',
    $lostlocation='$_POST[lostlocation]',
    $color='$_POST[color]',
    $wearing='$_POST[wearing]',
    $contact='$_POST[contact]',
    $address='$_POST[address]',
    $other='$_POST[other]'

    WHERE LostId= '$ID'";
    mysqli_query($db, $sql);
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Registration</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

		<!-- STYLE CSS -->
		<link rel="stylesheet" href="css/style.css">

   <script src="jquery.js"></script>
   <script>
   $(function(){
     $("#includedContent").load("../header/header.html");
   });
   </script>


	</head>

	<body>
			<?php include '../header/header.php'; ?>
		<div class="wrapper" style="background-image: url('images/p4.jpg');">
        <div id="includedContent"></div>
			<div class="inner">
				<div class="image-holder">
					<img src="images/p3.jpg" alt="">
				</div>
				<form action="edit_found.php" method="POST">
					<h3>Lost Issue Entry Form</h3>
           <span style="color:green"><b>Try to fillup all the fields. Write n/a if not applicable </b> </span>
					<div class="form-wrapper">
						<input type="text" name="name" placeholder="Full Name" class="form-control">
					</div>
					<div class="form-group">
						<input type="text" name="father" placeholder="Father's Name" class="form-control">
            <input type="text" name="mother" placeholder="Mother's Name" class="form-control">
					</div>
          <div class="form-group">
						<input type="text" name="age" placeholder="Age" class="form-control">
            <input type="text" name="height" placeholder="Height" class="form-control">
					</div>
          <div class="form-group">
						<input type="text" name="lostdt" placeholder="Found Date" class="form-control">
            <input type="text" name="lostlocation" placeholder="Found Location" class="form-control">
					</div>
          <div class="form-group">
						<input type="text" name="color" placeholder="Skin-Tone" class="form-control">
            <input type="text" name="wearing" placeholder="Dress" class="form-control">
					</div>
          <div class="form-group">
						<input type="text" name="address" placeholder="Detailed Address" class="form-control">
            <input type="text" name="contact" placeholder="Contact No." class="form-control">
					</div>
					<div class="form-wrapper">
						<input type="text" name="other" placeholder="Others" class="form-control">
					</div>



					<button type="submit" name="submit">Submit
						<i class="zmdi zmdi-arrow-right"></i>
					</button>
				</form>
			</div>
		</div>

	</body>
</html>
