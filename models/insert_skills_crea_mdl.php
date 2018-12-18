<?php
$id_users = $_SESSION['id_users'];
// insertion des Formations dans la  BDD
try{
    $req = $pdo->prepare("INSERT INTO skills (title_skill, desc_skill, users_id_users ) VALUES (:title_skill, :desc_skill, :users_id_users)");
   // $res = $pdo->exec($sql);
   $req ->execute(array(
    'title_skill' => $title_skill,
    'desc_skill'=> $desc_skill,
    'users_id_users' => $id_users,

    ));


}
catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}