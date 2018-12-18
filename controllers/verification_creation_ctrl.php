<?php
session_start();
echo $_SESSION['id_users'];
//connection à la BDD
include '../models/connexion_BDD_mdl.php';
var_dump( $_POST);
echo '<br>';

// info utilisateur

if (isset($_POST['busers'])){
$name_user = htmlspecialchars($_POST['name_user']);
$lastname_user = htmlspecialchars($_POST['lastname_user']);
$date_birth_user = htmlspecialchars($_POST['date_birth_user']);
$address_user = htmlspecialchars($_POST['address_user']);
$phone_user = htmlspecialchars($_POST['phone_user']);
$cv_title_user = htmlspecialchars($_POST['cv_title_user']);
$handicap_user = htmlspecialchars($_POST['handicap_user']);
include '../models/update_user_crea_mdl.php';
var_dump($_POST);
}

// experience
else if (isset($_POST['exp_pro'])){
$start_date_exp =  htmlspecialchars($_POST['start_date_exp']);
$end_date_exp = htmlspecialchars($_POST['end_date_exp']);
$firm_name_exp = htmlspecialchars($_POST['firm_name_exp']);
$location_exp = htmlspecialchars($_POST['location_exp']);
$job_exp = htmlspecialchars($_POST['job_exp']);
$mission_exp = htmlspecialchars($_POST['mission_exp']);
$type_contract_exp = htmlspecialchars($_POST['type_contract_exp']);
// enregistrement dans la BDD des expéreiences
include '../models/insert_exp_pro_crea_mdl.php';
var_dump($_POST);
}
else if (isset($_POST['trainings'])){
// Formations trainings
$start_date_train = htmlspecialchars($_POST['start_date_train']);
$end_date_train = htmlspecialchars($_POST['end_date_train']);
$school_train = htmlspecialchars($_POST['school_train']);
$location_train = htmlspecialchars($_POST['location_train']);
$title_train = htmlspecialchars($_POST['title_train']);
$dipl_name_train = htmlspecialchars($_POST['dipl_name_train']);
$dipl_validate_train = htmlspecialchars($_POST['dipl_validate_train']);
// enregistrement dans la BDD des Formations
include '../models/insert_trainings_crea_mdl.php';
}
//Compétences skills
else if (isset($_POST['skills'])){
$title_skill = htmlspecialchars($_POST['title_skill']);
$desc_skill  = htmlspecialchars($_POST['desc_skill']);
// enregistrement dans la BDD des Formations
include '../models/insert_skills_crea_mdl.php';
}
// realisations
else if (isset($_POST['realisations'])){
$start_date_rea  =  htmlspecialchars($_POST['start_date_rea']);
$end_date_rea = htmlspecialchars($_POST['end_date_rea']);
$title_rea = htmlspecialchars($_POST['title_rea']);
$desc_rea = htmlspecialchars($_POST['desc_rea']);
// enregistrement dans la BDD des Formations
include '../models/insert_realisations_crea_mdl.php';
}
//activities
else if (isset($_POST['activities'])){
$title_act = htmlspecialchars($_POST['title_act']);
$desc_act = htmlspecialchars($_POST['desc_act']);
// enregistrement dans la BDD des Formations
include '../models/insert_activities_crea_mdl.php';
;
}
else{
    echo "erreur inconnu";
}
