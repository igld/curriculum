<?php
/* Récupération des $_POST de mail et mdp de l'utilisateur + htmlspecialchars pour protéger de la faille XSS*/
$mail = htmlspecialchars($_POST['mail']);
$mdp = htmlspecialchars($_POST['mdp']);
//Hachage mdp pour ne pas l'avoir en clair dans la BDD
$mdp_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
// print_r( $_POST); // affichage du post
//connection à la BDD
include '../models/connexion_BDD_mdl.php';

//----------------- CAS BOUTON ENREGISTREMENENT -----------------// 
// Récupération du nom du bouton cliqué  cas si enregistrement 
if (isset($_POST['enregistrement'])){
    //isset — Détermine si une variable est définie et est différente de NULL
    // Si Enregistrement est cliqué
    //echo ('enregistrement cliqué <br>');
    

    //recherche de correspondance du mail  dans la BDD  
    include '../models/select_mail_mdl.php';
    //print_r($req);
      
    /* SI ON TROUVE L EMAIL DANS LA BDD ON RETOURNE A L INDEX AVEC MESSAGE ERREUR */
    $donnees = $req->fetch();
    // echo ($donnees['$mdp']);
    if($req->rowCount() > 0){
        //Message d'erreur
        echo "Ce mail est déjà dans notre base de donnée, veuillez vérifier votre mot de passe!";
        echo "<strong>et utiliser le mode connexion SVP </strong>";
        //Retour a la page de connexion
        header('Location: ../index.php');
    }
    
    /* SINON enregistrement par insertion dans la base de donnée */   
    else{
        /* Insertion du mail et mot de passe utilisateur */
        include '../models/insert_mail_mdp_mdl.php';
        echo ('enregistrement dans la BDD FAIT');
        //récupération de l'id_users et cv_exist de l'utilisateur pout l'enregistrer dans la session 
        // connection à la BDD pour  id_users
        include '../models/select_mail_mdl.php';
        $res = $req->fetch();
        $id_users = $res['id_users'];
        $cv_exist = $res['cv_exist'];
        // ouverture de session
        session_start();
        $_SESSION['mdp'] = $mdp_hache;
        $_SESSION['mail'] = $mail;
        $_SESSION['id_users'] = $id_users;
        $_SESSION['cv_exist'] = $cv_exist; 
        //echo 'SESSION autorisée !';
        //déclaration à vide des variable de modification elles servent pour la sélection lol mise a jour du CV
        $_SESSION['id_exp'] ="";
        $_SESSION['id_train'] ="";
        $_SESSION['id_skill'] ="";
        $_SESSION['id_rea']="";
        $_SESSION['id_act']="";
    
        // page création CV 
        header('Location: ../views/create_or_modification.php');
    }
}

//----------------- CAS BOUTON CONNEXION -----------------//     
// Récupération du nom du bouton cliqué cas si connexion     
elseif (isset($_POST['connexion'])) {
    // Si connexion est cliqué
    //echo ('connexion cliqué');
    // verifier si mail et mdp sont ok
    //recherche de correspondance du mail  dans la BDD  
    include '../models/select_mail_mdl.php';
    //si le mail et le bon mdp correspondent dans la BDD une ligne existe
    if($req->rowCount() > 0){
        $res = $req->fetch();
        // Comparaison du pass envoyé via le formulaire avec la base
        //varchar de 255 car sinon ça ne passé pas mdp_haché sauvé mais non entier
        $isPasswordOK = password_verify($_POST['mdp'], $res['keypass_user']);
        if($isPasswordOK){ 
            // on passe dans une varible id_users et cv_exist pour les mettre en session
            $id_users = $res['id_users'];
            $cv_exist = $res['cv_exist'];
            echo "Ce mail et ce mot de passe correspondent : connexion autorisée!";
            // ouvrir session et passer sur la page création de CV verifier la modification avec la session
            session_start();
            $_SESSION['mail'] = $mail;
            $_SESSION['mdp'] = $res['keypass_user'];
            $_SESSION['id_users'] = $id_users; 
            $_SESSION['cv_exist'] = $cv_exist; 
            $_SESSION['id_exp'] ="";
            $_SESSION['id_train'] ="";
            $_SESSION['id_skill'] =""; 
            $_SESSION['id_rea']="";
            $_SESSION['id_act']="";
            echo 'SESSION autorisée !';
            // et passer sur la page création de CV
            header('Location: ../views/create_or_modification.php');
        }  
    }
    /* Mauvais Mail ou MDP  */   
    else{
        // retour a l'accueil recommencer SVP
        echo "Erreur Mail ou MDP veuillez recommencez SVP";
        // mettre retour a la page de connexion
        header('Location: ../index.php');
    } 
}
//Dans tous les autres cas Sécurité
else {
    echo "comment t'es venu sur cette page ?";
    // mettre retour a la page de connexion
    header('Location: ../index.php');
}












