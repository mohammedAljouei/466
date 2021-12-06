<?php

require('database.php');

$tasksArr=[];
$data1 = $db->query("select * from tasks ");

  $tasks = $data1->fetch_all();

  foreach ($tasks as $task ) {

    array_push($tasksArr,$task);

  }
  
  $resourcesArr = [];
  $data2 = $db->query("select * from resources ");

  $resources = $data2->fetch_all();

  foreach ($resources as $res ) {

    array_push($resourcesArr,$res);

  }
  
    $assignArr = [];
  $data3 = $db->query("SELECT tasks.taskName, tasks.duration, tasks.startDate, tasks.endDate, resources.resourceName
FROM assign, resources, tasks
WHERE assign.taskId = tasks.id AND assign.resId = resources.id");

  $assigns = $data3->fetch_all();

  foreach ($assigns as $assign) {

    array_push($assignArr,$assign);

  }
  
  
  
  
  
  
  $goupedArr = [];
  
  
  
  
  for ($a = 0 ; $a < count($tasks); $a++) {
   $taskName = $tasks[$a][1];
   
    $data4 = $db->query("SELECT tasks.taskName, tasks.duration, tasks.startDate, tasks.endDate, resources.resourceName, resources.resourceType, resources.cost FROM assign, resources, tasks WHERE assign.taskId = tasks.id AND assign.resId = resources.id AND tasks.taskName = '$taskName' ");
      $assignsCost = $data4->fetch_all();
      
       array_push($goupedArr,$assignsCost);
}
 
 
//   echo $goupedArr[0][0][6];

$taskNamesWithCosts = [];
$totalCost = 0;
 
   for ($b = 0 ; $b < count($goupedArr); $b++) {
       $cost = 0 ;
       
            for ($c = 0 ; $c < count($goupedArr[$b]); $c++) {
                
                if($goupedArr[$b][$c][5] == 'work'){
                     $cost = $cost + ( $goupedArr[$b][$c][6] * 8 * $goupedArr[$b][$c][1] )  ;
                    
                }else {
                     $cost = $cost + $goupedArr[$b][$c][6];
                      
                }
               
                
                 

} 
 array_push($taskNamesWithCosts,[ $goupedArr[$b][0][0] ,$cost]);



}


 for ($e = 0 ; $e < count($taskNamesWithCosts); $e++) {
     $totalCost = $totalCost + $taskNamesWithCosts[$e][1];
 }


  ?>


<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    
    <!--====== Title ======-->
    <title>Management tool</title>
    
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/png">
        
    <!--====== Magnific Popup CSS ======-->
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
        
    <!--====== Slick CSS ======-->
    <link rel="stylesheet" href="assets/css/slick.css">
        
    <!--====== Line Icons CSS ======-->
    <link rel="stylesheet" href="assets/css/LineIcons.css">
        
    <!--====== Bootstrap CSS ======-->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    
    <!--====== Default CSS ======-->
    <link rel="stylesheet" href="assets/css/default.css">
    
    <!--====== Style CSS ======-->
    <link rel="stylesheet" href="assets/css/style.css">
    
</head>

<body>
    <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
   
    <!--====== PRELOADER PART START ======-->

    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--====== PRELOADER PART ENDS ======-->
    
    <!--====== NAVBAR TWO PART START ======-->

    <section class="navbar-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                       
                      
                        
                     
                    </nav> <!-- navbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== NAVBAR TWO PART ENDS ======-->
    
    <!--====== SLIDER PART START ======-->

    <section id="home" class="slider_area">
        <div id="carouselThree" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselThree" data-slide-to="0" class="active"></li>
           
                
            </ol>

            <div class="carousel-inner">
          

                <div class="carousel-item active">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="slider-content">
                                    <h1 class="title"> Management Tool</h1>
                                    <p class="text">Effective Management tool for managing small and medium teams.</p>
                                    <ul class="slider-btn rounded-buttons">
                                        <li><a class="main-btn rounded-one" href="addTask.html">ADD TASKS</a></li>
                                        <li><a class="main-btn rounded-two" href="addResource.html">ADD RESOURCE</a></li>
                                        <li><a class="main-btn rounded-two" href="assign.php">ASSIGN RESOURCE TO TASK</a></li>
                                    </ul>
                                </div> <!-- slider-content -->
                            </div>
                        </div> <!-- row -->
                    </div> <!-- container -->
                    <div class="slider-image-box d-none d-lg-flex align-items-end">
                        <div class="slider-image">
                            <img src="assets/images/slider/3.png" alt="Hero">
                        </div> <!-- slider-imgae -->
                    </div> <!-- slider-imgae box -->
                </div> <!-- carousel-item -->
            </div>

         
        </div>
    </section>




    <section id="pricing" class="pricing-area ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="section-title text-center pb-25">
                        <h3 class="title">ALL TASKS</h3>
                        <p class="text">From here you can see all the tasks in the system!</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                
                <?php foreach ($tasksArr as $row ) { ?>
                
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="pricing-style mt-30">
                        <div class="pricing-icon text-center">
                        </div>
                        <div class="pricing-header text-center">
                            <h5 class="sub-title"><?php echo $row[1] ?></h5>
                            <p class="month"><span class="price"><?php echo $row[2] ?></span> /days</p>
                        </div>
                        <div class="pricing-list">
                            <ul>
                                <li><i class="lni lni-check-mark-circle"></i> Started At <?php echo $row[3] ?></li>
                                <li><i class="lni lni-check-mark-circle"></i> End At <?php echo $row[4] ?></li>
                            </ul>
                        </div>
                        <div class="pricing-btn rounded-buttons text-center">
                        </div>    
                    </div> <!-- pricing style one -->
                </div>
                
                <?php } ?>
                
        
   
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    
        <section id="pricing" class="pricing-area ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="section-title text-center pb-25">
                        <h3 class="title">ALL RESOURCES</h3>
                        <p class="text">From here you can see all the resources in the system!</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                
                <?php foreach ($resourcesArr as $row ) { ?>
                
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="pricing-style mt-30">
                        <div class="pricing-icon text-center">
                        </div>
                        <div class="pricing-header text-center">
                            <h5 class="sub-title"><?php echo $row[1] ?></h5>
                            <p class="month"><span class="price"><?php echo $row[2] ?></span></p>
                        </div>
                        <div class="pricing-list">
                            <ul>
                                <li><i class="lni lni-check-mark-circle"></i> It's cost is <strong>$ <?php echo $row[3] ?></strong> </li>
                                <li><i class="lni lni-check-mark-circle"></i> Number of resources is <?php echo $row[4] ?></li>
                            </ul>
                        </div>
                        <div class="pricing-btn rounded-buttons text-center">
                        </div>    
                    </div> <!-- pricing style one -->
                </div>
                
                <?php } ?>
                
        
   
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    
    
    
            <section id="pricing" class="pricing-area ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="section-title text-center pb-25">
                        <h3 class="title">Tasks and it's related resources</h3>
                        <p class="text">From here you can see all the tasks and it's related resources in the system!</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                
                <?php foreach ($assignArr as $row ) { ?>
                
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="pricing-style mt-30">
                        <div class="pricing-icon text-center">
                        </div>
                        <div class="pricing-header text-center">
                            <h5 class="sub-title"><?php echo $row[0] ?> task</h5>
                            <p class="month"><span class="price"><?php echo $row[1] ?></span> /days</p>
                        </div>
                        <div class="pricing-list">
                            <ul>
                                <li><i class="lni lni-check-mark-circle"></i> Started At <?php echo $row[2] ?></li>
                                <li><i class="lni lni-check-mark-circle"></i> End At <?php echo $row[3] ?></li>
                                 <li><i class="lni lni-check-mark-circle"></i> Resource used is <?php echo $row[4] ?></li>
                            </ul>
                        </div>
                        <div class="pricing-btn rounded-buttons text-center">
                        </div>    
                    </div> <!-- pricing style one -->
                </div>
                
                <?php } ?>
                
        
   
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    
    
     <section id="pricing" class="pricing-area ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="section-title text-center pb-25">
                        <h3 class="title">COST FOR EACH TASK</h3>
                        <p class="text">From here you can see the total cost for each task!</p>
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                
                <?php foreach ($taskNamesWithCosts as $row ) { ?>
                
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="pricing-style mt-30">
                        <div class="pricing-icon text-center">
                        </div>
                        <div class="pricing-header text-center">
                            <h5 class="sub-title"><?php echo $row[0] ?> task cost</h5>
                            <p class="month"><span class="price">$<?php echo $row[1] ?></span></p>
                        </div>
                 
                        <div class="pricing-btn rounded-buttons text-center">
                        </div>    
                    </div> <!-- pricing style one -->
                </div>
                
                <?php } ?>
                
        
   
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
         <section id="pricing" class="pricing-area ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-10">
                    <div class="section-title text-center pb-25">
                        <h3 class="title">TOTAL COST FOR THE PROJECT</h3>
                        <!--<p class="text">From here you can see the total cost for each task!</p>-->
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row justify-content-center">
                
               
                
                <div class="col-lg-4 col-md-7 col-sm-9">
                    <div class="pricing-style mt-30">
                        <div class="pricing-icon text-center">
                        </div>
                        <div class="pricing-header text-center">
                            <h5 class="sub-title">this project cost</h5>
                            <p class="month"><span class="price">$<?php echo $totalCost ?></span></p>
                        </div>
                 
                        <div class="pricing-btn rounded-buttons text-center">
                        </div>    
                    </div> <!-- pricing style one -->
                </div>
                
         
                
        
   
            </div> <!-- row -->
        </div> <!-- container -->
    </section>
    
    
    
    
    
    
        

    <section class="footer-area footer-dark">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                  
                
           
                    <div class="copyright text-center mt-35">
                        <p class="text">Developed by Mohammed, Rayyan and Ried </p>
                    </div> <!--  copyright -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== FOOTER PART ENDS ======-->
    
    <!--====== BACK TOP TOP PART START ======-->

    <a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a>

    <!--====== BACK TOP TOP PART ENDS ======-->    

    <!--====== PART START ======-->

<!--
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-lg-">
                    
                </div>
            </div>
        </div>
    </section>
-->

    <!--====== PART ENDS ======-->




    <!--====== Jquery js ======-->
    <script src="assets/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
    
    <!--====== Bootstrap js ======-->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    
    <!--====== Slick js ======-->
    <script src="assets/js/slick.min.js"></script>
    
    <!--====== Magnific Popup js ======-->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    
    <!--====== Ajax Contact js ======-->
    <script src="assets/js/ajax-contact.js"></script>
    
    <!--====== Isotope js ======-->
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    
    <!--====== Scrolling Nav js ======-->
    <script src="assets/js/jquery.easing.min.js"></script>
    <script src="assets/js/scrolling-nav.js"></script>
    
    <!--====== Main js ======-->
    <script src="assets/js/main.js"></script>
    
</body>

</html>
