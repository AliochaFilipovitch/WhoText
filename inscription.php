<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="whotext">
    <meta name="author" content="alexis queune">

    <title>Who - inscription</title>

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
                <a class="navbar-brand" href="connection.php">Who <span class="glyphicon glyphicon-pencil"></span> <span class="glyphicon glyphicon-picture"></span>
     <span class="glyphicon glyphicon-link"></span></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="connection.php">Se connecter</a>
                    </li>
                    <!--<li>
                        <a href="#">About</a>
                    </li>-->
                    <li>
                        <a data-toggle="tooltip" data-placement="bottom" title="contact me by email" href="mailto:alexis.queune1@gmail.com">Contact</a>
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
                <h1>Who <span class="glyphicon glyphicon-pencil"></span> <span class="glyphicon glyphicon-picture"></span>
     <span class="glyphicon glyphicon-link"></span></h1>
                <p class="lead">Pour accéder au fun, complétez ce formulaire d'inscription.</p>
          
                <form method="post" enctype="multipart/form-data">
                    <p>
                    <input type="text" name="pseudo" id="pseudo" class="form-control" placeholder="pseudo"/><br>
                    <input type="password" name="pass" id="pass" class="form-control" placeholder="mot de passe"/><br />
                    <input type="password" name="pass2" id="pass2" class="form-control" placeholder="mot de passe (vérification)"/><br />
                    <input type="text" name="email" id="email" class="form-control" placeholder="adresse mail"/><br />
                    <label>photo de profil <small>1 Mo max.</small><input type="file" name="pic_profile" id="pic_profile" class="form-control"/></label><br /><br />
                    <input class="btn btn-success" type="submit" value="Go !"/> 
                    <p><span>ou</span> <a href="connection.php">Se connecter</a></p>
                    </p>    
                </form>



            <?php
// D'abord, je me connecte à la base de données.
                    try
                    {
                        $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
                    }
                    catch(Exception $e)
                    {
                    die('Erreur : '.$e->getMessage());
                    }


//$reponse = mysql_query("SELECT pseudo FROM membres WHERE pseudo='".$_POST['pseudo']."'") or die(print_r($bdd->errorInfo()));

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
//foreach ($donnees as $reponse)
//{


//echo $donnees['pseudo'];




                if(!$_POST['pseudo']=='')
                {
                



                    // Je mets aussi certaines sécurités ici…
                    $pass = htmlspecialchars($_POST['pass']);
                    $pass2 = htmlspecialchars($_POST['pass2']);
                    if($pass == $pass2)
                    {
                        //upload du fichier
                        if (isset($_FILES['pic_profile']) AND $_FILES['pic_profile']['error'] == 0)
                        {
                        // Testons si le fichier n'est pas trop gros
                            if ($_FILES['pic_profile']['size'] <= 8000000)
                            {
                            // Testons si l'extension est autorisée
                            $infosfichier = pathinfo($_FILES['pic_profile']['name']);
                            $extension_upload = $infosfichier['extension'];
                            $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                            if (in_array($extension_upload, $extensions_autorisees))
                                {
                                // On peut valider le fichier et le stocker définitivement
                                move_uploaded_file($_FILES['pic_profile']['tmp_name'], '_Picture/users/' . basename($_FILES['pic_profile']['name']));
                                //echo "L'envoi a bien été effectué !";
                                //echo $_FILES['pic_profile']['name'];
                                }
                            }
                        }
                
                    // Insertion
                    $req = $bdd->prepare('INSERT INTO membres(pseudo, pass, email, pic_profile, date_inscription) 
                        VALUES(:pseudo, :pass, :email, :pic_profile, CURDATE())') or die(print_r($bdd->errorInfo()));
                    $req->execute(array(
                        'pseudo' => $_POST['pseudo'],
                        'pass' => sha1($_POST['pass']),// Hachage du mot de passe
                        'email' => $_POST['email'],
                        'pic_profile' => $_FILES['pic_profile']['name'],
                        ));

                    echo '<p style="color:green;"><strong>Vous êtes bien inscrit.</strong> &#155;&#155; <a href="connection.php">Se connecter</a> &#155;&#155;</p>';
                    }

                    else
                    {
                    echo '<p style="color:red;">Les deux mots de passe que vous avez rentrés ne correspondent pas...</p>';
                    }
                }

               

                
                else 
                {
                    echo '<p style="color:red;">Merci de compléter tous les champs</p>';
                }

           


$reponse->closeCursor();  




?>   

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
