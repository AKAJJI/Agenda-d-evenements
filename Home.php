<?php session_start(); ?>
<html>
<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width , initial-scale=1">
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="modif.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" >
   
</head>

<body>
    
<?php include("header.php"); ?>

    <div class="container"><br>
        <br>
   
            <h4 style="text-align:center"><i class="fas fa-exclamation-circle text-warning"></i> LES EVENEMENTS MIS EN ATTENTE SONT SUPPRIMES A LA FIN DE CHAQUE SESSION</h4><br>
            <h5 style="text-align:center">PENSER A LEUR DONNER UNE DATE ET UN HORAIRE AFIN QU'ILS NE SOIENT PAS PERDU.</h5>
    </div>
   
<?php include("footer.php"); ?>
</body>
</html>