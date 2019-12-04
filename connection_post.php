<?php 
//session_start();
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', 'root');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
// Vérification des identifiants
$req = $bdd->prepare('SELECT * FROM membres WHERE pseudo = :pseudo AND pass = :pass') or die(print_r($bdd->errorInfo()));
$req->execute(array(
    'pseudo' => $_POST['pseudo'],
    'pass' => sha1($_POST['pass']),// Hachage du mot de passe
    ));

$resultat = $req->fetch();

if (!$resultat)
{
    echo 'Mauvais identifiant ou mot de passe !';
    ?>
    <a href="inscription.php">S'incrire</a> ou <a href="connection.php">Se connecter</a>
    <?php
}
else
{
    session_start();
    $_SESSION['user_pseudo'] = $_POST['pseudo'];
    $_SESSION['user_ID'] = $resultat['ID'];
    $_SESSION['user_email'] = $resultat['email'];
    $_SESSION['user_pic'] = $resultat['pic_profile'];
    $_SESSION['user_date'] = $resultat['date_inscription'];

    // Récupération du billet
$req = $bdd->prepare('SELECT * FROM membres WHERE ID = ?');
$req->execute(array($_SESSION['user_ID']));

$donnees = $req->fetch();
//echo htmlspecialchars($donnees['found']);
$req->closeCursor();


    $_SESSION['user_found'] = $donnees['found'];
    $_SESSION['user_destroy'] = $donnees['destroy'];
    $_SESSION['user_sent'] = $donnees['sent'];
    header('Location: whotext.php');
    //echo $_SESSION['user_pseudo'];
    //echo $_SESSION['user_ID'];
    //echo $_SESSION['user_email'];
    //echo $_SESSION['user_pic'];

    //$reqq = $bdd->prepare('SELECT * FROM membres') or die(print_r($bdd->errorInfo()));
    //$donnees = $reqq->fetch();
    //$_SESSION['user_ID_follow'] = array();
    //$i=1;
    //$reponses = $bdd->query("SELECT ID, ID_follow FROM groupes WHERE ID_pseudo='{$_SESSION['user_ID']}'") or die(print_r($bdd->errorInfo()));
    //while ($donneess = $reponses->fetch())
    //{ 
    //echo htmlspecialchars($donneess['ID_follow']);
    //$_SESSION['user_ID_follow']['$i'] = htmlspecialchars($donneess['ID_follow']);
    //$i=$i+1;
    //$qte[$_SESSION['user_ID']=intval($donneess['ID_follow']);
    //}
    
    //$reponses->closeCursor();

    //echo $_SESSION['user_ID_follow']['$i'];



    //echo $_SESSION[$donneess['ID_follow']];
   
}
$resultat->closeCursor();
?>