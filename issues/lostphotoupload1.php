<?php
session_start();
  $db = mysqli_connect("localhost", "root", "", "a");
 // header("lost_details.php");
  $msg = "";
$ID= $_GET['ID'];
echo $ID;
//  $ID=mysqli_real_escape_string($db, );

  if(isset($_POST['upload'])) {
  	$image_lost1 = $_FILES['image_lost1']['name'];
    $fnameFinal= "";
    $fname= mysqli_query($db, "SELECT name from lost WHERE LostId= '$ID'");
    while ($row = $fname->fetch_assoc()) {
    $fnameFinal= $row['name'];
    //echo $fnameFinal."<br>";
  }
  echo $fnameFinal;
  	//$image_text = mysqli_real_escape_string($db, $_POST['image_text']);
  	$target ="faceRecogV4Lost/labeled_images/".$fnameFinal. '/'.basename($image_lost1);

  	$sql = "UPDATE lost SET
      image_lost1= '$image_lost1' WHERE LostId= '$ID'";
    mysqli_query($db, $sql);
    /*if($sql)
    {
      echo "successfull";
      echo "id===".$ID;

    }
    else
    {
      echo mysqli_error($db);
    }*/

  	if (move_uploaded_file($_FILES['image_lost1']['tmp_name'], $target)) {
  	$msg = "Image uploaded successfully";
  	}else{
  	$msg = "Failed to upload image";
    }
  }

/*  else
  {
    header('location:lost_details.php');

  }*/

  //$result = mysqli_query($db, "SELECT * FROM images");
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
<title>Image Upload</title>
<style type="text/css">

   #content{
   width: 50%;
   margin: 20px auto;
   border: 1px solid #cbcbcb;
   }
   form{
   width: 50%;
   margin: 20px auto;
   }
   form div{
   margin-top: 5px;
   }
   #img_div{
   width: 80%;
   padding: 5px;
   margin: 15px auto;
   border: 1px solid #cbcbcb;
	    background: #767272;
	   color: white;
   }
   #img_div:after{
   content: "";
   display: block;
   clear: both;

   }
   img{
   float: left;
   margin: 5px;
   width: 300px;
   height: 140px;
   }
</style>
</head>
<body>
<div id="content">
  <?php
    /*while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img src='images/".$row['image']."' >";
      	echo "<p>".$row['image_text']."</p>";
      echo "</div>";
    }*/

  echo "<form action='lostphotoupload1.php?ID=$ID' method='POST' enctype='multipart/form-data'>" ?>
  	<input type="hidden" name="size" value="1000000">
  	<div>
  	  <input type="file" name="image_lost1">
  	</div>
  	<div class="form-wrapper">
         Upload a Photo:
  	    <button type="submit" name="upload">Upload

        </button>
    </div>
    <a href="profile.php"> <span style="color:red">Back To Your Profile</span> </a>

  </form>
</div>
</body>
</html>
