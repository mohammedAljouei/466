<?php
require('database.php');


if ($_SERVER['REQUEST_METHOD']=='POST') {
    
 	      $name= mysqli_real_escape_string($db,$_POST['taskName']) ;
  $duration=mysqli_real_escape_string($db,$_POST['duration']) ;
  $startDate=mysqli_real_escape_string($db,$_POST['startDate']) ;
    
  $date = new DateTime($startDate);
  $string = "P{$duration}D";
$date->add(new DateInterval($string));
$endDate = $date->format('Y-m-d'); 
  
 
    $query = "insert into tasks (taskName, duration, startDate, endDate) values('$name','$duration','$startDate','$endDate')" ;
  $db->query($query);



  
  
  ?>
  
  <script>
  
	
	window.location = 'index.php';
     
     
  
  </script>
<?php } ?>


      