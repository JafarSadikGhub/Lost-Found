<?php 
     // $a = ["Apple","Orange","Grape"];
     require_once("../connection.php");
     //conn
     $qry=mysqli_query($conn, "SELECT * from lost");
     //$result=mysqli_query($conn, "SELECT count(1) FROM lost");
     //$row=mysqli_fetch_array(result);
     //$total=$row[0];
     //echo "Total rows: " . $total;
     $array=[];
     $rows=mysqli_num_rows($qry);
     //echo "rows:-" . $rows;
     while($row = mysqli_fetch_array($qry))
     {
         $array[] = $row['name'];
         
     }
?>
<script type="text/javascript">var jArray =<?php echo json_encode($array); ?>;</script>
<script type="text/javascript" src="t2.js"></script>