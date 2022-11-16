<?php
    session_start();
    $panier = '<li class="active"><a href="Recap.php"><i class="fa-solid fa-basket-shopping"></i> Voir le panier</a></li>';
    $course = '<li><a href="index.php"><i class="fa-solid fa-store"></i> Courses</a></li>';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="Styl.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Récapitulatif des produits</title>
    </head>
    <body>
        <header>
            <?php
                require('Header.php');
            ?>
        </header>
    <?php
        if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
            echo "<p>Aucun produit en session...</p>";
        }else{
            
            echo "<table>",
            "<thead>",
                "<tr>",
                // J'ajoute le nombre de produits dans un autre thead
                "</tr>",
            "</thead>",
                    "<thead>",
                        "<tr>",
                            "<th>Numéro</th>",
                            "<th>Nom</th>",
                            "<th>Prix</th>",
                            "<th>Quantité</th>",
                            "<th>Total</th>",
                            "<th>Modification</th>",
                        "</tr>",
                        
                    "</thead>",
                    "<tbody>";
            // avant la boucle on initialise une variable à 0 
            $totalGeneral = 0;
            foreach($_SESSION['products'] as $index => $product) {
                
                // .number_format() = permet de modifier l'affichage d'une valeur numérique en précisant plusieurs params
                // HTML et &nbsp = est un espace insécable
                echo "<tr>",
                        "<td>".$index."</td>",
                        "<td>".$product['name']."</td>",
                        "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                        "<td><a style='text-decoration: none;' href='Traitement.php?action=decrementer&id=$index'><span class='moins'>-</span></a>"
                        .$product['qtt']."<a style='text-decoration: none;' href='Traitement.php?action=incrementer&id=$index'><span class='plus'>+</span></a></td>",
                        "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                        // Je lui donne le chemin de l'action, ainsi que l'id "#" de son tableau products ($index)
                        "<td><a href='Traitement.php?action=supprimer&id=$index'>Supprimer</a></td>",
                    "</tr>";
 
                // += on ajoute le total du produit parcouru à la valeur $totalGeneral, qui augmente d'autant pour chaque produit
                // $totalGeneral = $totalGeneral + $produit['total']
                $totalGeneral+= $product['total'];
            }
            echo 
                "<tr>",
                // colspan= 4 = Une cellule fusionnée de 4 cellules
                    "<td colspan=4>Total général : </td>",
                    "<td><strong>".number_format($totalGeneral, 2, ",", "nbsp;")."&nbsp;€</strong></td>",
                    "<td><a href='Traitement.php?action=cleanAll'>Vider le panier</a></td>",
                "</tr>",
            "</tbody>",
        "</table>";
        }
    ?>
    </body>
        <footer>
            <?php
                require('Footer.php');
            ?>
        </footer>
</html>