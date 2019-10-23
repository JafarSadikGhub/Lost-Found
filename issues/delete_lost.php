<?php
if(isset($_GET['ID']))
{
  require_once("../connection.php");
  require_once("../header/header.php");
  $ID=mysqli_real_escape_string($conn, $_GET['ID']);
  $sql="DELETE FROM lost WHERE LostId='$ID'";
  $query=mysqli_query($conn, $sql);
  if(!$query)
  {
    printf("Error: %s\n", mysqli_error($conn));
    exit();
  }
  echo "Deleted Successfully";

}
?>
