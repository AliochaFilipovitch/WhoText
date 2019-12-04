<?php

session_start();

if($_POST['auteur_whotext']=='' OR $_POST['message_first_part']=='' OR $_FILES['message_second_part']=='') {
        
        echo '<p>MERCI DE COMPLETER TOUS LES CHAMPS</p>';
        echo '<a href="whotext.php">retour</a>';
    }
else {


if (isset($_FILES['message_second_part']) AND $_FILES['message_second_part']['error'] == 0)
{
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['message_second_part']['size'] <= 8000000) //8Mo c'est le max pour php
        {
                // Testons si l'extension est autorisée
                $infosfichier = pathinfo($_FILES['message_second_part']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_autorisees = array('mp3','m4a');
                if (in_array($extension_upload, $extensions_autorisees))
                {
                        // On peut valider le fichier et le stocker définitivement
                        move_uploaded_file($_FILES['message_second_part']['tmp_name'], '_Music/' . basename($_FILES['message_second_part']['name']));
                        //echo "L'envoi a bien été effectué !";
                        //echo $_FILES['message_second_part']['name'];
                }
        }
}

include ('connect.php');
        
// Insertion du message à l'aide d'une requête préparée

$req = $bdd->prepare('INSERT INTO whotext (auteur_whotext, pic_profile, message_first_part, message_second_part, type, date_creation_whotext) VALUES(?, ?, ?, ?, ?, NOW())');
$req->execute(array($_POST['auteur_whotext'], $_POST['pic_profile'], $_POST['message_first_part'], $_FILES['message_second_part']['name'], 3));
//$nb_modifs = $bddd->exec("UPDATE whotext SET type=type+1 WHERE ID = '{$_POST['ID']}'") or die(print_r($bdd->errorInfo()));
//echo $nb_modifs;

$nb_modifs = $bdd->exec("UPDATE membres SET sent=sent+1 WHERE ID = '{$_POST['ID_auteur_whotext']}'")or die(print_r($bdd->errorInfo()));

header('Location: whotext.php');


}
?>
