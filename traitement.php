<?php
session_start();

switch($_GET["action"]){
    case "modifier" :
        
        if(isset($_POST['submit'])){
            // filter input() en cas de succès, renvoie la valeur correspondant au champ traité 
            $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS); // Empêche les chaines de caractères spéciaux
            $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION); // Autorise seulement les nombres à virgule // Autorise l'utilisation de "," ou "."
            $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT); // Autorise seulement un nombre entier différent de 0 (considéré comme null)

            if($name && $price && $qtt){
    
                $product = [

                    "name" => $name,
                    "price" => $price,
                    "qtt" => $qtt,
                    "total" => $price*$qtt,
                ];
                
                $_SESSION['products'][] = $product;
            }
        }

        if(isset($_POST['submit']) && !empty($name) && preg_match("/^[a-zA-Z]*$/", $name)){
            header("Location:Redirection.php");
            break;
        }
        
        if(empty($name)){
            $_SESSION['message_product']="*Entrez un produit";
            header("Location:Index.php");
            break;
        }

        if(!preg_match("/^[a-zA-Z]*$/", $name)){
            $_SESSION['message_string']="*Pas de caractères spéciaux";
            header("Location:Index.php");
            break;
        }
        
        // Supprimer le produit
        case "supprimer":
            unset($_SESSION["products"][$_GET["id"]]); // Je cherche l'id du produit dans la session et le désactive par "unset"
            header("Location: Recap.php"); // L'empêche de rester sur Traitement.php?action=supprimer&id=0++
            break;

        // Supprimer les produits
        case "cleanAll":
            unset($_SESSION["products"]);
            header("Location:Recap.php");
            break;

        // Incrémenter un produit
        case "incrementer":
            if(isset($_SESSION["products"])){
                $_SESSION["products"][$_GET["id"]]["qtt"]++;
                $_SESSION["products"][$_GET["id"]]["total"]+= 
                $_SESSION["products"][$_GET["id"]]["price"];
                header("Location: Recap.php");
            }
            break;
        
        // Décrémenter un produit
        case "decrementer":
            if(isset($_SESSION["products"])){
                $_SESSION["products"][$_GET["id"]]["qtt"]--;
                $_SESSION["products"][$_GET["id"]]["total"] -= 
                $_SESSION["products"][$_GET["id"]]["price"];
                if($_SESSION["products"][$_GET["id"]]["qtt"] == 0){
                unset($_SESSION["products"][$_GET["id"]]);
                }
                header("Location: Recap.php");
            }
            break;   

            
}
?>