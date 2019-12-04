<?php

session_start();

if($_POST['auteur_whotext']=='' OR $_POST['message_first_part']=='' OR $_POST['message_second_part']=='') {
        
        echo '<p>MERCI DE COMPLETER TOUS LES CHAMPS</p>';
        echo '<a href="whotext.php">retour</a>';
    }
else {

$_POST['message_second_part'] = preg_replace('#http://[a-z0-9._/-]+#i', '<a href="$0">$0</a>', $_POST['message_second_part']);

include ('connect.php');

$req = $bdd->prepare('INSERT INTO whotext (auteur_whotext, pic_profile, message_first_part, message_second_part, type, date_creation_whotext) VALUES(?, ?, ?, ?, ?, NOW())');
$req->execute(array($_POST['auteur_whotext'], $_POST['pic_profile'], $_POST['message_first_part'], $_POST['message_second_part'], 4));

$nb_modifs = $bdd->exec("UPDATE membres SET sent=sent+1 WHERE ID = '{$_POST['ID_auteur_whotext']}'")or die(print_r($bdd->errorInfo()));


header('Location: whotext.php');

}
?>
