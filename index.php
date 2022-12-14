<!DOCTYPE html>
<?php
    session_start();
    $panier = '<li><a href="Recap.php"><i class="fa-solid fa-basket-shopping"></i> Voir le panier</a></li>';
    $course = '<li class="active"><a href="index.php"><i class="fa-solid fa-store"></i> Courses</a></li>';

?>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styl.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Ajout produit</title>
    </head>
    <body>

        <header>
            <?php
            require('header.php');
            ?>
        </header>

        <h1>Ajouter un produit</h1>
        <form action="traitement.php?action=modifier" method="post">
            <p>
                <label">
                Nom du produit :<br>
                <input type="text" name="name">
                </label>
            </p>
            <p>
                <label>
                    Prix du produit :<br>
                    <input type="number" step="any" name="price" min="0">
                </label>
            </p>
            <p>
                <label>
                    Quantité désirée :<br>
                    <input type="number" name="qtt" value="1" min="0">
                </label>
            </p>
            <p>
                <input class="button" type="submit" name="submit" value="Ajouter le produit"></input>

            </p>
         </form>
         <?php
            if(isset($_SESSION['message_product'])){
                echo $_SESSION['message_product'];
                unset($_SESSION['message_product']);
                
                
            }
            if(isset($_SESSION['message_string'])){
                echo $_SESSION['message_string'];
                unset($_SESSION['message_string']);
                
                
            }
        ?>
    </body>

    <footer>
        <?php
            require('footer.php');
        ?>
    </footer>

</html>
<?php 
/* LISTE DE TÂCHES
(1) Permettre à l'utilisateur d'aller sur la page recap.php [VALID]
    ou index.php à tout moment dans un menu [VALID]
(2) Afficher le nombre de produits présents en session à tout moment, [VALID]
    quelle que soit la page [VALID]
(3) Faire en sorte que le fichier traitement.php crée un message d'erreur [VALID]
    ou succès lorqu'il retourne au formulaire et permettre à l'index.php de l'afficher [VALID]
(4) Ajouter 3 fonctionnalités utiles dans recap.php : [VALID]
    - Supprimer un produit en session (selon le choix de l'utilisateur) [VALID]
    - Supprimer tout les produits en session en une seule fois [VALID]
    - Modifier les quantités de chaque produit grâce à deux points "+" et "-" [VALID]
      positionnés de part et d'autre du nombre dans la cellule
(5) S'amuser avec le design =] [VALID]
(6) Ajouter un "Min" pour ne pas être en négatif [VALID]
(7) multiplier depuis l'recap le price * total et l'ajouter dans l'traitement pour remplacer [Plus tard]
    les lignes 63 - 64 pour incrémenter ainsi que les lignes 73-74 pour décrémenter 
*/
?>