<?php

session_start();

if($_POST['auteur_commentaire']=='' OR $_POST['whotext_commentaire']=='' OR $_POST['whotext_select']=='') {
        
        echo '<p>MERCI DE COMPLETER LE CHAMP DE COMMENTAIRES</p>';
        ?>
        <a href="whotext_guess.php?whotext_select=<?php echo $_POST['whotext_select']; ?>">retour</a>
        <?php
    }
else {

// Connexion à la base de données
include ('connect.php');
        
        // Insertion du message à l'aide d'une requête préparée
    $req = $bdd->prepare('INSERT INTO whotext_commentaires (ID_whotext, auteur_commentaire, whotext_commentaire, date_commentaire) 
        VALUES(:ID_whotext, :auteur_commentaire, :whotext_commentaire, NOW())') or die(print_r($bdd->errorInfo()));
    $req->execute(array(
        'ID_whotext' => $_POST['whotext_select'], 
        'auteur_commentaire' => $_POST['auteur_commentaire'], 
        'whotext_commentaire' => $_POST['whotext_commentaire'],
    ));
    // Redirection du visiteur vers la page du whotext sélectionné
    header("Location: whotext_guess.php?whotext_select=".$_POST['whotext_select']."#ancre");

    }

?>