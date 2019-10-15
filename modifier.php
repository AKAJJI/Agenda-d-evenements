<html>
<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width , initial-scale=1">
   
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="modif.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" >
   
</head>

<body>
    
<?php include("header.php"); 
    require 'Cluser.php';?>

    <div class="container"><br>
        <br>
   <?php 
        $id = $_GET['id'];
        
        $a = new Cluser();
        
        $a->select_id($id);
        
        ?>
        
        
   
    <form class="form" method="post" action="">
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" class="form-control" value="<?php echo $a->GetNom();?>" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prenom</label>
                <input type="text" id="Prenom" name="prenom" class="form-control" value="<?php echo $a->GetPrenom();?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" value="<?php echo $a->GetEmail();?>" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-Success"><i class="far fa-edit"></i> Modifier</button>
             <a href="User.php" class="btn btn-warning"><i class="fas fa-user-slash"></i> Annuler</a>
            </form>
       
        <?php
        
       
     if(isset($_POST['nom'])&&isset($_POST['prenom'])&&isset($_POST['email'])){
           
            $nom=htmlspecialchars($_POST['nom']);
            $prenom=htmlspecialchars($_POST['prenom']);
            $email=htmlspecialchars($_POST['email']);
            
        
     
            if(filter_var($email,FILTER_VALIDATE_EMAIL)){
              
                $a->Update_id($nom,$prenom,$email,$id);
                
            }else{
                header('location:mail_invalid.php');
            }
     }
    ?>
        
        
        
    </div>
    

        
   
<?php include("footer.php"); ?>
</body>
</html>