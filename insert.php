
 <?php 


require 'Cluser.php';
//echo htmlspecialchars($_POST['nom']);
//echo htmlspecialchars($_POST['prenom']);
//echo htmlspecialchars($_POST['email']);




 if(isset($_POST['nom'])&&isset($_POST['prenom'])&&isset($_POST['email'])){
           
            $nom=htmlspecialchars($_POST['nom']);
            $prenom=htmlspecialchars($_POST['prenom']);
            $email=htmlspecialchars($_POST['email']);
            
     
            if(filter_var($email,FILTER_VALIDATE_EMAIL)){
              echo $nom.' '.$prenom.' '.$email;
                $a = new Cluser();
                $a->AddUser($nom,$prenom,$email);
                
            }else{
                header('location:mail_invalid.php');
            }
 
 }






?>



