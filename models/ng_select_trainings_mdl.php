<?php
session_start();
$id_users=$_SESSION['id_users'];
// Autorisation d'accés depuis une application stockée sur un serveur 
header("Access-Control-Allow-Origin: *");

//Réponse JSON attendue de la part du script
header("Content-type: application/json;");

//Paramètres SGBD MySQL (serveur local)
$server_mysql = "localhost";
$user_mysql = "root";
$keypass_mysql = "";
$db_mysql = "curriculum";
//echo($id_train)
//sélectionne la ligne a afficher dans la partie modification du CV 
if (isset($id_a_afficher_train) || $_SESSION['id_train']>0 ){
    $id_train = "AND id_train='$id_a_afficher_train'";
   // echo($idexp);
   $_SESSION['id_train'] = $id_train;
   //echo($id_train);
 }
 //pour sélectionner toutes les lignes correspond à l'utilisateur
else{
    $id_train = "";
    $id_train= $_SESSION['id_train'] ;
}

//ok aussi mais si a la racine de http fonctionne chez tout le monde manière de faire OK
$conn = new mysqli($server_mysql, $user_mysql, $keypass_mysql, $db_mysql);
// Change character set to utf8
mysqli_set_charset($conn,"utf8");
$result = $conn->query("SELECT id_train, start_date_train, end_date_train, school_train, location_train, title_train, dipl_name_train,dipl_validate_train, users_id_users FROM trainings WHERE users_id_users=$id_users  $id_train");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"id_train":"'.$rs["id_train"].'",';
    $outp .= '"start_date_train":"'.$rs["start_date_train"].'",';
    $outp .= '"end_date_train":"'.$rs["end_date_train"].'",';
    $outp .= '"school_train":"'.$rs["school_train"].'",';
    $outp .= '"location_train":"'.$rs["location_train"].'",';
    $outp .= '"title_train":"'.$rs["title_train"].'",'; 
    $outp .= '"dipl_name_train":"'.$rs["dipl_name_train"].'",';
    $outp .= '"dipl_validate_train":"'.$rs["dipl_validate_train"].'",'; $_SESSION['diplomeouinon']=$rs["dipl_validate_train"]; //récupération de l'info si diplome validé ou pas et mise en variable session
    $outp .= '"users_id_users":"'.$rs["users_id_users"].'"}';
}
$outp ='{"trainings":['.$outp.']}';
$conn->close();

//modification de la valeur diplôme validé 0 ou 1 pour changer l'affichage en texte plus compréhensible  
$outp = str_replace("\"dipl_validate_train\":\"1\"", "\"dipl_validate_train\":\"Diplôme validé\"",$outp);
$outp = str_replace("\"dipl_validate_train\":\"0\"", "\"dipl_validate_train\":\"Diplôme non validé\"",$outp);

echo($outp);


?>