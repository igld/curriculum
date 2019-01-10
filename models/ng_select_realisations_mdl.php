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

if (isset($id_a_afficher_rea) || $_SESSION['id_rea']>0 ){
    $id_rea = "AND id_rea='$id_a_afficher_rea'";
    // echo($idexp);
    $_SESSION['id_rea'] = $id_rea;
    echo($id_rea);
 }
 else
 {
     $id_rea = "";
     $id_rea= $_SESSION['id_rea'] ;
 }

//ok aussi mais si a la racine de http fonctionne chez tout le monde manière de faire OK
$conn = new mysqli($server_mysql, $user_mysql, $keypass_mysql, $db_mysql);
// Change character set to utf8
mysqli_set_charset($conn,"utf8");
$result = $conn->query("SELECT id_rea, start_date_rea, end_date_rea, title_rea, desc_rea, users_id_users FROM realisations WHERE users_id_users=$id_users $id_rea");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"id_rea":"'.$rs["id_rea"].'",';
    $outp .= '"start_date_rea":"'.$rs["start_date_rea"].'",';
    $outp .= '"end_date_rea":"'.$rs["end_date_rea"].'",';
    $outp .= '"title_rea":"'.$rs["title_rea"].'",';
    $outp .= '"desc_rea":"'.$rs["desc_rea"].'",';
    $outp .= '"users_id_users":"'.$rs["users_id_users"].'"}';
}
$outp ='{"realisations":['.$outp.']}';
$conn->close();

echo($outp);

?>