<?php
/* Récupération des $_POST de mail et mdp de l'utilisateur + htmlspecialchars pour protéger de la faille XSS*/
$mail = htmlspecialchars($_POST['mail']);
$mdp = htmlspecialchars($_POST['mdp']);
//Hachage mdp pour ne pas l'avoir en clair dans la BDD
$mdp_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
// print_r( $_POST);  affichage du post
//connection à la BDD
include '../models/connexion_BDD_mdl.php';

// CAS BOUTON ENREGISTREMENENT
// Récupération du nom du bouton cliqué  cas si enregistrement 
if (isset($_POST['enregistrement'])){
    //isset — Détermine si une variable est définie et est différente de NULL
    // Si Enregistrement est cliqué
    echo ('enregistrement cliqué <br>');
    

//recherche de correspondance du mail  dans la BDD  
    include '../models/select_mail_mdl.php';
    //print_r($req);

    
/* SI ON TROUVE L EMAIL DANS LA BDD ON RETOURNE A L INDEX AVEC MESSAGE ERREUR */
    $donnees = $req->fetch();
    echo ($donnees['$mdp']);
    if($req->rowCount() > 0){
        echo "Ce mail est déjà dans notre base de donnée, veuillez passer par connexion pour vous connecter SVP!";
      //  print_r($req);
        // mettre header avec message erreur
    }
    
/* SINON enregistrement par insertion dans la base de donnée */   
    else{
        /* Insertion du mail et mot de passe utilisateur */
        include '../models/insert_mail_mdp_mdl.php';
        echo ('enregistrement dans la BDD FAIT');

            // ouverture de session
            session_start();
            $_SESSION['mdp'] = $mdp_hache;
            $_SESSION['mail'] = $mail;
            echo 'SESSION autorisée !';

        // page création CV 
    //    header('Location: ../views/creer_modifier.php');
    }
}








// CAS BOUTON CONNEXION     
// Récupération du nom du bouton cliqué cas si connexion     
elseif (isset($_POST['connexion'])) {
    // Si connexion est cliqué
    echo ('connexion cliqué');
    // verifier si mail et mdp sont ok
    //recherche de correspondance du mail  dans la BDD  
    include '../models/select_mail_mdp_mdl.php';
    //si le mail et le bon mdp correspondent dans la BDD une ligne existe
   if($req->rowCount() > 0){

       $res = $req->fetch();
      // echo $res['keypass_user'];
       // Comparaison du pass envoyé via le formulaire avec la base
       //varchar de 255 car sinon ça ne passé pas mdp_haché sauvé mais non entier
        $isPasswordOK = password_verify($_POST['mdp'], $res['keypass_user']);
        echo $_POST['mdp'].'<br>';
        echo $res['keypass_user'];
        var_dump ($isPasswordOK);
        if($isPasswordOK){ 
            //$resultat = $req->fetch();


        echo "Ce mail et ce mot de passe correspondent : connexion autorisée!";
    // print_r($req);
    // ouvrir session et passer sur la page création de CV
        session_start();
        $_SESSION['mail'] = $mail;
        $_SESSION['mdp'] = $res['keypass_user'];
        echo 'SESSION autorisée !';
    // et passer sur la page création de CV
        header('Location: ../views/creer_modifier.php');
          }  
    }

    /* Mauvais Mail ou MDP  */   
    else{
        // retour a l'acceuil recommencer SVP
        echo "Erreur Mail ou MDP veuillez recommencez SVP";
    } 
}

//Dans tous les autres cas Sécurrité
    else {
    echo "comment t'es venu sur cette page ?";
 
}












