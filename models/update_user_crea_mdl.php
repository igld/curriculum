<?php
$id_users = $_SESSION['id_users'];
$cv_exist=1;
// update des Formations dans la  BDD
    try {
        $update = $pdo->prepare("UPDATE users SET 
            name_user=:name_user, 
            lastname_user=:lastname_user,
            date_birth_user=:date_birth_user, 
            address_user=:address_user, 
            phone_user=:phone_user, 
            cv_title_user=:cv_title_user, 
            handicap_user=:handicap_user,
            cv_exist=:cv_exist 
            WHERE id_users = $id_users");
            /* on utilise bindParam() pour passer une variable qui correspondra au :nom  voulu. */
            $update->bindParam(":name_user",$name_user);
            $update->bindParam(":lastname_user",$lastname_user);
            $update->bindParam(":date_birth_user",$date_birth_user);
            $update->bindParam(":address_user",$address_user);
            $update->bindParam(":phone_user",$phone_user);
            $update->bindParam(":cv_title_user",$cv_title_user);
            $update->bindParam(":handicap_user",$handicap_user);
            $update->bindParam(":cv_exist",$cv_exist);
            $update->execute();

    } 
    catch (PDOException $e) {
        echo "Base de donnée non disponible";
    }


   



/* Ici on utilise bindParam() pour passer une variable qui correspondra
 au nom de l'utilisateur voulu. En provenance d'un $_GET ou d'un $_POST par exemple */