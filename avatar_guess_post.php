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

    <title>WhoText</title>

    <!-- Bootstrap Core CSS -->
    <link href="_Style/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
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
                        <a data-toggle="tooltip" data-placement="bottom" title="Retour" href="avatar_guess.php"><span class="glyphicon glyphicon-fast-backward"></span></a>
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
            <div class="col-md-offset-4 col-md-4 col-md-offset-4">
      <?php
// Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());

}

$req = $bdd->prepare('SELECT * FROM membres WHERE ID = ?') or die(print_r($bdd->errorInfo()));

$req->execute(array($_GET['avatar_select']));
$donnees = $req->fetch();

//echo htmlspecialchars($donnees['pseudo']);
//echo htmlspecialchars($donnees['pic_profile']);

?>  

<div class="panel panel-primary">
                     <div class="panel-body">           
<img src="_Picture/users/<?php echo $donnees['pic_profile']; ?>" width="100" height="100" alt="user" class="img-thumbnail">
                            
                        <h1><STRONG><?php echo $donnees['pseudo'];?></STRONG></h1>
                        <p><STRONG><?php echo 'nombre de <em>Who</em>-messages découvert(s) : <span class="badge">'.$donnees['found'].'</span>';?></STRONG></p>
                        <p><STRONG><?php echo 'nombre de <em>Who</em>-messages détruit(s) : <span class="badge">'.$donnees['destroy'].'</span>';?></STRONG></p>
                        <p><STRONG><?php echo 'nombre de <em>Who</em>-messages envoyé(s) : <span class="badge">'.$donnees['sent'].'</span>';?></STRONG></p>
                        <?php $var=(2*$donnees['found']+$donnees['sent'])-(2*$donnees['destroy']); ?> 
                        <h1><small>performance<SUB> session</SUB> = </small><?php echo ceil($var);?><small> pts</small></h1>
                        <br>




                        <a class="btn btn-warning btn-xs" href="#" role="button" data-toggle="tooltip" data-placement="top" title="bientôt disponible">Follo<em>Who</em>er</a>&nbsp;
                        <a href="mailto:<?php echo $donnees['email'];?>" class="btn btn-primary btn-xs" role="button" data-toggle="tooltip" data-placement="top" title="contacter par mail">Contacter</a>&nbsp;
                        <a class="btn btn-default btn-xs" href="avatar_guess.php">Retour</a>



<?php


$req->closeCursor();

?>


</div>
</div>
            
            

                <!--<ul class="list-unstyled">
                    <li>made with <span class="glyphicon glyphicon-heart"></span> by Q.I.</li>
                    <li><span class="glyphicon glyphicon-copyright-mark"></span> Alexis Queune</li>
                </ul>-->
            </div>
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
