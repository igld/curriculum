<?php
//$id_rea = $_SESSION['id_rea'];
echo $id_rea;
// update des realisations dans la  BDD
    try {
        $update = $pdo->prepare("UPDATE realisations SET 
            start_date_rea=:start_date_rea, 
            end_date_rea=:end_date_rea,
            title_rea=:title_rea, 
            desc_rea=:desc_rea
            WHERE id_rea = $id_rea");
            /* on utilise bindParam() pour passer une variable qui correspondra au :nom  voulu. */
            $update->bindParam(":start_date_rea",$start_date_rea);
            $update->bindParam(":end_date_rea",$end_date_rea);
            $update->bindParam(":title_rea",$title_rea);
            $update->bindParam(":desc_rea",$desc_rea);
            $update->execute();

    } 
    catch (PDOException $e) {
        echo "Base de donnée non disponible";
    }


   



/* Ici on utilise bindParam() pour passer une variable qui correspondra
 au nom de l'utilisateur voulu. En provenance d'un $_GET ou d'un $_POST par exemple */