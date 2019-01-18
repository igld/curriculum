<?php
if (isset($_POST['exp_pro'])){
  //numéro ligne à supprimer
  $id_a_delete = htmlspecialchars($_POST['exp_pro']);
  // nom de la table 
  $tab= "exp_pro";
  // nom du champ qui correspond à l'id de la table a supprimer  
  $id="id_exp";
}
if (isset($_POST['trainings'])){
  //numéro ligne à supprimer
  $id_a_delete = htmlspecialchars($_POST['trainings']);
  // nom de la table 
  $tab= "trainings";
  // nom du champ qui correspond à l'id de la table a supprimer
  $id="id_train";
}
if (isset($_POST['skills'])){
  //numéro ligne à supprimer
  $id_a_delete = htmlspecialchars($_POST['skills']);
  // nom de la table 
  $tab= "skills";
  // nom du champ qui correspond à l'id de la table a supprimer
  $id="id_skill";
}
if (isset($_POST['realisations'])){
  //numéro ligne à supprimer
  $id_a_delete = htmlspecialchars($_POST['realisations']);
  // nom de la table 
  $tab= "realisations";
  // nom du champ qui correspond à l'id de la table a supprimer
  $id="id_rea";
}
if (isset($_POST['activities'])){
  //numéro ligne à supprimer
  $id_a_delete = htmlspecialchars($_POST['activities']);
  // nom de la table 
  $tab= "activities";
  // nom du champ qui correspond a l'id de la table a supprimer
  $id="id_act";
}
if (isset($_POST['m_exp_pro'])){
  //numéro ligne à modifier
  $id_a_afficher_exp = htmlspecialchars($_POST['m_exp_pro']);
  include '../models/ng_select_exp_pro_mdl.php';
  header('Location: ../views/modify_data.php');
  exit();
}
if (isset($_POST['m_trainings'])){
  //numéro ligne à modifier
  $id_a_afficher_train = htmlspecialchars($_POST['m_trainings']);
  include '../models/ng_select_trainings_mdl.php';
  header('Location: ../views/modify_data.php');
  exit();
}
if (isset($_POST['m_skills'])){
  //numéro ligne à modifier
  $id_a_afficher_skill = htmlspecialchars($_POST['m_skills']);
  include '../models/ng_select_skills_mdl.php';
  header('Location: ../views/modify_data.php');
  exit();
}
if (isset($_POST['m_realisations'])){
  //numéro ligne à modifier
  $id_a_afficher_rea = htmlspecialchars($_POST['m_realisations']);
  include '../models/ng_select_realisations_mdl.php';
  header('Location: ../views/modify_data.php');
  exit();
}
if (isset($_POST['m_activities'])){
  //numéro ligne à modifier
  $id_a_afficher_act = htmlspecialchars($_POST['m_activities']);
  include '../models/ng_select_activities_mdl.php';
  header('Location: ../views/modify_data.php');
  exit();
}
include '../models/delete_mdl.php';
echo "Donnée supprimée";
header('Location: ../views/add_modify_delete_data.php');

