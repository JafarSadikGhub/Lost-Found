<?php
 session_start();

require("../header/header.php");
 $connect = mysqli_connect("localhost", "root", "", "a");
 ?>
 <!DOCTYPE html>
 <html>
      <head>

           <title>Centers Near You</title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
           <link href="css/gradient3.css" rel="stylesheet" type="text/css">
           <link href="css/style.css" rel="stylesheet">
      </head>
      <body>
           <div class="container" style="width:800px;">
                <h3 align="center">found</h3><br />
                <div class="tab-content">
                     <div id="products" class="tab-pane fade in active">
                     <?php
                     $user_id=$_SESSION['id'];
                     $query = "SELECT * FROM found WHERE user_id=$user_id";
                     $result = mysqli_query($connect, $query);
                     if(!$result)
                     {
                       printf("Error: %s\n", mysqli_error($connect));
                       exit();
                     }
                     while($row = mysqli_fetch_array($result))
                     {
                     ?>
                     <div class="col-md-4" style="margin-top:12px;">
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; height:400px;" align="center">
                               <img src="faceRecogv4Found/labeled_images/<?php echo $row["name"].'/'.$row["image_found1"]; ?>" class="img-responsive" /><br />
                               <h4><?php echo "<a href='found_details.php?ID={$row['foundId']}'>{$row['name']}</a>"; ?></h4>
                               <h4><?php echo "<a href='delete_found.php?ID={$row['foundId']}'>Delete</a>"; ?></h4>

                               <h4 class="text-warning"><?php echo "Father: " . $row["father"]; ?></h4>
                          </div>
                     </div>
                     <?php
                     }
                     ?>
                     </div>
                </div>
           </div>
      </body>
 </html>
