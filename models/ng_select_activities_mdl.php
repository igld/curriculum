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

if (isset($id_a_afficher_act) || $_SESSION['id_act']>0 ){
    $id_act = "AND id_act='$id_a_afficher_act'";
    $_SESSION['id_act'] = $id_act;
}
else{
    $id_act = "";
    $id_act = $_SESSION['id_act'];
}
$conn = new mysqli($server_mysql, $user_mysql, $keypass_mysql, $db_mysql);
// Change character set to utf8
mysqli_set_charset($conn,"utf8");
$result = $conn->query("SELECT id_act, title_act, desc_act, users_id_users FROM activities WHERE users_id_users=$id_users $id_act");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"id_act":"'.$rs["id_act"].'",';
    $outp .= '"title_act":"'.$rs["title_act"].'",';
    $outp .= '"desc_act":"'.$rs["desc_act"].'",';
    $outp .= '"users_id_users":"'.$rs["users_id_users"].'"}';
}
$outp ='{"activities":['.$outp.']}';
$conn->close();
echo($outp);

?>