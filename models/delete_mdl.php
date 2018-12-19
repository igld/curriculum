<?php
// sql to delete a record

echo $_POST['bout'];
$id_exp = $_POST['bout'];
try {
        //connection à la BDD
        include '../models/connexion_BDD_mdl.php';
        // use exec() because no results are returned
        $pdo->exec("DELETE FROM exp_pro WHERE id_exp=$id_exp"); 
        echo "Record deleted successfully";
    }
catch(PDOException $e)
    {
        echo $pdo . "<br>" . $e->getMessage();
    }
