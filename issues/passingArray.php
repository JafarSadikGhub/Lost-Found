<?php
   /* require_once("../connection.php");
    //conn
    $qry=mysqli_query($conn, "SELECT * from lost");
    //$result=mysqli_query($conn, "SELECT count(1) FROM lost");
    //$row=mysqli_fetch_array(result);
    //$total=$row[0];
    //echo "Total rows: " . $total;
    $array=[];
    $rows=mysqli_num_rows($qry);
    echo "rows:-" . $rows;
    while($row = mysqli_fetch_array($qry))
    {
        $array[] = $row['name'];
        
    }*/
    $array1=["ALU", "Potol", "begun"];
    
?>

<script type="text/javascript">var jarray1=<?php echo json_encode($array1); ?>;</script>
<script type="text/javascipt" src="pa.js"></script>