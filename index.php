<?php

$serveur="localhost";
$login="root";
$pass="";
try{
    $connexion= new PDO ("mysql:host=$serveur;dbname=webdevelopment",$login,$pass);//j'utilise les bloc try and catch pour la gestion des erreurs
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //exercice1
    /*$sup="DELETE FROM languages WHERE language = 'Javascript'";
    $requette=$connexion->prepare($sup);
    $requette->execute();*/

     //exercice2
   /*$modif="UPDATE framworks SET framwork='Angular' WHERE framwork='React' ";//mettre à jour l'age de la personne qui porte l'id 1 en utilisant le mot clé WHERE 
   $requette=$connexion->prepare($modif);
   $requette->execute();*/

    //exercice3

    $requette=$connexion->prepare("SELECT * FROM framworks WHERE version>16");
    $requette->execute();
    $resultat=$requette->fetchAll();//on va stocker le résultat dans une variable pour l'afficher facilement
  

    //exercice 4
    $requette1=$connexion->prepare("SELECT * FROM framworks WHERE id= 3 OR id=5");
    $requette1->execute();
    $resultat1=$requette1->fetchAll();

    //exercice 4
    $modif="UPDATE languages SET version=6.1 WHERE language='PHP' AND version=6 ";//mettre à jour l'age de la personne qui porte l'id 1 en utilisant le mot clé WHERE 
   $requette2=$connexion->prepare($modif);
   $requette2->execute();
    
    echo "connexion à la base de donnée webdevelopment est reussi<br>";
    echo "les lignes Javascript sont supp de la table languages<br>";
    echo "changement de framwork de React à Angular<br> ";
    echo "affichage de framwork avec version 16 et plus est reussi <br> ";
    echo "changement de version dePHP6 à reussi<br> ";
    echo "<h3 style='color:red;'>exercice 3</h3><br>";
    echo "<pre>";
    print_r($resultat);
    echo "</pre>";
    echo "<h3 style='color:red;'>exercice 4</h3><br>";
    echo "<pre>";
    print_r($resultat1);
    echo "</pre>";
}catch(PDOException $e){
    echo'echec : ' . $e->getMessage();

}

?>