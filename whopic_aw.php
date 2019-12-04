<?php 

session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="whotext">
    <meta name="author" content="alexis queune">

    <title>Who</title>

    <!-- Bootstrap Core CSS -->
    <link href="_Style/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    .hide {
        display: none;
    }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a data-toggle="tooltip" data-placement="bottom" title="It's nice to see you, <?php echo $_SESSION['user_pseudo'];?>." class="navbar-brand" href="whotext.php">Who <span class="glyphicon glyphicon-pencil"></span> <span class="glyphicon glyphicon-picture"></span>
     <span class="glyphicon glyphicon-link"></span></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="deconnexion.php">Déconnexion</a>
                    </li>
                    <li>
                        <a data-toggle="tooltip" data-placement="bottom" title="Rafraîchir la page" href="whotext_guess.php"><span class="glyphicon glyphicon-repeat"></span></a>
                    </li>
                    
                    <li>
                        <a data-toggle="tooltip" data-placement="bottom" title="<?php echo $_SESSION['user_pseudo'];?>" href="avatar.php"><span class="glyphicon glyphicon-user"></span></a>
                    </li>
                    <li>
                        <a data-toggle="tooltip" data-placement="bottom" title="contact me by email" href="mailto:alexis.queune1@gmail.com">Contact</a>
                    </li>
                    <li>
                        <a data-toggle="tooltip" data-placement="bottom" title="Aw pics from Who" href="whopic_aw.php">WhoPic <span class="glyphicon glyphicon-picture"></span></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8 col-md-offset-2">  
                <!--<p class="lead">WhoText sélectionné :</p>-->
<?php
// Connexion à la base de données
include ('connect.php');



$reponse = $bdd->query('SELECT ID, auteur_whotext, pic_profile, message_first_part, message_second_part, found, type, 
    DATE_FORMAT(date_creation_whotext, \'le %d/%m à %Hh%i\') AS date_creation_fr FROM whotext WHERE found=1 && type=2 
    ORDER BY date_creation_whotext DESC LIMIT 0, 10') or die(print_r($bdd->errorInfo()));

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
?>

    
    <a href="whotext_guess.php?whotext_select=<?php echo $donnees['ID']; ?>" style="text-decoration:none;" >

<div class="panel panel-info">

     
    <img src="_Picture/<?php echo $donnees['message_second_part']; ?>" class="img-responsive">

                


    <h6>&nbsp;Posté par <?php echo htmlspecialchars($donnees['auteur_whotext']); ?> <?php echo htmlspecialchars($donnees['date_creation_fr']); ?></h6>


        </div>

   
    </a>
    
    <?php
}

$reponse->closeCursor();



?>



<!--<ul name="ancre" class="list-unstyled">
    <li>made with <span class="glyphicon glyphicon-heart"></span> by Q.I.</li>
    <li><span class="glyphicon glyphicon-copyright-mark"></span> Alexis Queune</li>
</ul>-->

            </div>
            <!--fin colonne -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="_Style/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="_Style/js/bootstrap.min.js"></script>
    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

    

</body>

</html>
