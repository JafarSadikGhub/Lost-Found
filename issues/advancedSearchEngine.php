<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "a");
//$query="";
if(isset($_POST['submit'])) {
    // define the list of fields
    $fields = array('name', 'father', 'mother', 'age', 'color', 'wearing', 'lostlocation');
    $conditions = array();

    // loop through the defined fields
    foreach($fields as $field){
        // if the field is set and not empty
        if(isset($_POST[$field]) && $_POST[$field] != '') {
            // create a new condition while escaping the value inputed by the user (SQL Injection)
            $conditions[] = "`$field` LIKE '%" . mysqli_real_escape_string($connect, $_POST[$field]) . "%'";
        }
    }

    // builds the query
    $query = "SELECT * FROM lost ";
    // if there are conditions defined
    if(count($conditions) > 0) {
        // append the conditions
        $query .= "WHERE " . implode (' AND ', $conditions); // you can change to 'OR', but I suggest to apply the filters cumulative
        header('location:ASERESLandings.php');
    }


    /*$result = mysqli_query($connect, $query);
    while($row = mysqli_fetch_array($result)) {
        echo $row['name'] . "<br />";
    }*/
}
    ?>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">
      <head>
        <meta charset="utf-8">
        <title></title>
      </head>
      <body>
        <table>
        <form method="POST" action="advancedSearchEngine.php">
               <tr>
                   <td>Name:</td>
                   <td><input type="text" name="name" /></td>
               </tr>
               <tr>
                   <td>father:</td>
                   <td><input type="text" name="father" /></td>
               </tr>
               <tr>
                   <td>mother:</td>
                   <td><input type="text" name="mother" /></td>
               </tr>
               <tr>
                   <td>age:</td>
                   <td><input type="text" name="age" /></td>
               </tr>
               <tr>
                   <td>color:</td>
                   <td><input type="text" name="color" /></td>
               </tr>
               <tr>
                   <td>wearing:</td>
                   <td><input type="text" name="wearing" /></td>
               </tr>
                         <tr>
                   <td>&nbsp;</td>
                   <td><input type="submit" name="submit" value="Search" /></td>
               </tr>
           </form>
       </table>

      </body>
    </html>
