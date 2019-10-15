<html>
<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width , initial-scale=1">
      <meta charset="utf-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="modif.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" >
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
   
</head>

<body>
    
<?php     include("header.php"); 
        require("connect.php");  
        require 'Clevent.php';
?>

    <div class="container">
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
                    <th scope="col">Createurs</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                   $a = new Clevent();
                    $a->select();
                ?>
                
            </tbody>
        </table>
   </div>
        
    

<?php include("footer.php"); ?>
</body>
</html>