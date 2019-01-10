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
echo "Donnée sauvegardée";
header('Refresh: 2;url=../views/creation3.php');
}

// Expérience
else if (isset($_POST['exp_pro'])){
    // Expérience
    if (isset($_POST['del_exp_pro'])){
        $id_exp = htmlspecialchars($_POST['del_exp_pro']);
        //echo $id_exp;
        // suppression dans la BDD des expériences
        include '../models/delete_mdl.php';
        //var_dump($_POST);
        echo "Expérience supprimée";
        header('Refresh: 2;url=../views/creation3.php');
    }
    elseif(isset($_POST['up_exp_pro'])){
        $mid_exp = htmlspecialchars($_POST['up_exp_pro']);
        $start_date_exp =  htmlspecialchars($_POST['start_date_exp']);
        $end_date_exp = htmlspecialchars($_POST['end_date_exp']);
        $firm_name_exp = htmlspecialchars($_POST['firm_name_exp']);
        $location_exp = htmlspecialchars($_POST['location_exp']);
        $job_exp = htmlspecialchars($_POST['job_exp']);
        $mission_exp = htmlspecialchars($_POST['mission_exp']);
        $type_contract_exp = htmlspecialchars($_POST['type_contract_exp']);

        // UPDATE dans la BDD des Expériences
        include '../models/update_exp_pro_mdl.php';
        echo "Expérience mise à jour";
        $_SESSION['id_exp'] ="";
        header('Refresh: 2;url=../views/add_modify_delete_data.php');
    }
    else{
        $start_date_exp =  htmlspecialchars($_POST['start_date_exp']);
        $end_date_exp = htmlspecialchars($_POST['end_date_exp']);
        $firm_name_exp = htmlspecialchars($_POST['firm_name_exp']);
        $location_exp = htmlspecialchars($_POST['location_exp']);
        $job_exp = htmlspecialchars($_POST['job_exp']);
        $mission_exp = htmlspecialchars($_POST['mission_exp']);
        $type_contract_exp = htmlspecialchars($_POST['type_contract_exp']);
        // enregistrement dans la BDD des Expériences
        include '../models/insert_exp_pro_crea_mdl.php'
        echo "Expérience sauvegardée";
        header('Refresh: 2;url=../views/add_modify_delete_data.php');
    }
}
else if (isset($_POST['trainings'])){
    // Formations trainings mise a jour des données
    if(isset($_POST['up_trainings'])){
        $id_train = htmlspecialchars($_POST['up_trainings']);
        $start_date_train = htmlspecialchars($_POST['start_date_train']);
        $end_date_train = htmlspecialchars($_POST['end_date_train']);
        $school_train = htmlspecialchars($_POST['school_train']);
        $location_train = htmlspecialchars($_POST['location_train']);
        $title_train = htmlspecialchars($_POST['title_train']);
        $dipl_name_train = htmlspecialchars($_POST['dipl_name_train']);
        $dipl_validate_train = htmlspecialchars($_POST['dipl_validate_train']);
        // UPDATE dans la BDD des Formations
        include '../models/update_trainings_mdl.php';
        echo "Compétence mise à jour!";
        $_SESSION['id_train'] ="";
        header('Refresh: 2;url=../views/add_modify_delete_data.php');
    }
    else {
        $start_date_train = htmlspecialchars($_POST['start_date_train']);
        $end_date_train = htmlspecialchars($_POST['end_date_train']);
        $school_train = htmlspecialchars($_POST['school_train']);
        $location_train = htmlspecialchars($_POST['location_train']);
        $title_train = htmlspecialchars($_POST['title_train']);
        $dipl_name_train = htmlspecialchars($_POST['dipl_name_train']);
        $dipl_validate_train = htmlspecialchars($_POST['dipl_validate_train']);
        // enregistrement dans la BDD des Formations
        include '../models/insert_trainings_crea_mdl.php';
        echo "Compétences sauvegardées";
        header('Refresh: 2;url=../views/creation3.php');
    }
}
//Compétences skills
else if (isset($_POST['skills'])){
    if(isset($_POST['up_skills'])){
        $id_skill = htmlspecialchars($_POST['up_skills']);
        $title_skill = htmlspecialchars($_POST['title_skill']);
        $desc_skill  = htmlspecialchars($_POST['desc_skill']);
        // UPDATE dans la BDD des Compétences
        include '../models/update_skills_mdl.php';
        echo "Compétence mise à jour";
        $_SESSION['id_skill'] ="";
        header('Refresh: 2;url=../views/add_modify_delete_data.php');   
    }
    else{
        $title_skill = htmlspecialchars($_POST['title_skill']);
        $desc_skill  = htmlspecialchars($_POST['desc_skill']);
        // enregistrement dans la BDD des Compétences
        include '../models/insert_skills_crea_mdl.php';
        echo "Compétence ajoutée";
        header('Refresh: 2;url=../views/add_modify_delete_data.php');

    }
}
//Réalisations
else if (isset($_POST['realisations'])){
    if(isset($_POST['up_realisations'])){
        $id_rea = htmlspecialchars($_POST['up_realisations']);
        $start_date_rea  =  htmlspecialchars($_POST['start_date_rea']);
        $end_date_rea = htmlspecialchars($_POST['end_date_rea']);
        $title_rea = htmlspecialchars($_POST['title_rea']);
        $desc_rea = htmlspecialchars($_POST['desc_rea']);
        // UPDATE dans la BDD des Réalisations
        include '../models/update_realisations_mdl.php';
        echo "Réalisation mise à jour";
        $_SESSION['id_rea'] ="";
        header('Refresh: 2;url=../views/add_modify_delete_data.php');   
    }
    else{
        //modification des Réalisations
        $start_date_rea  =  htmlspecialchars($_POST['start_date_rea']);
        $end_date_rea = htmlspecialchars($_POST['end_date_rea']);
        $title_rea = htmlspecialchars($_POST['title_rea']);
        $desc_rea = htmlspecialchars($_POST['desc_rea']);
        // enregistrement dans la BDD des Réalisations
        include '../models/insert_realisations_crea_mdl.php';
        echo "Réalisation ajoutée";
        header('Refresh: 2;url=../views/add_modify_delete_data.php');
    }
}
// Activités (activities)
else if (isset($_POST['activities'])){
    if(isset($_POST['up_activities'])){
        $id_act = htmlspecialchars($_POST['up_activities']);
        $title_act = htmlspecialchars($_POST['title_act']);
        $desc_act = htmlspecialchars($_POST['desc_act']);
        // UPDATE dans la BDD des Activités
        include '../models/update_activities_mdl.php';
        echo "Activité mise à jour";
        $_SESSION['id_act'] ="";
        header('Refresh: 2;url=../views/add_modify_delete_data.php');   
    }
    else{
        //modification des activités
        $title_act = htmlspecialchars($_POST['title_act']);
        $desc_act = htmlspecialchars($_POST['desc_act']);
        // enregistrement dans la BDD des Activités
        include '../models/insert_activities_crea_mdl.php';
        echo "Activité ajoutée";
        header('Refresh: 2;url=../views/add_modify_delete_data.php');
    }
}
else{
    echo "erreur inconnu";
}
