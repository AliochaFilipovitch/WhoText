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
    #fixed {
        position: fixed;
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
                        <a data-toggle="tooltip" data-placement="bottom" title="Rafraîchir la page" href="whotext.php"><span class="glyphicon glyphicon-repeat"></span></a>
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
                    <li>
                        <a data-toggle="tooltip" data-placement="bottom" title="bientôt disponible">WhoMusic <span class="glyphicon glyphicon-headphones"></span></a>
                    </li>
                    <li>
                        <a data-toggle="tooltip" data-placement="bottom" title="bientôt disponible">WhoLocation <span class="glyphicon glyphicon-map-marker"></span></a>
                    </li>
                    <li>
                        <a data-toggle="tooltip" data-placement="bottom" title="bientôt disponible">WhoVideo <span class="glyphicon glyphicon-facetime-video"></span></a>
                    </li>
                    <li>
                        <a data-toggle="tooltip" data-placement="bottom" title="bientôt disponible">WhoEvent <span class="glyphicon glyphicon-bookmark"></span></a>
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
            <!-- PARTIE PROFILE -->
            <div class="col-md-4">
                <img src="_Picture/users/<?php echo $_SESSION['user_pic']; ?>" width="100" height="100" alt="user" class="img-thumbnail">   
                    <br>
                    <h6><span class="badge"><?php echo $_SESSION['user_found'];?></span> <em>Who</em>-message(s) trouvé(s)</h6>
                    <h6><span class="badge"><?php echo $_SESSION['user_destroy'];?></span> <em>Who</em>-message(s) détruit(s)</h6>
                    <h6><span class="badge"><?php echo $_SESSION['user_sent'];?></span> <em>Who</em>-message(s) envoyé(s)</h6>
                    <?php $var=(2*$_SESSION['user_found']+$_SESSION['user_sent'])-(2*$_SESSION['user_destroy']); ?>
                    <h1><small>performance<SUB> session (n-1)</SUB> = </small><?php echo ceil($var);?><small> pts</small></h1>
                    <br>
                    <a class="btn btn-warning btn-xs" href="avatar_guess.php" role="button"><em>Who</em>eurs</a>
                    <br>                        
                    <br>
            </div>
            <!-- PARTIE ECRITURE -->
            <div class="col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-body">           
        
        <!-- Nav tabs -->
        <ul class="nav nav-pills" id="myTab">
            <li class="active"><a data-toggle="tab" href="#menu01"><span data-toggle="tooltip" data-placement="bottom" title="Text" class="glyphicon glyphicon-pencil" ></span></a></li>
            <li><a data-toggle="tab" href="#menu02"><span data-toggle="tooltip" data-placement="bottom" title="LargeText" class="glyphicon glyphicon-align-left"></span></a></li>
            <li><a data-toggle="tab" href="#menu03"><span data-toggle="tooltip" data-placement="bottom" title="Picture" class="glyphicon glyphicon-picture"></span></a></li>
            <!--<li><a data-toggle="tab" href="#menu04"><span data-toggle="tooltip" data-placement="top" title="Music" class="glyphicon glyphicon-volume-up"></span></a></li>-->
            <li><a data-toggle="tab" href="#menu05"><span data-toggle="tooltip" data-placement="bottom" title="Link" class="glyphicon glyphicon-link"></span></a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content" id="myTabContent">
        
<!--/////////////////////////////////////////////// Partie Text type=0///////////////////////////////////////////////////////////////////-->
<div id="menu01" class="tab-pane fade active in"><br>
<form action="whotext_post.php" method="post" enctype="multipart/form-data">
    <p>
        <input type="hidden" name="auteur_whotext" value="<?php echo $_SESSION['user_pseudo']; ?>"/>
        <input type="hidden" name="ID_auteur_whotext" value="<?php echo $_SESSION['user_ID']; ?>"/>
        <input type="hidden" name="pic_profile" value="<?php echo $_SESSION['user_pic']; ?>"/>
    <!--<input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="pseudo"/>--><br>
        <input type="text" name="message_first_part" id="message_first_part" class="form-control" placeholder="Début du message ..."/><br />
        <input type="text" name="message_second_part" id="message_second_part" class="form-control" placeholder="... fin du message (partie invisible) ."/><br />
        <input class="btn btn-primary btn-xs" type="submit" value="Envoyer !"/>
    </p>
