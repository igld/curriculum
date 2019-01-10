<?php
//$mid_exp = $_SESSION['mid_exp'];
//echo $mid_exp;
// update des Formations dans la  BDD
    try {
        $update = $pdo->prepare("UPDATE exp_pro SET 
            start_date_exp=:start_date_exp, 
            end_date_exp=:end_date_exp,
            firm_name_exp=:firm_name_exp, 
            location_exp=:location_exp, 
            job_exp=:job_exp, 
            mission_exp=:mission_exp, 
            type_contract_exp=:type_contract_exp 
            WHERE id_exp = $mid_exp");
            /* on utilise bindParam() pour passer une variable qui correspondra au :nom  voulu. */
            $update->bindParam(":start_date_exp",$start_date_exp);
            $update->bindParam(":end_date_exp",$end_date_exp);
            $update->bindParam(":firm_name_exp",$firm_name_exp);
            $update->bindParam(":location_exp",$location_exp);
            $update->bindParam(":job_exp",$job_exp);
            $update->bindParam(":mission_exp",$mission_exp);
            $update->bindParam(":type_contract_exp",$type_contract_exp);
            $update->execute();

    } 
    catch (PDOException $e) {
        echo "Base de donnée non disponible";
    }


   



/* Ici on utilise bindParam() pour passer une variable qui correspondra
 au nom de l'utilisateur voulu. En provenance d'un $_GET ou d'un $_POST par exemple */