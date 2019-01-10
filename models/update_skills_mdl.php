<?php
//$id_skill = $_SESSION['id_skill'];
// update des Compétences dans la  BDD
    try {
        $update = $pdo->prepare("UPDATE skills SET 
            title_skill=:title_skill, 
            desc_skill=:desc_skill
            WHERE id_skill = $id_skill");
            /* on utilise bindParam() pour passer une variable qui correspondra au :nom  voulu. */
            $update->bindParam(":title_skill",$title_skill);
            $update->bindParam(":desc_skill",$desc_skill);
            $update->execute();

    } 
    catch (PDOException $e) {
        echo "Base de donnée non disponible";
    }


   



/* Ici on utilise bindParam() pour passer une variable qui correspondra
 au nom de l'utilisateur voulu. En provenance d'un $_GET ou d'un $_POST par exemple */