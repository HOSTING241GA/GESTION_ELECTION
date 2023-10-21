<?php
include_once("../config/env.php");
include_once("../config/database.php");
$db = new DatabaseConnector();
$Connexion = $db->getConnection();

    if(isset($_POST['enregistrer_electeur'])){

        $nom_electeur=htmlspecialchars($_POST['nom_electeur']);
        $mail_electeur=htmlspecialchars($_POST['mail_electeur']);
        $mdp_electeur=htmlspecialchars($_POST['mdp_electeur']);
        $mdp_electeurcrypted = password_hash($mdp_electeur, PASSWORD_DEFAULT);
        
        include_once("../config/env.php");
        include_once("../config/database.php");
        

        if($Connexion){
            
            $requette_verify = "SELECT mail_electeur FROM electeur WHERE mail_electeur = :mail_electeur ";
            $sql_verify = $Connexion->prepare($requette_verify);
            $sql_verify->bindParam('mail_electeur', $mail_electeur);
            $sql_verify->execute();


            if($sql_verify != $mail_electeur){
                $requette = "INSERT INTO electeur (nom_electeur, mail_electeur, mdp_electeur) VALUES (:nom_electeur, :mail_electeur, :mdp_electeurcrypted)";

                $sql = $Connexion->prepare($requette);
           
                $sql->bindParam('nom_electeur', $nom_electeur);
   
                $sql->bindParam('mail_electeur', $mail_electeur);
   
                $sql->bindParam('mdp_electeurcrypted', $mdp_electeurcrypted);
   
                $sql->execute();

                
                session_start();
                $_SESSION['mail_electeur'] = $mail_electeur;
                $_SESSION['mdp'] = $mdp_electeur;
                $_SESSION['nom_electeur'] = $nom_electeur;
    
                header('Location:../dashboard.php');

            }else if($sql_verify === $mail_electeur) {
                header('Location:../register_default.php');
                
            }  
     }
    }


    if(isset($_POST['enregistrer_administrateur'])){

        $mail_administrateur=htmlspecialchars($_POST['mail_administrateur']);
        $mdp_administrateur=htmlspecialchars($_POST['mdp_administrateur']);
        $mdp_administrateurcrypted = password_hash($mdp_administrateur, PASSWORD_DEFAULT);
        
        include_once("../config/env.php");
        include_once("../config/database.php");
        

        if($Connexion){
            
            $requette_verify = "SELECT mail_administrateur FROM administrateur WHERE mail_administrateur = :mail_administrateur ";
            $sql_verify = $Connexion->prepare($requette_verify);
            $sql_verify->bindParam('mail_administrateur', $mail_administrateur);
            $sql_verify->execute();


            if($sql_verify != $mail_administrateur){
                $requette = "INSERT INTO administrateur (mail_administrateur, mdp_administrateur) VALUES (:mail_administrateur, :mdp_administrateurcrypted)";

                $sql = $Connexion->prepare($requette);
   
                $sql->bindParam('mail_administrateur', $mail_administrateur);
   
                $sql->bindParam('mdp_administrateurcrypted', $mdp_administrateurcrypted);
   
                $sql->execute();

                
                session_start();
                $_SESSION['mail_administrateur'] = $mail_administrateur;
                $_SESSION['mdp_administrateur'] = $mdp_administrateur;
                
    
                header('Location:../dashboard_admin.php');

            }else if($sql_verify === $mail_electeur) {
                header('Location:../register_default.php');
                
            }  
     }
    }
?>