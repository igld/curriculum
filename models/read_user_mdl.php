<?php
$id_users = $_SESSION['id_users'];

try {
  //  $req = $pdo->prepare("SELECT name_user,lastname_user, address_user, phone_user, cv_title_user, handicap_user ,DAY(date_birth_user) AS jour, MONTH(date_birth_user) AS mois, YEAR(date_birth_user) AS annee, FROM users WHERE id_users = :id_users");
 $req = $pdo->prepare("SELECT name_user,lastname_user,mail_user, address_user, phone_user, cv_title_user, handicap_user ,DAY(date_birth_user) AS jour, MONTH(date_birth_user) AS mois, YEAR(date_birth_user) AS annee FROM users WHERE id_users = :id_users");
    
  /* on a le tableau avec les données */
    $req->execute(array(':id_users' => $id_users,
                        
    ));
} 
catch (PDOException $e) {
    echo "Base de donnée non disponible";
}

while ($donnees = $req->fetch())
{
  // $datefr= date_format($donnees['date_birth_user'],"Y/m/d");
    echo   stripslashes($donnees['name_user'])   .'<br>' 
        .stripslashes($donnees['lastname_user']) .'<br>'
        .stripslashes($donnees['mail_user']) .'<br>'
        .stripslashes($donnees['jour']) .'/' .stripslashes($donnees['mois']) .'/' .stripslashes($donnees['annee']) .'<br>'
        .stripslashes($donnees['address_user']) .'<br>'
        .stripslashes($donnees['phone_user']) .'<br>'
        .stripslashes($donnees['cv_title_user']) .'<br>'
        .stripslashes($donnees['handicap_user']) .'<br>' ;
}
$req->closeCursor();
include '../models/connexion_BDD_mdl.php';
try {
    //  $req = $pdo->prepare("SELECT name_user,lastname_user, address_user, phone_user, cv_title_user, handicap_user ,DAY(date_birth_user) AS jour, MONTH(date_birth_user) AS mois, YEAR(date_birth_user) AS annee, FROM users WHERE id_users = :id_users");
   $req = $pdo->prepare("SELECT id_exp, firm_name_exp, location_exp, job_exp, mission_exp, type_contract_exp ,DAY(start_date_exp) AS sjour, MONTH(start_date_exp) AS smois, YEAR(start_date_exp) AS sannee,DAY(end_date_exp) AS ejour, MONTH(end_date_exp) AS emois, YEAR(end_date_exp) AS eannee FROM exp_pro WHERE users_id_users = :id_users");
      
    /* on a le tableau avec les données */
      $req->execute(array(':id_users' => $id_users,
                          
      ));
  } 
  catch (PDOException $e) {
      echo "Base de donnée non disponible";
  }


  while ($donnees = $req->fetch()){
 
  $id_exp =$donnees['id_exp'];
  echo  '<form method="post" action="../models/delete_mdl.php">' ;
  //<!-- input caché pour avoir le name button cliqué -->
 // echo "<input type='hidden' name='bouton' value='$data_menu['nom']'/>";
// echo "<input type='hidden' name='nomlien' value='" .$data_menu['nom']."' />";
  echo "<button type='submit' name='bout' value='$id_exp' >supprimer</button>";
  echo '</form>' ; 
    // $datefr= date_format($donnees['date_birth_user'],"Y/m/d");
      echo  stripslashes($donnees['sjour']) .'/' .stripslashes($donnees['smois']) .'/' .stripslashes($donnees['sannee']) .'<br>' 
          .stripslashes($donnees['ejour']) .'/' .stripslashes($donnees['emois']) .'/' .stripslashes($donnees['eannee']) .'<br>'
          .stripslashes($donnees['firm_name_exp'])   .'<br>' 
          .stripslashes($donnees['location_exp']) .'<br>'
          .stripslashes($donnees['job_exp']) .'<br>' 
          .stripslashes($donnees['mission_exp']) .'<br>'
          .stripslashes($donnees['type_contract_exp']) .'<br>';
  }
  $req->closeCursor();
