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
                <a data-toggle="tooltip" data-placement="bottom" title="It's nice to see you, <?php echo $_SESSION['user_pseudo'];?>." class="navbar-brand" href="whotext.php">
                    Who <span class="glyphicon glyphicon-pencil"></span> <span class="glyphicon glyphicon-picture"></span> <span class="glyphicon glyphicon-link"></span></a>
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
            <div class="ccol-md-offset-4 col-md-4 col-md-offset-4">  
<?php
// Connexion à la base de données
include ('connect.php');

$req = $bdd->prepare('SELECT ID, auteur_whotext, pic_profile, message_first_part, message_second_part, found, type, 
    DATE_FORMAT(date_creation_whotext,\'%Hh%i - %d/%m\') AS date_creation_fr FROM whotext WHERE ID = ?') or die(print_r($bdd->errorInfo()));

$req->execute(array($_GET['whotext_select']));
$donnees = $req->fetch();

///////////////////////////////////////////////////////////////////////// début du panel //////////////////////////////////////////////////////////////////////

if (!$donnees['found']==1){
    ///pas ok//////pas ok//////pas ok//////pas ok//////pas ok//////pas ok////
    echo '<div class="panel panel-danger">';
    ///pas ok//////pas ok//////pas ok//////pas ok//////pas ok//////pas ok////                                                             
    }

else {
    ///ok//////ok//////ok//////ok//////ok//////ok//////ok//////ok//////ok/////
    echo '<div class="panel panel-info">';
    ///ok//////ok//////ok//////ok//////ok//////ok//////ok//////ok//////ok/////
    }
    
    echo '<div class="panel-heading">';
        echo '<div class="row">';
            echo '<div class="col-md-3">';
            
                if (!$donnees['found']==1){
                    ///pas ok//////pas ok//////pas ok//////pas ok//////pas ok//////pas ok/////
                    echo '<img src="_Picture/site/icone.jpg" width="50" height="50" alt="inconnu" class="img-circle">';
                    ///pas ok//////pas ok//////pas ok//////pas ok//////pas ok//////pas ok/////                                                             
                    }

                else {
                    ///ok//////ok//////ok//////ok//////ok//////ok//////ok//////ok//////ok///
                    ?>
                    <img src="_Picture/users/<?php echo $donnees['pic_profile']; ?>" width="50" height="50" alt="déwhoqueur" class="img-responsive">
                    <?php
                    ///ok//////ok//////ok//////ok//////ok//////ok//////ok//////ok//////ok///
                    }

            echo '</div>';
            echo '<div class="col-md-9">';

                if (!$donnees['found']==1){
                    ///pas ok//////pas ok//////pas ok//////pas ok//////pas ok//////pas ok///
                    echo '<h2 class="panel-title">Auteur inconnu</h2>';                           
                    ///pas ok//////pas ok//////pas ok//////pas ok//////pas ok//////pas ok////
                    }

                else {
                    ///ok//////ok//////ok//////ok//////ok//////ok//////ok//////ok//////ok////
                    echo '<h2 class="panel-title">' . htmlspecialchars($donnees['auteur_whotext']) . '</h2>';
                    ///ok//////ok//////ok//////ok//////ok//////ok//////ok//////ok//////ok/////
                    }

                    echo '<h6 style="color:grey;"><em>'.htmlspecialchars($donnees['date_creation_fr']).'</em></h6>';
            echo '</div>';
        echo '</div>';
    echo '</div>';
    echo '<div class="panel-body">';

        echo '<span><h4>' . htmlspecialchars($donnees['message_first_part']) . ' ';

            if (!$donnees['found']==1){
                ///pas ok//////pas ok//////pas ok//////pas ok//////pas ok//////pas ok//////pas ok//////pas ok////
                //echo '<h6><em><span class="label label-default">ce message est bloqué</span></em></h6></span>';
                echo '<span class="glyphicon glyphicon-lock"></span></h4></span>';
                ///pas ok//////pas ok//////pas ok//////pas ok//////pas ok//////pas ok//////pas ok//////pas ok////
                }

            else {
                 ///ok//////ok//////ok//////ok//////ok//////ok//////ok//////ok//////ok//////ok//////ok//////ok////
                if ($donnees['type']==1){//WhoLargeText
                    echo '<br>';
                    echo '<br>';
                    echo '<h4>'.$donnees['message_second_part'].'</h4>';
                    }
                elseif ($donnees['type']==2){//WhoPic
                    echo '<hr>';
                    ?>
                    <a href="whopic_big.php?whotext_select=<?php echo $_GET['whotext_select']; ?>" style="text-decoration:none;" 
                        alt="Cliquez pour agrandir l'image" data-toggle="tooltip" data-placement="top" title="Cliquez pour agrandir l'image">
                        <img src="_Picture/<?php echo $donnees['message_second_part']; ?>" class="img-responsive" >
                    </a>
                    <?php
                    }
                /// v.2. ////
                elseif ($donnees['type']==3){//WhoMusic
                    echo '<br>';
                    echo '<br>';
                    ?>
                    <audio controls>
                        <source src="_Music/<?php echo $donnees['message_second_part']; ?>" type="audio/mp3">
                    </audio>
                    <?php
                    }
                /// v.2. fin ////
                elseif ($donnees['type']==4){//WhoLink
                    echo '<br>';
                    echo '<br>';
                    echo '<h6>'.$donnees['message_second_part'].'</h6>';
                    //echo preg_replace('#http://[a-z0-9._/-]+#i', '<a href="$0">$0</a>', $donnees['message_second_part']);
                    }

                else {//WhoText
                echo '<strong><em>' . htmlspecialchars($donnees['message_second_part']) . '</em></strong></h4></span>';
                ///ok//////ok//////ok//////ok//////ok//////ok//////ok//////ok//////ok//////ok//////ok//////ok////
                    }
                }
    echo '</div>';
    
    $req->closeCursor();

?>
    <div class="panel-footer">
        <!-- Nav tabs -->
        <ul class="nav nav-pills" id="myTab">
            <li class="active"><a data-toggle="tooltip" data-placement="top" title="Débloquer" data-toggle="tab" href="#menu01"><span class="glyphicon glyphicon-lock"></span></a></li>
            <li><a data-toggle="tooltip" data-placement="top" title="Retour" href="whotext.php"><span class="glyphicon glyphicon-fast-backward"></span></a></li>
           <!--<li><a data-toggle="tab" href="#menu02"><span data-toggle="tooltip" data-placement="top" title="Partager" class="glyphicon glyphicon-option-vertical"></span></a></li>-->
        </ul>

        <!-- Tab panes -->
        <div class="tab-content" id="myTabContent">
        
<!--/////////////////////////////////////////////// Partie essayer de débloquer ///////////////////////////////////////////////////////////////////-->
        <div id="menu01" class="tab-pane fade active in"><br>
            <?php
                    $req = $bdd->prepare('SELECT ID, auteur_whotext, message_first_part, message_second_part, found, try, DATE_FORMAT(date_creation_whotext,
                        \'posté le %d/%m/%Y à %Hh%i\') AS date_creation_fr FROM whotext WHERE ID = ?') or die(print_r($bdd->errorInfo()));

                            $req->execute(array($_GET['whotext_select']));
                            $donnees = $req->fetch();

                            //echo $donnees['found'];
                            //echo $donnees['ID'];
                            //echo $_GET['whotext_select'];

                            if (!$donnees['found']==1){
                                //echo $donnees['ID'];

                                $donnees['try']=3-$donnees['try'];
                                echo '<h6>Il ne reste plus que <span class="badge">'.$donnees['try'].'</span> essai(s) </h6>';

                            ///pas ok//////pas ok//////pas ok//////pas ok//////pas ok//////pas ok//////pas ok//////pas ok////pas ok//////pas ok///
                            ?>
                                <form action="whotext_guess_post_try.php" method="post" enctype="multipart/form-data">
                                    <p>
                                        
                                            
                                                <input type="hidden" name="auteur_found" value="<?php echo $_SESSION['user_pseudo']; ?>" 
                                                id="ID_auteur_found" class="form-control"/>
                                                <input type="hidden" name="ID_auteur_found" value="<?php echo $_SESSION['user_ID']; ?>" 
                                                id="ID_auteur_found" class="form-control"/>
                                                <input type="hidden" name="whotext_select" value="<?php echo $_GET['whotext_select']; ?>"/>
                                                <input type="hidden" name="ID" value="<?php echo $donnees['ID']; ?>"/>
                                                <input type="text" name="auteur_whotext" id="auteur_whotext" class="form-control" 
                                                placeholder="Qui est l'auteur de ce WhoText selon vous ?"/>
                                            
                                            <div class="hide">
                                                <input type="submit"/><hr>
                                            </div>
                                    </p>    
                                </form>
                            
                            <?php
                                
                            ///pas ok//////pas ok//////pas ok//////pas ok//////pas ok//////pas ok//////pas ok//////pas ok////pas ok//////pas ok//////pas ok//////
                           }
    
                            else {
                            ///ok//////ok//////ok//////ok//////ok//////ok//////ok//////ok//////ok//////ok//////ok//////ok////ok//////ok//////ok//////ok//////ok///
                                $reqq = $bdd->prepare('SELECT ID_auteur_found, auteur_found, DATE_FORMAT(date_found_whotext, \'%d/%m %Hh%i\') 
                                    AS date_found_fr FROM whotext_found WHERE ID_whotext_found = ?') or die(print_r($bdd->errorInfo()));

                                $reqq->execute(array($_GET['whotext_select']));
                                
                                $donneess = $reqq->fetch();

                                 
                                echo '<h6>Dé<em>Who</em>qué par <strong>'.htmlspecialchars($donneess['auteur_found']).' </strong>
                                <small style="color:grey;"><em>'.htmlspecialchars($donneess['date_found_fr']).'</em></small></h6>';


                                $reqq->closeCursor();                          
                            ///ok//////ok//////ok//////ok//////ok//////ok//////ok//////ok//////ok//////ok//////ok//////ok////ok//////ok//////ok//////ok//////ok///
                            }

                            $req->closeCursor();
                ?>
<hr>      
<!-- //////////////////////////////////////////////////Partie commentaires//////////////////////////////////////////////////////////////////////////////// -->
<?php
                $req = $bdd->prepare('SELECT auteur_commentaire, whotext_commentaire, DATE_FORMAT(date_commentaire, \'%Hh%i - %d/%m\') 
                    AS date_commentaire_fr FROM whotext_commentaires WHERE ID_whotext = ? ORDER BY date_commentaire LIMIT 0, 30') 
                    or die(print_r($bdd->errorInfo()));

                $req->execute(array($_GET['whotext_select']));

                while ($donnees = $req->fetch()){

                    echo '<h6><strong>' . htmlspecialchars($donnees['auteur_commentaire']) . '</strong> : 
                    '. htmlspecialchars($donnees['whotext_commentaire']) .'
                    <em><small style="color:grey;">'.htmlspecialchars($donnees['date_commentaire_fr']).'</small></em></h6>';
                }       

                $req->closeCursor();
                ?>
            <form action="whotext_guess_post.php" method="post" enctype="multipart/form-data">
                <p>

                    <a name="ancre"></a>
              
                        <input type="hidden" name="auteur_commentaire" value="<?php echo $_SESSION['user_pseudo']; ?>" id="ID_auteur_commentaire" 
                        class="form-control"/>
                        <input type="text" name="whotext_commentaire" id="whotext_commentaire" class="form-control" placeholder="Votre commentaire ..."/>
                        <input type="hidden" name="whotext_select" value="<?php echo $_GET['whotext_select']; ?>"/>
                    <div class="hide">
                        <input class="btn btn-default" type="submit" value="Ok"/>
                    </div>
                </p>
            </form>

            </div>
            <!--fin menu #1-->
<!-- //////////////////////////////////////////////////Old_Partie commentaires//////////////////////////////////////////////////////////////////////////////// -->
           

<!--///////////////////////////////////////////////////////// Partie partager /////////////////////////////////////////////////////////////////////-->

  <!--<div id="menu02" class="tab-pane fade"><br>
    <a href="#">envoyer par mail</a>
    <p>jjjshcds</p>
  </div>-->
        
        </div>
        <!--fin Tab panes-->
    </div>
    <!-- fin du footer -->
</div>
<!--//////////////////////////////////////////////////////////////////// fin du panel //////////////////////////////////////////////////////////////////////-->

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
<!-- PB AU NIVEAU DU SCRIPT SUIVANT AV LES AUTRES AHREF DU TAB   :  solve in v.1.1.1-->
    <script>

    $('a[href^="#"]').click(function(){
    var the_id = $(this).attr("href");

    $('html, body').animate({
        scrollTop:$(the_id).offset().top
    }, 'slow');
    return false;
});
    </script>
    

</body>

</html>
