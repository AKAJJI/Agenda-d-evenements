<?php


class Cluser{
    
    public $Nom ;
    private $Prenom ;
    private $Email ;
    private $Password ;

function __construct(){
     $this->Nom = "" ;
    $this->Prenom = "" ;
    $this->Email ="";
    $this->Password ="Azerty";
}


    
/*function __construct1($nom,$prenom,$email){
    $this->Nom = $nom ;
    $this->Prenom = $prenom ;
    $this->Email =$email;
    $this->Password ="Azerty";
}*/

public function GetNom(){
    return $this->Nom;
}   

public function GetPrenom(){
    return $this->Prenom;
}
    
public function GetEmail(){
    return $this->Email;
}
    
public function SetNom($a){
    $this->Nom=$a;
}
    
public function SetPrenom($a){
    $this->Prenom=$a;
}
    
public function SetEmail($a){
    $this->Email=$a;
}


public function AddUser($nom,$prenom,$email){
    require 'connect.php';
    
$req = $bdd->prepare('INSERT INTO user(nom,prenom,email,password) VALUES(:nom,:prenom,:email,:password)');
$req->execute(array(
                    
                    'nom' => $nom,
                    'prenom' => $prenom,
                    'email' => $email,
                    'password'=> $this->Password));
    
    require 'disconnect.php';
    header('location:User.php');
    
}

public function select(){
    require 'connect.php';
    
    $rep = $bdd->query('select * from user');
                    while($donnees = $rep->fetch()){
                        echo "<tr>
                                <td>".$donnees['Nom']."</td>
                                <td>".$donnees['Prenom']."</td>
                                <td>".$donnees['Email']."</td>
                                <td><a href=\"modifier.php?id=".$donnees['Id']."\" class=\"btn btn-success\"  ><i class=\"far fa-edit\"></i> Modifier</a>
                                <a href=\"delete.php?id=".$donnees['Id']."\" class=\"btn btn-danger\" ><i class=\"fas fa-minus-square\"></i> Supprimer</a></td>
                            </tr>";
                        
                    }
    require 'disconnect.php';  
}

public function select_createur(){
     require 'connect.php';
    
    $rep = $bdd->query('select * from user');
                    while($donnees = $rep->fetch()){
                        
                        $name=$donnees['Prenom'] . $donnees['Nom'];
                        
                        echo '<option value='.$name.'>'.$name.'</option>';
                        
                    }
    require 'disconnect.php'; 
    
}

public function select_id($id){
    
    require 'connect.php';
    
    $rep = $bdd->query('select * from user where id ='.$id);
    
    while($donnees = $rep->fetch()){
    
    $a=$donnees['Nom'];
    $b=$donnees['Prenom'];
    $c=$donnees['Email'];
        
    }
    $this->Nom=$a;
    
    $this->Prenom=$b;
    
    $this->Email=$c;
    
    require 'disconnect.php';
}
    
public function Update_id($nom,$prenom,$email,$id){
    require 'connect.php';
    $req=$bdd->prepare('UPDATE user SET nom=:nom, prenom=:prenom, email=:email WHERE id=:id');
    $req->execute(array(
                        
                        'nom' => $nom,
                        'prenom' => $prenom,
                        'email' => $email,
                        'id' => $id
                        ));
     require 'disconnect.php';
    header('location:User.php');
    
}

public function Delete_id($id){
  
    require 'connect.php';
   
    $req = $bdd->prepare('DELETE FROM user WHERE id=:id');
    $req->execute(array(
                        'id' => $id
                        ));
    require 'disconnect.php';
    header('location:User.php');
    
    
}
    
    
    
    
}

  
   
?>