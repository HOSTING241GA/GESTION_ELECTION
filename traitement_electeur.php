<?php

    include_once("./config/env.php");
    include_once("./config/database.php");
    $db = new DatabaseConnector();
    $Connexion = $db->getConnection();

        if(isset($_POST['ajouter'])){

            $nom_electeur=htmlspecialchars($_POST['nom_electeur']);
            $prenom_electeur=htmlspecialchars($_POST['prenom_electeur']);
            $adresse_electeur=htmlspecialchars($_POST['adresse_electeur']);
            $date_naissance=htmlspecialchars($_POST['date_naissance']);
            $num_cni=htmlspecialchars($_POST['num_cni']);
            $mail_electeur=htmlspecialchars($_POST['mail_electeur']);
            $mdp_electeur=htmlspecialchars($_POST['mdp_electeur']);
            $mdp_electeurcrypted = password_hash($mdp_electeur, PASSWORD_DEFAULT);
            
            

            include_once("./config/env.php");
            include_once("./config/database.php");
            

            if($Connexion){
                
                $requette_verify = "SELECT mail_electeur FROM electeur WHERE mail_electeur = :mail_electeur ";
                $sql_verify = $Connexion->prepare($requette_verify);
                $sql_verify->bindParam('mail_electeur', $mail_electeur);
                $sql_verify->execute();


                if($sql_verify != $mail_electeur){
                    $requette = "INSERT INTO electeur (nom_electeur, prenom_electeur, adresse_electeur, date_naissance, num_cni, mail_electeur, mdp_electeur) VALUES (:nom_electeur,:prenom_electeur, :adresse_electeur, :date_naissance, :num_cni, :mail_electeur, :mdp_electeurcrypted)";

                    $sql = $Connexion->prepare($requette);
            
                    $sql->bindParam('nom_electeur', $nom_electeur);

                    $sql->bindParam('prenom_electeur', $prenom_electeur);

                    $sql->bindParam('adresse_electeur', $adresse_electeur);

                    $sql->bindParam('date_naissance', $date_naissance);

                    $sql->bindParam('num_cni', $num_cni);
    
                    $sql->bindParam('mail_electeur', $mail_electeur);
    
                    $sql->bindParam('mdp_electeurcrypted', $mdp_electeurcrypted);
    
                    $sql->execute();

                    
                    
                    $_SESSION['mail_electeur'] = $mail_electeur;
                    $_SESSION['mdp'] = $mdp_electeur;
                    $_SESSION['nom_electeur'] = $nom_electeur;
                    $_SESSION['$prenom_electeur']= $prenom_electeur;
        
                    echo"succes";

                }else if($sql_verify === $mail_electeur) {
                    echo"failed";
                    
                }

            
        }
        }
?>