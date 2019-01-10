<?php
if (isset($_SESSION['mail']) AND isset($_SESSION['mdp']))
    {
        echo 'Bonjour ' . $_SESSION['mail'];
        if($_SESSION['cv_exist']==1){
            //cache le boutton créer et affiche modifier
            echo "cv  existe";
            $modification = 'visible';
            $create = 'invisible';
            $make_or_create = 'modification.php';
        }
        else{
            //cache le boutton modifier et on affiche créer
            echo ". Bienvenue! Vous n'avez pas encore de cv";
            $create = 'visible';
            $modification = 'invisible';
            $make_or_create = 'add_modify_delete_data.php';
        } 
    }
    else {
        header('Refresh: 2;url=../index.php');
    }