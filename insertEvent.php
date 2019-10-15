<?php
session_start();
require 'Clevent.php';
if(empty($_SESSION['a'])) {  
$id=1;}else{
  $id=$_SESSION['a'];}
 
if (isset($_POST['intitule'])&&isset($_POST['date'])&&!empty($_POST['date'])&&isset($_POST['horaire'])&&!empty($_POST['horaire'])&&isset($_POST['localisation'])&&isset($_POST['duree'])&&isset($_POST['participants'])&&isset($_POST['createur'])){
    
    $intitule=htmlspecialchars($_POST['intitule']);
    $date=htmlspecialchars($_POST['date']);
    $horaire=htmlspecialchars($_POST['horaire']);
    $localisation=htmlspecialchars($_POST['localisation']);
    $duree=htmlspecialchars($_POST['duree']);
    $participants=htmlspecialchars($_POST['participants']);
    $createur=htmlspecialchars($_POST['createur']);
   
   /* $horaire.=':00';
    $duree.=':00';
    $hor=strtotime($horaire);
    echo gettype($hor);
    echo $hor;*/
    
    
    $a=new Clevent();
    
    $a->InsertEvent($intitule,$date,$horaire,$localisation,$duree,$participants,$createur);

  
    
}else{
    
    echo 'im here';
    
    $_SESSION['intitule'][$id]=htmlspecialchars($_POST['intitule']);
    $_SESSION['localisation'][$id]=htmlspecialchars($_POST['localisation']);
    $_SESSION['duree'][$id]=htmlspecialchars($_POST['duree']);
    $_SESSION['participants'][$id]=htmlspecialchars($_POST['participants']);
    $_SESSION['createur'][$id]=htmlspecialchars($_POST['createur']);
    
   
    
    $id++;
     $_SESSION['a']=$id ;
    

    header('location:Event.php');
       
}
   
    

?>