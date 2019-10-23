<?php
require_once("../connection.php");
//require_once("signup_cen.php");
session_start();

if(isset($_POST["update"]))
{
  /*$imgFile = $_FILES['profile']['name'];
  $tmp_dir = $_FILES['profile']['tmp_name'];
  $imgSize = $_FILES['profile']['size'];*/
  $updateUser= "UPDATE user SET
      phone='$_POST[phone]',
      house= '$_POST[house]',
      street= '$_POST[street]',
      zip= '$_POST[zip]',
      city= '$_POST[city]',
      state= '$_POST[state]',
      country= '$_POST[country]',
      gender='$_POST[gender]'


    where username= '$_SESSION[username]'";
    $query=mysqli_query($conn, $updateUser);

    $sqlSelect = "SELECT * FROM user
    WHERE username = '$_SESSION[username]'";
    $records=mysqli_query($conn, $sqlSelect);
    $count = mysqli_num_rows($records);

    if($count==1)
    {
      $field=mysqli_fetch_array($records);
      $_SESSION['phone']=$_field['phone'];
      $_SESSION['house']=$_field['house'];
      $_SESSION['street']=$_field['street'];
      $_SESSION['zip']=$_field['zip'];
      $_SESSION['city']=$_field['city'];
      $_SESSION['state']=$_field['state'];
      $_SESSION['country']=$_field['country'];
      $_SESSION['gender']=$_field['gender'];

    	header('Location: profile.php');

    }
    else {
      echo "Something Went wrong, please try again in a while...";
    }
    /*if(!empty($imgFile))
    {

    $upload_dir = 'image/'; // upload directory

    $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

    // valid image extensions
    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

    // rename uploading image
    $coverpic = rand(1000,1000000).".".$imgExt;

    // allow valid image file formats
    if(in_array($imgExt, $valid_extensions)){
    // Check file size '5MB'
    if($imgSize < 5000000) {
    move_uploaded_file($tmp_dir,$upload_dir.$coverpic);
    }
    else{
    $errMSG = "Sorry, your file is too large.";
    }
    }
    else{
    $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }

   //For Database Insertion
    // if no error occured, continue ....
    if(!isset($errMSG))
    {
    $que = "UPDATE user(profile) SET VALUES('" . $coverpic . "') WHERE username='$_SESSION[username]'";
    */
    /*if(mysqli_query($conn, $que))
    {
    echo "<script type='text/javascript'>alert('Posted succesfully.');</script>";
    }
    else
    {
    echo "<script type='text/javascript'>alert('error while inserting....');</script>";
  }*/

    }





    //Get Last Inserted Id
    $id=$_SESSION['id'];

    //Fetch Qquery
    $que = "SELECT profile FROM user where username='$_SESSION[username]'";
    $result = mysqli_query($conn, $que);
    $row=mysqli_fetch_assoc($result);







?>
