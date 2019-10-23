<?php
session_start();
       require("../header/header.php");
       require_once("../connection.php");
       if(isset($_GET['ID']))
       {
         //$username=$_SESSION['username'];
         $ID=mysqli_real_escape_string($conn, $_GET['ID']);
         //$cenname='';
         //$username='';
         $firstname='';
         $lastname='';
         $email='';
         $house='';
         $street='';
         $zip='';
         $city='';
         $state='';
         $country='';
         //$address='';
         $phone='';

         //$area='';
         //$profile='';
         //$lastId= $conn->insert_id;
         //$email=$_SESSION['email'];
         $getquery=mysqli_query($conn, "SELECT * FROM user WHERE id = '$ID'");
         while($rows=mysqli_fetch_assoc($getquery))
         {
         $username=$rows['username'];
         $firstname=$rows['firstname'];
         $lastname=$rows['lastname'];
         $email=$rows['email'];
         $house=$rows['house'];
         $street=$rows['street'];
         $zip=$rows['zip'];
         $city=$rows['city'];
         $state=$rows['state'];
         $country=$rows['country'];
         $phone=$rows['phone'];
         //$profile=$_FILES['profile']['tmp_name'];



         }

       }
       //require_once("header.php");
       /*if(!isset($_SESSION['username']))
       {
               header("location: login.php");
       }*/

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="profilecss/style.css"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- MATERIAL DESIGN ICONIC FONT -->
    <link rel="stylesheet" href="../temp_fonts/material-design-iconic-font/css/material-design-iconic-font.min.css">

    <!-- STYLE CSS -->
    <link rel="stylesheet" href="../temp_css/style.css">
  </head>
  <body>


    <div class="container emp-profile">
                <form method="POST">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="profile-img">
                              <?php
                                require_once("../connection.php");
                                $id=mysqli_real_escape_string($conn, $_GET['ID']);
                                $file_path ='profile_images/';
                                $image_query=mysqli_query($conn, "select profile from user where id=$id");
                                if (!$image_query) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
                                while($rows = mysqli_fetch_array($image_query))
                {
                    $img_name = $rows['profile'];
                    //$img_src = $rows['img_path'];
                              ?>
                              <img src="profile_images/<?php echo $img_name; ?>" class="img-responsive" height="250" width="200" /><br />
                            </div>
                            <?php
            }
        ?>
                        </div>
                        <div class="col-md-6">
                            <div class="profile-head">
                                        <h5>
                                            <?php echo $firstname. " " .$lastname; ?>
                                        </h5>
                                        <!--<nav class="navbar navbar-expand-sm   navbar-light bg-warning">
                                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                                              <span class="navbar-toggler-icon"></span>
                                            </button>

                                            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                                              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                                                <li class="nav-item">
                                                  <a class="nav-link" href="lost_list.php">Lost Issues <span class="sr-only">(current)</span></a>
                                                </li>
                                                <li class="nav-item">
                                                  <a class="nav-link" href="found_list.php">Found Issues</a>
                                                </li>
                                                <li class="nav-item">
                                                  <a class="nav-link" href="editprofile.html">Edit Profile</a>
                                                </li>
                                                <li class="nav-item">
                                                  <a class="nav-link" href="#">Matched Results.</a>
                                                </li>


                                              </ul>
                                            </div>
                                          </nav>-->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="profile-work">
                                <p>COMMUNICATION LINKs</p>
                                <a href="chats.php">Message</a><br/>

                                <a href="">Call</a><br/>
                                <a href="#">Facebook</a><br/>
                              
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tab-content profile-tab" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Username</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $username; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Name</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $firstname. " " .$lastname; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Email</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $email; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Phone</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $phone; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Address</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo "Flat and house: " . $house . "  Area: " . $street . "  Zip-Code: " . $zip . "<br>" . "  City: " .
                                                    $city. "  State: " . $state . "  Country: " . $country; ?></p>
                                                </div>
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

  </body>
</html>
