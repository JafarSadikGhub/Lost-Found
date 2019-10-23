<?php
 session_start();


 $connect = mysqli_connect("localhost", "root", "", "a");
 ?>
 <!DOCTYPE html>
 <html>
      <head>

           <title>Centers Near You</title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

           <script>
           function showUser(str) {
               if (str == "") {
                   document.getElementById("txtHint").innerHTML = "";
                   return;
               } else {
                   if (window.XMLHttpRequest) {
                       // code for IE7+, Firefox, Chrome, Opera, Safari
                       xmlhttp = new XMLHttpRequest();
                   } else {
                       // code for IE6, IE5
                       xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                   }
                   xmlhttp.onreadystatechange = function() {
                       if (this.readyState == 4 && this.status == 200) {
                           document.getElementById("txtHint").innerHTML = this.responseText;
                       }
                   };
                   xmlhttp.open("GET","getuser.php?q="+str,true);
                   xmlhttp.send();
               }
           }
           </script>
           <link href="css/gradient3.css" rel="stylesheet" type="text/css">
           <link href="css/style.css" rel="stylesheet">
      </head>
      <body>
      <a href="userprofile.php">Your Profile</a><br>
      <a href="logout.php">Logout</a>
        <div class="search-container">
   			<form>
   				<input type="text" placeholder="Search.." name="search" onkeyup="showUser(this.value)">
   			</form>
        <p><span id="txtHint"></span></p>
   		</div>
           <br />
           <div class="container" style="width:800px;">
                <h3 align="center">Centers Near You</h3><br />
                <div class="tab-content">
                     <div id="products" class="tab-pane fade in active">
                     <?php
                     $query = "SELECT * FROM lost ORDER BY id ASC";
                     $result = mysqli_query($connect, $query);
                     while($row = mysqli_fetch_array($result))
                     {
                     ?>
                     <div class="col-md-4" style="margin-top:12px;">
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; height:400px;" align="center">
                               <img src="images_center/<?php echo $row["profile"]; ?>" class="img-responsive" /><br />
                               <h4><?php echo "<a href='center_details.php?ID={$row['id']}'>{$row['cenname']}</a>"; ?></h4>

                               <h4 class="text-danger"><?php echo "Charge/hr: &#2547;" . $row["price"]; ?></h4>
                               <b><span style="color:#008080;">Enter the Estimated Hours You need your kid to be served:</span></b>
                               <input type="text" name="quantity" id="quantity<?php echo $row["id"]; ?>" class="form-control" value="1" />
                               <input type="hidden" name="hidden_name" id="name<?php echo $row["id"]; ?>" value="<?php echo $row["cenname"]; ?>" />
                               <input type="hidden" name="hidden_price" id="price<?php echo $row["id"]; ?>" value="<?php echo $row["price"]; ?>" />
                               <input type="button" name="add_to_cart" id="<?php echo $row["id"]; ?>" style="margin-top:5px;" class="btn btn-warning form-control add_to_cart" value="Book" />
                          </div>
                     </div>
                     <?php
                     }
                     ?>
                     </div>  <div id="cart" class="tab-pane fade">
                          <div class="table-responsive" id="order_table">
                               <table class="table table-bordered">
                                    <tr>
                                         <th width="40%">Center Name</th>
                                         <th width="10%">Hours</th>
                                         <th width="20%">Price</th>
                                         <th width="15%">Total</th>
                                         <th width="5%">Action</th>
                                    </tr>
                                    <?php
                                    if(!empty($_SESSION["childcare"]))
                                    {
                                         $total = 0;
                                         foreach($_SESSION["childcare"] as $keys => $values)
                                         {
                                    ?>
                                    <tr>
                                         <td><?php echo $values["cenname"]; ?></td>
                                         <td><input type="text" name="quantity[]" id="quantity<?php echo $values["product_id"]; ?>" value="<?php echo $values["hours"]; ?>" data-product_id="<?php echo $values["product_id"]; ?>" class="form-control quantity" /></td>
                                         <td align="right">&#2547;<?php echo $values["charge_per_hr"]; ?></td>
                                         <td align="right">&#2547; <?php echo number_format($values["hours"] * $values["charge_per_hr"], 2); ?></td>
                                         <td><button name="delete" class="btn btn-danger btn-xs delete" id="<?php echo $values["product_id"]; ?>">Remove</button></td>
                                    </tr>
                                    <?php
                                              $total = $total + ($values["hours"] * $values["charge_per_hr"]);
                                         }
                                    ?>
                                    <tr>
                                         <td colspan="3" align="right">Total</td>
                                         <td align="right">&#2547; <?php echo number_format($total, 2); ?></td>
                                         <td></td>
                                    </tr>
                                    <tr>
                                         <td colspan="5" align="center">
                                              <form method="post" action="front_p_cart.php">
                                                   <input type="submit" name="place_order" class="btn btn-warning" value="Place Order" />
                                              </form>
                                         </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                               </table>
                          </div>
                     </div>
                </div>
           </div>
      </body>
 </html>
 <script>
 $(document).ready(function(data){
      $('.add_to_cart').click(function(){
           var product_id = $(this).attr("id");
           var center_name = $('#name'+product_id).val();
           var charge_per_hr = $('#price'+product_id).val();
           var hours = $('#quantity'+product_id).val();
           var action = "add";
           if(hours > 0)
           {
                $.ajax({
                     url:"action.php",
                     method:"POST",
                     dataType:"json",
                     data:{
                          product_id:product_id,
                          center_name:center_name,
                          charge_per_hr:charge_per_hr,
                          hours:hours,
                          action:action
                     },
                     success:function(data)
                     {
                          $('#order_table').html(data.order_table);
                          $('.badge').text(data.cart_item);
                          alert("Booking has been added to your Dashboard. Please confirm!");
                     }
                });
           }
           else
           {
                alert("Please Enter Number of Hours")
           }
      });
      $(document).on('click', '.delete', function(){
           var product_id = $(this).attr("id");
           var action = "remove";
           if(confirm("Are you sure you want to remove this product?"))
           {
                $.ajax({
                     url:"action.php",
                     method:"POST",
                     dataType:"json",
                     data:{product_id:product_id, action:action},
                     success:function(data){
                          $('#order_table').html(data.order_table);
                          $('.badge').text(data.cart_item);
                     }
                });
           }
           else
           {
                return false;
           }
      });
      $(document).on('keyup', '.quantity', function(){
           var product_id = $(this).data("product_id");
           var quantity = $(this).val();
           var action = "quantity_change";
           if(quantity != '')
           {
                $.ajax({
                     url :"action.php",
                     method:"POST",
                     dataType:"json",
                     data:{product_id:product_id, quantity:quantity, action:action},
                     success:function(data){
                          $('#order_table').html(data.order_table);
                     }
                });
           }
      });
 });
 </script>
