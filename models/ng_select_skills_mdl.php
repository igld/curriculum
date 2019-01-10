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

if (isset($id_a_afficher_skill) || $_SESSION['id_skill']>0 ){
    $id_skill= "AND id_skill='$id_a_afficher_skill'";
    // echo($idexp);
    $_SESSION['id_skill'] = $id_skill;
    //echo($id_skill);
}
else
{
    $id_skill = "";
    $id_skill = $_SESSION['id_skill'];
}
//ok aussi mais si a la racine de http fonctionne chez tout le monde manière de faire OK
$conn = new mysqli($server_mysql, $user_mysql, $keypass_mysql, $db_mysql);
// Change character set to utf8
mysqli_set_charset($conn,"utf8");
$result = $conn->query("SELECT id_skill, title_skill, desc_skill, users_id_users FROM skills WHERE users_id_users=$id_users $id_skill");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"id_skill":"'.$rs["id_skill"].'",';
    $outp .= '"title_skill":"'.$rs["title_skill"].'",';
    $outp .= '"desc_skill":"'.$rs["desc_skill"].'",';
    $outp .= '"users_id_users":"'.$rs["users_id_users"].'"}';
}
$outp ='{"skills":['.$outp.']}';
$conn->close();
echo($outp);

?>