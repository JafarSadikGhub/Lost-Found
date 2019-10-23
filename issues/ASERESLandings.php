<?php
session_start();
$result = mysqli_query($connect, $query);
while($row = mysqli_fetch_array($result)) {
    echo $row['name'] . "<br />";
}
?>