</form>
</div>


<!-- //////////////////////////////////////////////////Partie LargeText type=1//////////////////////////////////////////////////////////////////////////////// -->

<div id="menu02" class="tab-pane fade"><br>
<form action="whotext_large_post.php" method="post" enctype="multipart/form-data">
    <p>
        <input type="hidden" name="auteur_whotext" value="<?php echo $_SESSION['user_pseudo']; ?>"/>
        <input type="hidden" name="ID_auteur_whotext" value="<?php echo $_SESSION['user_ID']; ?>"/>
        <input type="hidden" name="pic_profile" value="<?php echo $_SESSION['user_pic']; ?>"/>
    <!--<input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="pseudo"/>--><br>
        <input type="text" name="message_first_part" id="message_first_part" class="form-control" placeholder="Début du message ..."/><br>
        <textarea name="message_second_part" id="message_first_part" class="form-control" rows="10" 
        placeholder="... fin du message (partie invisible) ."></textarea><br />
        <!--<input type="text" name="message_second_part" id="message_first_part" 
        class="form-control" placeholder="... fin du message (partie invisible) ."/>-->
        <input class="btn btn-primary btn-xs" type="submit" value="Envoyer !"/>
    </p>
</form>
</div>

<!--///////////////////////////////////////////////////////// Partie PIC type=2/////////////////////////////////////////////////////////////////////-->
<div id="menu03" class="tab-pane fade"><br>
<form action="whopic_post.php" method="post" enctype="multipart/form-data">
    <p>
        <input type="hidden" name="auteur_whotext" value="<?php echo $_SESSION['user_pseudo']; ?>"/>
        <input type="hidden" name="ID_auteur_whotext" value="<?php echo $_SESSION['user_ID']; ?>"/>
        <input type="hidden" name="pic_profile" value="<?php echo $_SESSION['user_pic']; ?>"/>
    <!--<input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="pseudo"/>--><br>
        <input type="text" name="message_first_part" id="message_first_part" class="form-control" placeholder="Début du message ..."/><br>
        <label>Photo max. 1 Mo (partie invisible)</label><input type="file" name="message_second_part" id="message_second_part" class="form-control"/><br />
        <input class="btn btn-primary btn-xs" type="submit" value="Envoyer !"/>
    </p>
</form>
</div>

<!--///////////////////////////////////////////////////////// Partie Music type=3 évolution v.2/////////////////////////////////////////////-->
<div id="menu04" class="tab-pane fade"><br>
<form action="whomusic_post.php" method="post" enctype="multipart/form-data">
    <p>
        <input type="hidden" name="auteur_whotext" value="<?php echo $_SESSION['user_pseudo']; ?>"/>
        <input type="hidden" name="ID_auteur_whotext" value="<?php echo $_SESSION['user_ID']; ?>"/>
        <input type="hidden" name="pic_profile" value="<?php echo $_SESSION['user_pic']; ?>"/>
    <!--<input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="pseudo"/>--><br>
        <input type="text" name="message_first_part" id="message_first_part" class="form-control" placeholder="Début du message ..."/><br>
        <label>Morceau : (partie invisible)</label><input type="file" name="message_second_part" id="message_second_part" class="form-control"/><br />
        <input class="btn btn-primary btn-xs" type="submit" value="Envoyer !"/>
    </p>
</form>
</div>

