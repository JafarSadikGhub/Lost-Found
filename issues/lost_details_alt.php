<?php
session_start();
        $user_id= $_SESSION['id'];
        if(isset($_GET['ID']))
        {
          require_once("../connection.php");
          require_once("../header/header.php");
          //$name=$_SESSION['username'];
          $ID=mysqli_real_escape_string($conn, $_GET['ID']);
          $name='';
          //$username='';
          $age='';
          $height='';
          $father='';
          $mother='';
          $lostdt='';
          $lostlocation='';
          $color='';
          $wearing='';
          $contact='';
          $address='';
          $other='';


          //$profile='';
          //$lastId= $conn->insert_id;
          //$email=$_SESSION['email'];
          $getquery=mysqli_query($conn, "SELECT * FROM lost WHERE LostId ='$ID'");
          if(!$getquery)
          {
            printf("Error: %s\n", mysqli_error($conn));
            exit();
          }
          while($rows=mysqli_fetch_assoc($getquery))
          {
          $name=$rows['name'];
          $age=$rows['age'];
          $height=$rows['height'];
          $father=$rows['father'];
          $mother=$rows['mother'];
          $lostdt=$rows['lostdt'];
          $lostlocation=$rows['lostlocation'];
          $color=$rows['color'];
          $wearing=$rows['wearing'];
          $contact=$rows['contact'];
          $address=$rows['address'];
          $other=$rows['other'];
          $user_id=$rows['user_id'];
          //$phone=$rows['phone'];
          //$profile=$_FILES['profile']['tmp_name'];



          }
        }
        else {
          header('location:lost_list.php');
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
                                //$id=$_SESSION['id'];
                                $ID=mysqli_real_escape_string($conn, $_GET['ID']);
                                $file_path ='lost_images/';
                                $image_query=mysqli_query($conn, "select image_lost1, name from lost where LostId=$ID");
                                if (!$image_query) {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
}
                                while($rows = mysqli_fetch_array($image_query))
                {
                    $img_name = $rows['image_lost1'];
                    $name1 = $rows['name'];
                    //$img_src = $rows['img_path'];
                              ?>
                              <img src="faceRecogV4Lost/labeled_images/<?php echo $name1.'/'.$img_name; ?>" class="img-responsive" height="250" width="200" /><br />
                            </div>
                            <?php
            }
        ?>
                        </div>


                        <div class="col-md-6">
                            <div class="profile-head">
                                        <h5>
                                            <?php echo $name; ?>
                                        </h5>
                                        <nav class="navbar navbar-expand-sm   navbar-light bg-warning">
                                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                                              <span class="navbar-toggler-icon"></span>
                                            </button>

                                            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                                              <ul class="navbar-nav mr-auto mt-2 mt-lg-0">





                                                <li class="nav-item">
                                                  <a class="nav-link" href="profile.php"><span style="color:green">Your Profile</span></a>
                                                </li>

                                              </ul>
                                            </div>
                                          </nav>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="profile-work">


                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tab-content profile-tab" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Name: </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $name; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Name</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $name; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Age: </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $age; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Height: </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $height; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Father: </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $father; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Mother: </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $mother; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Lost Date: </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $lostdt; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Lost Location: </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $lostlocation; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Skin-Tone: </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $color; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Dress: </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $wearing; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Address: </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $address; ?></p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Other Information: </label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?php echo $other; ?></p>
                                                </div>
                                            </div>
                                            <h5><?php echo "Go to the Issue updater Profile: <a href='profile_alt.php?ID=$user_id'>Profile</a>"; ?></h5>

                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

  </body>
</html>
