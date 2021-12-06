<?php
require('database.php');

if ($_SERVER['REQUEST_METHOD']=='POST') {
    
 	      $name= mysqli_real_escape_string($db,$_POST['resourceName']) ;
          $type=mysqli_real_escape_string($db,$_POST['resourceType']) ;
          $cost=mysqli_real_escape_string($db,$_POST['cost']) ;
          $max = mysqli_real_escape_string($db,$_POST['max']) ;


 	      
  $query = "insert into resources (resourceName, resourceType, cost, max) values('$name','$type','$cost','$max')" ;
  $db->query($query); }
  
  ?>
  
  
 

 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <script>
        window.location = 'index.php';
    </script>
    
</body>
</html> 


      