<!--///////////////////////////////////////////////////////// Partie Link type=4/////////////////////////////////////////////////////////////////////-->
<div id="menu05" class="tab-pane fade"><br>
<form action="wholink_post.php" method="post" enctype="multipart/form-data">
    <p>
        <input type="hidden" name="auteur_whotext" value="<?php echo $_SESSION['user_pseudo']; ?>"/>
        <input type="hidden" name="ID_auteur_whotext" value="<?php echo $_SESSION['user_ID']; ?>"/>
        <input type="hidden" name="pic_profile" value="<?php echo $_SESSION['user_pic']; ?>"/>
    <!--<input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="pseudo"/>--><br>
        <input type="text" name="message_first_part" id="message_first_part" class="form-control" placeholder="Début du message ..."/><br />
        <input type="text" name="message_second_part" id="message_second_part" class="form-control" placeholder="lien URL (partie invisible)"/><br />
        <input class="btn btn-primary btn-xs" type="submit" value="Envoyer !"/>
    </p>
</form> 
</div>       

</div>
<!--fin Tab panes-->
</div>
<!--fin panel body-->
</div>
<!--fin panel success-->

<br>


<!-- PARTIE MESSAGES -->

<?php

// Connexion à la base de données
include ('connect.php');


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//ICI ESPACE FOLLOWERS : à développer dans la version 2
//$reponses = $bdd->query("SELECT ID, ID_follow FROM groupes WHERE ID_pseudo='{$_SESSION['user_ID']}'") or die(print_r($bdd->errorInfo()));
//$donneess = $reponses->fetch();
//echo '<pre>';
//print_r( $donneess);
//echo '</pre>';
    //{ 
    //echo htmlspecialchars($donneess['ID_follow']);
    //$_SESSION['user_ID_follow']['$i'] = htmlspecialchars($donneess['ID_follow']);
    //$i=$i+1;
    //$qte[$_SESSION['user_ID']=intval($donneess['ID_follow']);
    //}
    
    //$reponses->closeCursor();

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//echo '<h4><span class="label label-danger">Message(s) à dé<em>Who</em>quer :</span></strong></h4>';‘‘‘‘‘''''
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
// Récupération des 10 derniers messages
$reponse = $bdd->query('SELECT ID, auteur_whotext, message_first_part, message_second_part, DATE_FORMAT(date_creation_whotext, \'%Hh%i - %d/%m\') 
   AS date_creation_fr FROM whotext WHERE found!=1 ORDER BY date_creation_whotext DESC LIMIT 0, 20') or die(print_r($bdd->errorInfo()));
// (
//$reponse = $bdd->query("SELECT 'whotext.ID', 'whotext.ID_auteur_whotext', 'whotext.message_first_part', 'whotext.message_second_part', 'groupes.ID_follow'
  //FROM whotext, groupes WHERE 'whotext.ID_auteur_whotext'='groupes.ID_follow' ") 
    //or die(print_r($bdd->errorInfo()));
// )

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{
    //if ($donnees['ID_auteur_whotext']==$donneess['ID_follow']) {
    //    echo "enjoy !!";
    //}
    ?>
    <a href="whotext_guess.php?whotext_select=<?php echo $donnees['ID']; ?>" style="text-decoration:none;color:#C00000;" 
        data-toggle="tooltip" data-placement="top" title="Cliquez et essayez de découvrir le message en entier">
        
    <?php

    echo '<div class="panel panel-danger">';
        echo '<div class="panel-heading">';
        //echo '<div class="panel-body">';
            echo '<div class="row">';
                echo '<div class="col-md-2">';
                echo '<img src="_Picture/site/icone.jpg" width="55" height="55" alt="inconnu" class="img-circle">';
                echo '</div>';
                echo '<div class="col-md-10">';
                echo '<h2 class="panel-title">Auteur inconnu</h2>';
                echo '<h6 style="color:grey;"><em>'.htmlspecialchars($donnees['date_creation_fr']).'</em></h6>';
                echo '</div>';
            echo '</div>';
        echo '</div>';
        echo '<div class="panel-body">';
            echo '<h5>' . htmlspecialchars($donnees['message_first_part']) . ' <span class="glyphicon glyphicon-lock"></span></h5>';  
        //echo '</div>';
        //echo '<div class="panel-footer">'; 
        echo '</div>';
    echo '</div>';
    ?>
    </a>
    <?php

}

$reponse->closeCursor();

?>
            <!-- fin du col-md-4 central -->
            </div>
            <div class="col-md-4">

            <!-- PARTIE COMMENTAIRES -->

<?php

$reponse = $bdd->query('SELECT ID, ID_whotext, auteur_commentaire, DATE_FORMAT(date_commentaire, \'%Hh%i - %d/%m\') 
    AS date_commentaire_fr FROM whotext_commentaires ORDER BY date_commentaire DESC LIMIT 0, 10') or die(print_r($bdd->errorInfo()));
//$reponse->execute(array($_GET['whotext_select']));
// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{

    echo '<h6>'.htmlspecialchars($donnees['auteur_commentaire']).' a commenté un ';
    ?>
    <a href="whotext_guess.php?whotext_select=<?php echo $donnees['ID_whotext']; ?>">message</a>  
    <?php
    echo  '<em>Who</em>. <span style="color:grey;"><small><em>'.htmlspecialchars($donnees['date_commentaire_fr']).'</small></em></span></h6>' ;
  
}

$reponse->closeCursor();

?>
<hr>
<?php

$reponse = $bdd->query('SELECT ID, ID_found, auteur_whotext, ID_whotext_found, auteur_found, DATE_FORMAT(date_found_whotext, \'%Hh%i - %d/%m\') 
    AS date_found_fr FROM whotext_found WHERE ID_found=1 ORDER BY date_found_whotext DESC LIMIT 0, 5') or die(print_r($bdd->errorInfo()));

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{

echo '<h6 style="color:green;">'.htmlspecialchars($donnees['auteur_found']).' a dé<em>Who</em>qué le ';
    ?>
    <a href="whotext_guess.php?whotext_select=<?php echo $donnees['ID_whotext_found']; ?>">message</a>   
    <?php
    echo 'de '.htmlspecialchars($donnees['auteur_whotext']).'. <span style="color:grey;"><small><em>'.htmlspecialchars($donnees['date_found_fr']).'</em></small></span></h6>' ;
 
}

$reponse->closeCursor();
?>
<hr>
<?php

$reponse = $bdd->query('SELECT ID, ID_found, auteur_whotext, ID_whotext_found, auteur_found, DATE_FORMAT(date_found_whotext, \'%Hh%i - %d/%m\') 
    AS date_found_fr FROM whotext_found WHERE ID_found!=1 ORDER BY date_found_whotext DESC LIMIT 0, 5') or die(print_r($bdd->errorInfo()));

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
while ($donnees = $reponse->fetch())
{

echo '<h6 style="color:#C00000;">'.htmlspecialchars($donnees['auteur_found']).' a détruit un message 
<em>Who</em>. <span style="color:grey;"><small><em>'.htmlspecialchars($donnees['date_found_fr']).'</em></small></h6>';
     
}

$reponse->closeCursor();

?>
            <!-- fin du col-md-4 à droite -->
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container -->

<!--<ul class="list-unstyled">
    <li>made with <span class="glyphicon glyphicon-heart"></span> by Q.I.</li>
    <li><span class="glyphicon glyphicon-copyright-mark"></span> Alexis Queune</li>
</ul>-->

    <!-- jQuery Version 1.11.1 -->
    <script src="_Style/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="_Style/js/bootstrap.min.js"></script>

    <script type="text/javascript">
    window.setTimeout("location=('whotext.php');",3000000);
    </script>

    <script>
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

</body>

</html>
