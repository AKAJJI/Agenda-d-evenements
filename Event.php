<?php session_start(); 

?>
<html>
<head>
    <title>Event</title>
    <meta name="viewport" content="width=device-width , initial-scale=1">
   
  
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" >
    <link rel="stylesheet" href="calendar.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="modif.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   
    <script>
        function allowDrop(ev) {
            ev.preventDefault();
        }
        function drag(ev) { 
            ev.dataTransfer.setData("text", ev.target.id);
        }
        function drop(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            ev.target.appendChild(document.getElementById(data));
        }
    </script>
</head>

<body>
    
<?php include("header.php");
     require 'caldates1.php';
    require 'Cluser.php';

        ?>

   <div class="container">
       <div class="col-12">  <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#add"><i class="fas fa-plus-circle"></i> Ajouter un Evenement</button>
       <a class="btn btn-success" href="ConfEvent.php"><i class="far fa-calendar-check"></i> Evenements Confirmés</a>
       </div><br>
       <div class="row">
       <div class="col-6">
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
    </div>
           <!-- -------------------------------------------------------------------------- -->
       <div class="col-6">
           <h3><i class="fas fa-exclamation-circle text-warning"></i> EVENEMENTS <b class="text-warning">EN ATTENTE</b></h3><br>
           
           <table class="table table-striped ">
            <thead>
                <tr>
                    <th scope="col">Intitulé</th>
                    <th scope="col">Localisation</th>
                    <th scope="col">Durée</th>
                    <th scope="col">Participants</th>
                    <th scope="col">Createur</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                   
               // $b=new Clevent();
                //$b->Temp($id); 
              if(isset($_SESSION['intitule'])){
                for($i=1;$i<=count($_SESSION['intitule']);$i++){
                    
                      echo "<tr draggable=\"true\" ondragstart=\"drag(event)\">
                                <td>".$_SESSION['intitule'][$i]."</td>
                                <td>".$_SESSION['localisation'][$i]."</td>
                                <td>".$_SESSION['duree'][$i]."</td>
                                <td>".$_SESSION['participants'][$i]."</td>
                                <td>".$_SESSION['createur'][$i]."</td>
                           </tr>";
        
                }
                
                   
              }
                   
                ?>
                
            </tbody>
        </table>
           
       </div>
           
           
           
       </div>
     
       
       <!-- ------------------------------------------------------------------------------ -->
        <!--Modal d'ajout d'evenement -->
  <div class="modal" id="add">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">AJOUTER <b>UN EVENEMENT</b></h4>
          <button type="button" class="close" data-dismiss="modal">x</button>
        </div>
        
        <!-- Modal body -->
      
     <div class="modal-body">
          <form class="form" method="post" action="insertEvent.php">
            <div class="form-group">
                <label for="intitule">Intitulé</label>
                <input type="text" id="intitule" name="intitule" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" id="date" name="date" min="<?php echo $tomorrow; ?>" class="form-control" >
            </div>
            <div class="form-group">
                <label for="horaire">Horaire</label>
                <input type="time" id="horaire" name="horaire" class="form-control" >
            </div>
            <div class="form-group">
                <label for="localisation">Localisation</label>
                <input type="text" id="localisation" name="localisation" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="duree">Durée</label>
                <input type="time" id="duree" name="duree" class="form-control" required>
            </div>
             <div class="form-group">
                <label for="participants">Participants</label>
                <input type="text" id="participants" name="participants" class="form-control" required>
            </div>
             <div class="form-group">
                <label for="createur">Createur</label>
                 <select id="createur" name="createur" class="form-control" required>
                        <?php $a = new Cluser();
                                $a->select_createur();
                     ?>
                 </select>
                 
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
            </form>
        </div>
        
       
        
      </div>
    </div>
  </div>
       
       
       
       
       
       
       
    </div>
   
<?php include("footer.php"); ?>
</body>
</html>