<?php
// sql to delete a record
//pour rendre génrérique le moyen d'effacer les lignes j'utilise des variables pour 
// $id correspond au nom de la clée primaire de la table 
// $tab; correspond a la table ou il faut supprimer
// $id_a_delete correspond a numéro de de la clée primaire a supprimer

try {
        //connection à la BDD
        include '../models/connexion_BDD_mdl.php';
        // use exec() because no results are returned
        $pdo->exec("DELETE FROM $tab WHERE $id=$id_a_delete"); 
        echo "Record deleted successfully";
    }
catch(PDOException $e)
    {
        echo $pdo . "<br>" . $e->getMessage();
    }
