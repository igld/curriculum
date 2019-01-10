<?php
$id_users = $_SESSION['id_users'];
// insertion des Formations dans la  BDD
try{
    $req = $pdo->prepare("INSERT INTO activities (title_act, desc_act, users_id_users ) VALUES (:title_act, :desc_act, :users_id_users)");
    $req ->execute(array(
        'title_act' => $title_act,
        'desc_act'=> $desc_act,
        'users_id_users' => $id_users,
        ));
}
catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}