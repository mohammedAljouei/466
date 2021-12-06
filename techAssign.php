<?php

require('database.php');

$taskId ='';
$resourceId ='';
$max = '';
    if ($_SERVER['REQUEST_METHOD']=='GET') {
        
        $taskId = $_GET['taskId'];
          
          
      }

$arr=[];
$data = $db->query("SELECT * FROM `resources` WHERE `max` != 0");

  $orders = $data->fetch_all();

  foreach ($orders as $order ) {

    array_push($arr,$order);

  }
  
  
 

    if ($_SERVER['REQUEST_METHOD']=='POST') {
        
        $taskId = $_POST['taskId'];
         $max = $_POST['max'] - 1;
        
        foreach($_POST['res'] as $resourceId){
        
          $query = "insert into assign (taskId, resId) values('$taskId','$resourceId')" ;
          $db->query($query);
          $db->query(" UPDATE `resources` SET `max`= '$max' WHERE id = '$resourceId' ");

        
    } ?>
    
    <script>
        window.location = 'index.php';
    </script>
    
    
    <?php
       
        
        

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
                                        <li><a class="main-btn rounded-one" href="index.php">GO BACK!</a></li>
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

    <section id="contact" class="contact-area">
        <div class="container">
          
         
         
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact-wrapper form-style-two pt-115">
                        <h4></i> Assign <span> Resource to this task.</span></h4>
                        
                        
                        
  


                        
                        <?php
                        
                        
                        
                          foreach ($arr as $row ) { ?>
                          <hr/>
                          
                          
                               <form id="contact-form" action="techAssign.php" method="post">
                           <input type="checkbox"  name="res[]" value="<?php echo $row[0] ?>">
                           <label for="res[]"> <?php echo $row[1] ?></label><br>
                           
                                 <input type="hidden"  name="max" value="<?php echo $row[4] ?>">
                                 <input type="hidden"  name="taskId" value="<?php echo $taskId ?>">
                     
                       
                                
                               





                              

                                
                                
                

                                    

                           <?php  } ?>
                           
                                           <p class="form-message"></p>
                                <div class="col-md-12">
                                    <div class="form-input light-rounded-buttons mt-30">
                                        <button id="add" class="main-btn light-rounded-two">Add Resource</button>

                                    </div> <!-- form input -->
                                </div>
                            </div> <!-- row -->
                        </form>
                        
                        
                 
                        
                   
                    </div> <!-- contact wrapper form -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== SLIDER PART ENDS ======-->


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
    <!--<script src="assets/js/ajax-contact.js"></script>-->
    
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
