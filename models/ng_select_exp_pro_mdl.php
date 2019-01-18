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

if (isset($id_a_afficher_exp) || $_SESSION['id_exp']>0 ){
   $id_exp = "AND id_exp='$id_a_afficher_exp'";
   // echo($idexp);
   $_SESSION['id_exp'] = $id_exp;
   // echo($id_exp);
}
else
{
    $id_exp = "";
    $id_exp= $_SESSION['id_exp'] ;
}
//ok aussi mais si a la racine de http fonctionne chez tout le monde manière de faire OK
$conn = new mysqli($server_mysql, $user_mysql, $keypass_mysql, $db_mysql);
// Change character set to utf8
mysqli_set_charset($conn,"utf8");
$result = $conn->query("SELECT id_exp, firm_name_exp, location_exp, job_exp, mission_exp, type_contract_exp, start_date_exp,end_date_exp, users_id_users FROM exp_pro WHERE users_id_users=$id_users $id_exp ");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"id_exp":"'.$rs["id_exp"].'",';
    $outp .= '"firm_name_exp":"'.$rs["firm_name_exp"].'",';
    $outp .= '"location_exp":"'.$rs["location_exp"].'",';
    $outp .= '"job_exp":"'.$rs["job_exp"].'",';
    $outp .= '"mission_exp":"'.$rs["mission_exp"].'",';
    $outp .= '"type_contract_exp":"'.$rs["type_contract_exp"].'",';
    $outp .= '"start_date_exp":"'.$rs["start_date_exp"].'",';
    $outp .= '"end_date_exp":"'.$rs["end_date_exp"].'",';
    $outp .= '"users_id_users":"'.$rs["users_id_users"].'"}';
}
$outp ='{"exp_pro":['.$outp.']}';
$conn->close();

echo($outp);

?>