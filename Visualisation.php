<?php session_start(); ?>
<html>
<head>
    <title>Visualisation</title>
    <meta name="viewport" content="width=device-width , initial-scale=1">
   
    
    <link rel="stylesheet" href="modif.css">
    <?php if(!isset($_GET['ym'])&&!isset($_GET['day'])){?>
    <link rel="stylesheet" href="calendar.css">
    <?php } ?>
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" >
    <link rel="stylesheet" href="modif.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
  
</head>

<body>
    
<?php include("header.php"); 
       require 'caldates1.php'; ?>

   <div class="container">
  <?php 
       
       
       if(isset($_GET['ym'])&&isset($_GET['day'])&&!empty($_GET['ym'])&&!empty($_GET['day'])){
           $ym=$_GET['ym'];
       $day=$_GET['day'];
           $ymd=$ym.'-'.$day;
           ?>
               <br><br>
<table class="table table-striped ">
            <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Horaire</th>
                    <th scope="col">Intitulé</th>
                    <th scope="col">Localisation</th>
                    <th scope="col">Durée</th>
                    <th scope="col">Participants</th>
                    <th scope="col">Createur</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                   $a = new Clevent();
                    $a->SelectEvsByDate($ymd);
                ?>
                
            </tbody>
        </table>

       
       
       <?php
         
    }else{ 
       
         ?>
           
        <ul class="list-inline">
            <li class="list-inline-item"><a href="?ym=<?= $prev; ?>" class="btn btn-link">&lt; prev</a></li>
            <li class="list-inline-item"><span class="title"><?= $title; ?></span></li>
            <li class="list-inline-item"><a href="?ym=<?= $next; ?>" class="btn btn-link">next &gt;</a></li>
        </ul>
        <p class="text-right"></p>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>M</th>
                    <th>T</th>
                    <th>W</th>
                    <th>T</th>
                    <th>F</th>
                    <th>S</th>
                    <th>S</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($weeks as $week) {
                        echo $week;
                    }
                ?>
            </tbody>
        </table>
       <?php } ?>
    </div>
    
    
<?php include("footer.php"); ?>
</body>
</html>