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

//ok aussi mais si a la racine de http fonctionne chez tout le monde manière de faire OK
$conn = new mysqli($server_mysql, $user_mysql, $keypass_mysql, $db_mysql);
// Change character set to utf8
mysqli_set_charset($conn,"utf8");
$result = $conn->query("SELECT id_users,name_user,lastname_user,date_birth_user,address_user,phone_user, mail_user, cv_title_user, handicap_user FROM users WHERE id_users=$id_users");

$outp = "";
while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    if ($outp != "") {$outp .= ",";}
    $outp .= '{"id_users":"'.$rs["id_users"].'",';
    $outp .= '"name_user":"'.$rs["name_user"].'",';
    $outp .= '"lastname_user":"'.$rs["lastname_user"].'",';
    $outp .= '"date_birth_user":"'.$rs["date_birth_user"].'",';
    $outp .= '"address_user":"'.$rs["address_user"].'",';
    $outp .= '"phone_user":"'.$rs["phone_user"].'",';
    $outp .= '"mail_user":"'.$rs["mail_user"].'",';
    $outp .= '"cv_title_user":"'.$rs["cv_title_user"].'",';
    $outp .= '"handicap_user":"'.$rs["handicap_user"].'"}';
    
}
$outp ='{"users":['.$outp.']}';
$conn->close();

echo($outp);

?>