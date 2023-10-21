<?php
    session_start();
    include_once("../config/env.php");
    include_once("../config/database.php");
    $db = new DatabaseConnector();
    $Connexion = $db->getConnection();
    
    if(isset($_POST['connexion_electeur'])){


        $mail_electeur=htmlspecialchars($_POST['mail_electeur']);
        $mdp_electeur=htmlspecialchars_decode($_POST['mdp_electeur']);

        $verify = "SELECT * FROM electeur WHERE mail_electeur = :mail_electeur ";
        $reponse_verify = $Connexion->prepare($verify);
        $reponse_verify->bindParam(":mail_electeur",$mail_electeur);
        $reponse_verify->execute();
        $tab_reponse_verify = $reponse_verify->fetch();

        if ($tab_reponse_verify && password_verify($mdp_electeur,$tab_reponse_verify['mdp_electeur'])){

            $_SESSION['mail_electeur'] = $mail_electeur;
            $_SESSION['mdp'] = $mdp_electeur;
            $_SESSION['nom_electeur'] = $tab_reponse_verify['nom_electeur'];

            header('Location:../dashboard.php');
            
        }else{
            header('Location:../register_default.php');}

    }

    if(isset($_POST['connexion_admin'])){


        $mail_administrateur=htmlspecialchars($_POST['mail_administrateur']);
        $mdp_administrateur=htmlspecialchars_decode($_POST['mdp_administrateur']);

        $verify = "SELECT * FROM administrateur WHERE mail_administrateur = :mail_administrateur ";
        $reponse_verify = $Connexion->prepare($verify);
        $reponse_verify->bindParam(":mail_administrateur",$mail_administrateur);
        $reponse_verify->execute();
        $tab_reponse_verify = $reponse_verify->fetch();

        if ($tab_reponse_verify && password_verify($mdp_administrateur,$tab_reponse_verify['mdp_administrateur'])){

            $_SESSION['mail_administrateur'] = $mail_administrateur;
            $_SESSION['mdp_administrateur'] = $mdp_administrateur;
            $_SESSION['nom_administrateur'] = $tab_reponse_verify['nom_administrateur'];

            header('Location:../dashboard_admin.php');
            
        }else{
            header('Location:../register_default.php');}

    }

?>