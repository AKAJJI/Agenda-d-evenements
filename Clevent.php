<?php

class Clevent{
    private $Intitule;
    private $Date;
    private $Horaire;
    private $Localisation;
    private $Duree;
    private $Participants;
    private $Createur;
    
//constructors
function __construct(){
    $this->Intitule = null;
    $this->Date = null;
    $this->Horaire = null;
    $this->Localisation = null;
    $this->Duree = null;
    $this->Participants = null;
    $this->Createur = null;
}

/*function __construct1($a,$b,$c,$d,$e,$f,$g){
    $this->Intitule = $a;
    $this->Date = $b;
    $this->Horaire = $c;
    $this->Localisation = $d;
    $this->Duree = $e;
    $this->Participants = $f;
    $this->Createur = $g;   
}*/

//sets
public function SetIntitule($a){
    $this->Intitule=$a;
}

public function SetDate($a){
    $this->Date=$a;
}

public function SetHoraire($a){
    $this->Horaire=$a;
}

public function SetLocalisation($a){
    $this->Localisation=$a;
}

public function SetDuree($a){
    $this->Duree=$a;
}
    
public function SetParticipants($a){
    $this->Participants=$a;
}
    
public function SetCreateur($a){
    $this->Createur=$a;
}
    
//gets

public function GetIntitule(){
    return $this->Intitule;
}
    
public function GetDate(){
    return $this->Date;
}

public function GetHoraire(){
    return $this->Horaire;
}
 
public function GetLocalisation(){
    return $this->Localisation;
}
    
public function GetDuree(){
    return $this->Duree ;
}
    
public function GetParticipants(){
    return $this->Participants;
}

public function GetCreateur(){
    return $this->Createur;
}
    
//SQL operations

public function InsertEvent($intitule,$date,$horaire,$localisation,$duree,$participants,$createur){
    
    require 'connect.php';
    $req = $bdd->prepare('INSERT INTO event(Intitule,Date,Horaire,Localisation,Duree,Participants,Createur) VALUES(:intitule,:date,:horaire,:localisation,:duree,:participants,:createur)');

$req->execute(array(

                    'intitule' => $intitule,
                    'date' => $date,
                    'horaire' => $horaire,
                    'localisation' => $localisation,
                    'duree' => $duree,
                    'participants' => $participants,
                    'createur' => $createur));
 
 require 'disconnect.php';   
 header('location:Event.php');
}

public function Select(){
    require 'connect.php';
    
    $rep = $bdd->query('SELECT * FROM event ORDER BY Date,Horaire');
        while($donnees = $rep->fetch()){
                        echo "<tr>
                                <td>".$donnees['Date']."</td>
                                <td>".$donnees['Horaire']."</td>
                                <td>".$donnees['Intitule']."</td>
                                <td>".$donnees['Localisation']."</td>
                                <td>".$donnees['Duree']."</td>
                                <td>".$donnees['Participants']."</td>
                                <td>".$donnees['Createur']."</td>
                            </tr>";
        }
     require 'disconnect.php'; 
}   
    
public function SelectByDay($day){
      require 'connect.php';

    $rep = $bdd->prepare('select * from event where Date =:day LIMIT 1');
    $rep->execute(array('day' => $day )); 
    while($donnees = $rep->fetch()){
    
    $a=$donnees['Horaire'];
    $b=$donnees['Intitule'];
      $c=$a.' - '.$b.' ...';
        return $c;
    }
   
    
    
    require 'disconnect.php';
    
    
}
    
public function SelectEvsByDate($date){
    require 'connect.php';
     $rep = $bdd->prepare('select * from event where Date =:date');
    $rep->execute(array('date' => $date )); 
    while($donnees = $rep->fetch()){
          echo "<tr>
                                <td>".$donnees['Date']."</td>
                                <td>".$donnees['Horaire']."</td>
                                <td>".$donnees['Intitule']."</td>
                                <td>".$donnees['Localisation']."</td>
                                <td>".$donnees['Duree']."</td>
                                <td>".$donnees['Participants']."</td>
                                <td>".$donnees['Createur']."</td>
                            </tr>";
        
        
    }
    require 'disconnect.php';
}
    


}