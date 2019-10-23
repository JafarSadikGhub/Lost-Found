<?php
session_start();
       require_once("../config.php");
       //require_once("header.php");
       if(!isset($_SESSION['username']))
       {
               header("location: login.php");
       }
       $username=$_SESSION['username'];
       //$cenname='';
       //$username='';
       $fullname='';
       $email='';
       $address='';
       $profession='';
       $phone='';
       $facebook=''
       //$area='';
       //$profile='';
       //$lastId= $conn->insert_id;
       //$email=$_SESSION['email'];
       $getquery=mysqli_query($conn, "SELECT * FROM register WHERE username = '$name'");
       while($rows=mysqli_fetch_assoc($getquery))
       {
       $username=$rows['username'];
       $fullname=$rows['name'];
       $address=$rows['address'];
       $profession=$rows['profession'];
       $phone=$rows['phone'];
       $facebook=$rows['facebook'];
       //$profile=$_FILES['profile']['tmp_name'];



       }

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
  </head>
  <body>
    <div class="container emp-profile">
                <form method="post">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="profile-img">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                                <div class="file btn btn-lg btn-primary">
                                    Change Photo
                                    <input type="file" name="file"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="profile-head">
                                        <h5>
                                            <?php echo $fullname; ?>
                                        </h5>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="lostissues.php" role="tab" aria-controls="profile" aria-selected="false"><span style="color:red">Lost-Issues</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="foundissues.php" role="tab" aria-controls="profile" aria-selected="false"><span style="color:green">Found-Issues</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Edit Profile</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="profile-work">
                                <p>COMMUNICATION LINKs</p>
                                <a href="chats.php">Message</a><br/>
                                <?php echo "<a href='mailto:".$email."?Subject=Contact%20Form&body=This is content' target="_top">".$email."</a>";?>
                                <a href="">Call</a><br/>
                                <?php echo "<a href='.$facebook.'>Facebook</a>";?>
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
                                                    <p><?php echo $username;?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Name</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $fullname ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Email</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $email;?></p>
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
                                                    <label>Profession</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $profession;?></p>
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
