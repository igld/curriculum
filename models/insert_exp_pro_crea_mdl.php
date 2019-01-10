<?php
$id_users = $_SESSION['id_users'];
// insertion de l'experience  dans la  BDD
try{
    $req = $pdo->prepare("INSERT INTO exp_pro (start_date_exp, end_date_exp, firm_name_exp, location_exp, job_exp, mission_exp, type_contract_exp, users_id_users ) VALUES (:start_date_exp , :end_date_exp, :firm_name_exp, :location_exp, :job_exp, :mission_exp, :type_contract_exp, :users_id_users)");
    $req ->execute(array(
        'start_date_exp' => $start_date_exp,
        'end_date_exp'=> $end_date_exp,
        'firm_name_exp' => $firm_name_exp,
        'location_exp' => $location_exp,
        'job_exp' => $job_exp,
        'mission_exp' => $mission_exp,
        'type_contract_exp' => $type_contract_exp,
        'users_id_users' => $id_users,

    ));
}
catch(Exception $e){
    die('Erreur : '.$e->getMessage());
}