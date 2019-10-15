<?php session_start(); ?>
<html>
<head>
    <title>User</title>
    <meta name="viewport" content="width=device-width , initial-scale=1">
      <meta charset="utf-8">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" >
    <link rel="stylesheet" href="modif.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   
</head>

<body>
    
<?php     include("header.php"); 
        require("connect.php");  
        require 'Cluser.php';
?>

    <div class="container">
        <br><br>
        <button type="button"  class="btn btn-primary" data-toggle="modal" data-target="#add"><i class="fas fa-plus-circle"></i> Ajouter</button>
        
    <br><br>
        <table class="table table-striped ">
            <thead>
                <tr>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                   $a = new Cluser();
                $a->select();
                ?>
                
            </tbody>
        </table>
  
 

  <!--Modal d'ajout d'utilisateur -->
  <div class="modal" id="add">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">AJOUTER <b>UN UTILISATEUR</b></h4>
          <button type="button" class="close" data-dismiss="modal">x</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
          <form class="form" method="post" action="insert.php">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="text" id="Prenom" name="prenom" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control" required>
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