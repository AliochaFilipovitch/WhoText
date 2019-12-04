<?php

session_start();

if($_POST['auteur_whotext']=='' OR $_POST['message_first_part']=='' OR $_POST['message_second_part']=='') {
        
        echo '<p>MERCI DE COMPLETER TOUS LES CHAMPS</p>';
        echo '<a href="whotext.php">retour</a>';
    }
else {

    include ('connect.php');

        
        // Insertion du message à l'aide d'une requête préparée

$req = $bdd->prepare('INSERT INTO whotext (auteur_whotext, pic_profile, message_first_part, message_second_part, type, date_creation_whotext) VALUES(?, ?, ?, ?, ?, NOW())');
$req->execute(array($_POST['auteur_whotext'], $_POST['pic_profile'], $_POST['message_first_part'], $_POST['message_second_part'], 1));

$nb_modifs = $bdd->exec("UPDATE membres SET sent=sent+1 WHERE ID = '{$_POST['ID_auteur_whotext']}'")or die(print_r($bdd->errorInfo()));


header('Location: whotext.php');

}
?>
