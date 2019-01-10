<?php
$id_users = $_SESSION['id_users'];
// insertion des Formations dans la  BDD
try{
    $req = $pdo->prepare("INSERT INTO trainings (start_date_train, end_date_train, school_train, location_train, title_train, dipl_name_train, dipl_validate_train, users_id_users ) VALUES (:start_date_train, :end_date_train, :school_train, :location_train, :title_train, :dipl_name_train, :dipl_validate_train, :users_id_users)");
    $req ->execute(array(
        'start_date_train' => $start_date_train,
        'end_date_train'=> $end_date_train,
        'school_train' => $school_train,
        'location_train' => $location_train,
        'title_train' => $title_train,
        'dipl_name_train' => $dipl_name_train,
        'dipl_validate_train' => $dipl_validate_train,
        'users_id_users' => $id_users,
    ));
}
catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}