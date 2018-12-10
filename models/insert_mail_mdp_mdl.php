<?php
try{
    $req = $pdo->prepare("INSERT INTO users (keypass_user, mail_user) VALUES (:keypass_user , :mail_user)");
   // $res = $pdo->exec($sql);
   $req ->execute(array(
    'keypass_user' => $mdp_hache,
    'mail_user'=> $mail,

    ));


}
catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}