<?php
    //session_start();
    //include_once("../../config/env.php");
    //include_once("../../config/database.php");
    $db = new DatabaseConnector();
    $Connexion = $db->getConnection();
    
     if($Connexion){

        //liste des electeurs
        $liste_electeur = 'SELECT * FROM electeur';
        $query_liste_electeur = $Connexion->prepare($liste_electeur);
        $query_liste_electeur->execute();
        $result_query_liste_electeur = $query_liste_electeur->fetchAll(PDO::FETCH_ASSOC);

        //nombre des electeurs
        $nombre_electeur = 'SELECT COUNT(*) FROM electeur';
        $query_nombre_electeur = $Connexion->prepare($nombre_electeur);
        $query_nombre_electeur->execute();
        $result_query_nombre_electeur = $query_nombre_electeur->fetchAll(PDO::FETCH_ASSOC);

        $_SESSION['nombre_electeur'] = $result_query_nombre_electeur;



        //modifier un electeur
        



     }
?>