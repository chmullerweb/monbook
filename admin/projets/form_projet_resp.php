<?php

include "../../config.php";

verif_connexion();


if(!empty($_POST)) {
    //
    // si le formulaire de projet n'est pas vide et s'il n'a pas d'id (id_projet == 0), alors j'ajoute la saisie à ma bdd
    //

    if(empty($_POST["id_projet"]) || $_POST["id_projet"] == 0) {
        // je n'envoie pas d'ID donc je peux ajouter une nouvelle techno
        $query = $bdd -> prepare("INSERT INTO projets (titre, presentation, lien, annee, ordre, visible)
                                 VALUES (:titre, :presentation, :lien, :annee, :ordre, :visible)");
                                                                 
        $query -> execute([
                    ":nom" => trim($_POST["titre"]),
                    ":presentation" => trim($_POST["presentation"]),
                    ":lien" => trim($_POST["lien"]),
                    ":annee" => trim($_POST["annee"]),
                    ":ordre" => trim($_POST["ordre"]),
                    ":visible" => trim($_POST["visible"]),
                    ]);

        $projetID = $bdd -> lastInsertId(); // lastInsertId retourne l'identifiant de la dernière ligne insérée en base de données. Ici, c'est l'ID de la techno que nous venons d'ajouter dans la base. SQL va lui assigner un id puisque l'incrémentation se fait automatique. J'encapsule cette valeur dans une variable $projetID pour pouvoir la traiter plus tard si besoin
            header ("location:list_projets.php?newprojet=$_POST[titre].$projetID");
            exit;

    } else {
        // un id connu de ma $bdd est envoyé, alors je modifie un enregistrement.
        $query = $bdd -> prepare("UPDATE projets SET titre=:titre, presentation=:presentation, lien=:lien, annee=:annee, ordre=:ordre, visible=:visible WHERE id_projet = :idprojet");
        
        $query -> execute([
            ":idprojet" => trim($_POST["id_projet"]),
            ":titre" => trim($_POST["titre"]),
            ":presentation" => trim($_POST["presentation"]),
            ":lien" => trim($_POST["lien"]),
            ":annee" => trim($_POST["annee"]),
            ":ordre" => trim($_POST["ordre"]),
            ":visible" => trim($_POST["visible"]),
        ]);

        $projetID = $_POST["id_projet"]; // lastInsertId Retourne l'identifiant de la dernière ligne insérée en base. ici, c'est l'ID de la techno à modifier dans la base.

        header ("location:list_projets.php?projetedit=$_POST[titre].$projetID");
    }
}




// Je vérifie le fichier photo d'img_main
        
        #Je vérifie que la variable $_FILE existe et que le fichier remis ne génère pas d'erreur
        if(!empty($_FILES["img_main"]) && $_FILES["img_main"]["error"] == 0){
            
        #Pour que la photo donnée par l'utilisateur s'ajoute à mon dossier template/img, je dois crée un chemin de destination 
            
            #Je commence en précisant le nom du dossier dans lequelle la photo doit se ranger, entré dans une variable $nom_dossier_destination
            $nom_dossier_destination = "template\site2020\img";
            
            #Je lui indique de se diriger vers le dossier cité plus haut lors de l'enregistrement (dossier qui est enregistré en dur sur mon disque dur)
            $chemin_dossier_destination = __DIR__ . "/../../" . $nom_dossier_destination;
            
            #Je paramètre le chemin pour accéder à ce fichier et je précise comment le nommer. 
                //Ici on prend par défaut, le nom de la photo
            /*$chemin_fichier_destination = $chemin_dossier_destination . "/" . $_FILES["photo_musee"]["name"];*/
                // Ici je nomme précisément ma photo pour pouvoir plus facilement l'appeler plus tard en HTML
            $chemin_fichier_destination = $chemin_dossier_destination .  "/" . "$_POST[titre]" . "1.jpg";
            
            
            #Le chemin étant crée, il faut que j'indique au serveur de bien envoyer l'image vers ce chemin de destination via la fonction move_uploaded_file($_FILES["valeur_attribut_name"]["tmp_name"], $chemin_fichier_destination). Ici la variable permet de renommer le fichier. On ne va pas enregistré le fichier sous "tmp_name" mais sous son "name".
            
            move_uploaded_file($_FILES["img_main"]["tmp_name"], $chemin_fichier_destination);
            
        }

// Je vérifie le fichier photo d'img1
        
        #Je vérifie que la variable $_FILE existe et que le fichier remis ne génère pas d'erreur
        if(!empty($_FILES["img1"]) && $_FILES["img1"]["error"] == 0){
            
            #Pour que la photo donnée par l'utilisateur s'ajoute à mon dossier template/img, je dois crée un chemin de destination 
                
                #Je commence en précisant le nom du dossier dans lequelle la photo doit se ranger, entré dans une variable $nom_dossier_destination
                $nom_dossier_destination = "template\site2020\img";
                
                #Je lui indique de se diriger vers le dossier cité plus haut lors de l'enregistrement (dossier qui est enregistré en dur sur mon disque dur)
                $chemin_dossier_destination = __DIR__ . "/../../" . $nom_dossier_destination;
                
                #Je paramètre le chemin pour accéder à ce fichier et je précise comment le nommer. 
                    //Ici on prend par défaut, le nom de la photo
                /*$chemin_fichier_destination = $chemin_dossier_destination . "/" . $_FILES["photo_musee"]["name"];*/
                    // Ici je nomme précisément ma photo pour pouvoir plus facilement l'appeler plus tard en HTML
                $chemin_fichier_destination = $chemin_dossier_destination .  "/" . "$_POST[titre]" . "2.jpg";
                
                
                #Le chemin étant crée, il faut que j'indique au serveur de bien envoyer l'image vers ce chemin de destination via la fonction move_uploaded_file($_FILES["valeur_attribut_name"]["tmp_name"], $chemin_fichier_destination). Ici la variable permet de renommer le fichier. On ne va pas enregistré le fichier sous "tmp_name" mais sous son "name".
                
                move_uploaded_file($_FILES["img1"]["tmp_name"], $chemin_fichier_destination);
                
            }

// Je vérifie le fichier photo d'img2
        
        #Je vérifie que la variable $_FILE existe et que le fichier remis ne génère pas d'erreur
        if(!empty($_FILES["img2"]) && $_FILES["img2"]["error"] == 0){
            
            #Pour que la photo donnée par l'utilisateur s'ajoute à mon dossier template/img, je dois crée un chemin de destination 
                
                #Je commence en précisant le nom du dossier dans lequelle la photo doit se ranger, entré dans une variable $nom_dossier_destination
                $nom_dossier_destination = "template\site2020\img";
                
                #Je lui indique de se diriger vers le dossier cité plus haut lors de l'enregistrement (dossier qui est enregistré en dur sur mon disque dur)
                $chemin_dossier_destination = __DIR__ . "/../../" . $nom_dossier_destination;
                
                #Je paramètre le chemin pour accéder à ce fichier et je précise comment le nommer. 
                    //Ici on prend par défaut, le nom de la photo
                /*$chemin_fichier_destination = $chemin_dossier_destination . "/" . $_FILES["photo_musee"]["name"];*/
                    // Ici je nomme précisément ma photo pour pouvoir plus facilement l'appeler plus tard en HTML
                $chemin_fichier_destination = $chemin_dossier_destination .  "/" . "$_POST[titre]" . "3.jpg";
                
                
                #Le chemin étant crée, il faut que j'indique au serveur de bien envoyer l'image vers ce chemin de destination via la fonction move_uploaded_file($_FILES["valeur_attribut_name"]["tmp_name"], $chemin_fichier_destination). Ici la variable permet de renommer le fichier. On ne va pas enregistré le fichier sous "tmp_name" mais sous son "name".
                
                move_uploaded_file($_FILES["img2"]["tmp_name"], $chemin_fichier_destination);
                
            }

        
        //var_dump($_FILES);
        //var_dump($chemin_fichier_destination);
        //var_dump($resultNbVal); 
    
        header("location:list_projets.php");

          