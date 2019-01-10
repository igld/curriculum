<?php
$id_users = $_SESSION['id_users'];
// insertion des  réalisations  dans la  BDD
try{
    $req = $pdo->prepare("INSERT INTO realisations (start_date_rea, end_date_rea, title_rea, desc_rea, users_id_users ) VALUES (:start_date_rea , :end_date_rea, :title_rea, :desc_rea, :users_id_users)");
    $req ->execute(array(
        'start_date_rea' => $start_date_rea,
        'end_date_rea'=> $end_date_rea,
        'title_rea' => $title_rea,
        'desc_rea' => $desc_rea,
        'users_id_users' => $id_users,
    ));
}
catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}