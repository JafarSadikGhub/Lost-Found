<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$con = mysqli_connect('localhost','root','','a');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$q = $_REQUEST["q"];
//mysqli_select_db($con,"ajax_demo");
$sql="SELECT * FROM found WHERE `name` LIKE '$q%'";
$result = mysqli_query($con,$sql);
$resultCheck=mysqli_num_rows($result);

if($resultCheck>0){

    echo "<table>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<a href='../issues/found_details.php?ID={$row['foundId']}'>{$row['name']}</a><br>";
    echo "</tr>";
}
echo "</table>";
mysqli_close($con);

}else{
    echo "No result";

}

?>


</body>
</html>
