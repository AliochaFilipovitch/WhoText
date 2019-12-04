<?php 
session_start();
// Connexion à la base de données
include ('connect.php');

if($_POST['auteur_whotext']=='') {
        
    echo '<p>MERCI DE COMPLETER TOUS LES CHAMPS</p>';
    ?>
    <a href="whotext_guess.php?whotext_select=<?php echo $_POST['whotext_select']; ?>">retour</a>
    <?php
}

else {

// Vérification des identifiants
$req = $bdd->prepare('SELECT * FROM whotext WHERE auteur_whotext = :auteur_whotext') or die(print_r($bdd->errorInfo()));
$req->execute(array(
    'auteur_whotext' => $_POST['auteur_whotext'],
    ));


$resultat = $req->fetch();
if (!$resultat)
{
    //echo 'c pas lui</br>';
    //echo $_POST['ID'];
    $nb_modifs = $bdd->exec("UPDATE whotext SET try=try+1 WHERE ID = '{$_POST['ID']}'") or die(print_r($bdd->errorInfo()));
    $reponse = $bdd->query("SELECT try FROM whotext WHERE ID = '{$_POST['ID']}'");
    $donnees = $reponse->fetch();
    //echo $donnees['try'];
    $reponse->closeCursor();

    if ($donnees['try']>=3) {
    	echo '<p>Incorrect. Il ne vous reste plus d\'essai.</p>';
    	echo '<p><strong>The Who-Message is destroyed. Sorry.</strong></p>';
        echo '<a href="whotext.php">Retour</a>';
    	$nb_modifs = $bdd->exec("DELETE FROM whotext WHERE ID = '{$_POST['ID']}'")or die(print_r($bdd->errorInfo()));
        $req = $bdd->prepare('INSERT INTO whotext_commentaires (ID_whotext, messge_second_part) VALUES(:ID_whotext, :messge_second_part') 
            or die(print_r($bdd->errorInfo()));
            $req->execute(array(
            'ID_whotext' => $_POST['ID'],
            'messge_second_part' => 1,
            ));
        $nb_modifs = $bdd->exec("DELETE FROM whotext_commentaires WHERE ID_whotext = '{$_POST['ID']}'");
    	//header('Location: whotext.php');

        $req = $bdd->prepare('INSERT INTO whotext_found (ID_whotext_found, ID_auteur_found, auteur_found, date_found_whotext) VALUES(:ID_whotext_found, :ID_auteur_found, :auteur_found, NOW())') 
        or die(print_r($bdd->errorInfo()));
        $req->execute(array(
        'ID_whotext_found' => $_POST['whotext_select'],
        'ID_auteur_found' => $_POST['ID_auteur_found'], 
        'auteur_found' => $_POST['auteur_found'], 
        ));

        $nb_modifs = $bdd->exec("UPDATE membres SET destroy=destroy+1 WHERE ID = '{$_POST['ID_auteur_found']}'")or die(print_r($bdd->errorInfo()));

    }

    else {
    	$donnees['try']=3-$donnees['try'];
    	//echo '<p>Incorrect. Il vous reste encore '.$donnees['try'].' chance(s). Attention.</p>';
        //header('Location: whotext.php');
       
        header('Location: whotext_guess.php?whotext_select='.$_POST['whotext_select']);
    }
}

else
{
    //echo '<p>Excellent ! Vous avez trouvez !</p>';
    //echo $_POST['ID'];
    $nb_modifs = $bdd->exec("UPDATE whotext SET found=found+1 WHERE ID = '{$_POST['ID']}'")or die(print_r($bdd->errorInfo()));

    


    //echo '<p>'.$nb_modifs.' entrées ont été modifiées !</p>';
    
    $req = $bdd->prepare('INSERT INTO whotext_found (ID_found, auteur_whotext, ID_whotext_found, ID_auteur_found, auteur_found, date_found_whotext) VALUES(:ID_found, :auteur_whotext, :ID_whotext_found, :ID_auteur_found, :auteur_found, NOW())') 
    or die(print_r($bdd->errorInfo()));
    $req->execute(array(
    'ID_found' => 1,
    'auteur_whotext' => $_POST['auteur_whotext'],
    'ID_whotext_found' => $_POST['whotext_select'],
    'ID_auteur_found' => $_POST['ID_auteur_found'], 
    'auteur_found' => $_POST['auteur_found'], 

    ));

    $nb_modifs = $bdd->exec("UPDATE membres SET found=found+1 WHERE ID = '{$_POST['ID_auteur_found']}'")or die(print_r($bdd->errorInfo()));

    header('Location: whotext_guess.php?whotext_select='.$_POST['whotext_select']);

}
    
}
?>