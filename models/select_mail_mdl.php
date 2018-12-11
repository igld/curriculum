<?php
//vérifier si mail + mdp existent dans la BDD erreur si le mail existe sinon retour à l'accueil
/* SELECTION DE COMPARAISON */
    try {
        $req = $pdo->prepare("SELECT id_users, mail_user, keypass_user, cv_exist FROM users WHERE mail_user = :mail");
        /* on a le tableau avec les données */
        $req->execute(array(':mail' => $mail,
                            
        ));
    } 
    catch (PDOException $e) {
        echo "Base de donnée non disponible";
    }