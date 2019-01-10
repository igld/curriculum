<?php
//$id_act = $_SESSION['id_act'];
// update des activities dans la  BDD
    try {
        $update = $pdo->prepare("UPDATE activities SET 
            title_act=:title_act, 
            desc_act=:desc_act
            WHERE id_act = $id_act");
            /* on utilise bindParam() pour passer une variable qui correspondra au :nom  voulu. */
            $update->bindParam(":title_act",$title_act);
            $update->bindParam(":desc_act",$desc_act);
            $update->execute();

    } 
    catch (PDOException $e) {
        echo "Base de donnée non disponible";
    }


   



/* Ici on utilise bindParam() pour passer une variable qui correspondra
 au nom de l'utilisateur voulu. En provenance d'un $_GET ou d'un $_POST par exemple */