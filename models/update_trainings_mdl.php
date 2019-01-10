<?php
//$id_train = $_SESSION['id_train'];
// update des Formations dans la  BDD
    try {
        $update = $pdo->prepare("UPDATE trainings SET 
            start_date_train=:start_date_train, 
            end_date_train=:end_date_train,
            school_train=:school_train, 
            location_train=:location_train, 
            title_train=:title_train, 
            dipl_name_train=:dipl_name_train, 
            dipl_validate_train=:dipl_validate_train 
            WHERE id_train = $id_train");
            /* on utilise bindParam() pour passer une variable qui correspondra au :nom  voulu. */
            $update->bindParam(":start_date_train",$start_date_train);
            $update->bindParam(":end_date_train",$end_date_train);
            $update->bindParam(":school_train",$school_train);
            $update->bindParam(":location_train",$location_train);
            $update->bindParam(":title_train",$title_train);
            $update->bindParam(":dipl_name_train",$dipl_name_train);
            $update->bindParam(":dipl_validate_train",$dipl_validate_train);
            $update->execute();

    } 
    catch (PDOException $e) {
        echo "Base de donnée non disponible";
    }


   



/* Ici on utilise bindParam() pour passer une variable qui correspondra
 au nom de l'utilisateur voulu. En provenance d'un $_GET ou d'un $_POST par exemple */