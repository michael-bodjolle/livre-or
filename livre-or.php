<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="inscription.css">
    <title>Inscription</title>
</head>

<body>
    <header>
        <?php
        include('header.php');

        ?>



    </header>
    <main>
    <h1>HISTORIQUE DES COMMENTAIRES</h1> </br>;

            <?php
            $bdd = mysqli_connect('localhost', 'root', '', 'livreor') or die('erreur');
            $requete = "SELECT *, DATE_FORMAT(date,'%d/%m/%Y')  FROM `commentaires` INNER JOIN utilisateurs ON commentaires.id_utilisateur = utilisateurs.id ";
            $query = mysqli_query($bdd, $requete);
            $commentaires = mysqli_fetch_all($query);
            foreach ($commentaires as $commentaire) {
               
                echo "<table>
                <div class='tab'>
                <table>
                <tr>
                  <th>Date</th>
                  <th>Pseudo</th> 
                  <th>Commentaires</th>
                </tr>
                <tr>
                  <td>$commentaire[7]</td>
                  <td>$commentaire[5]</td>
                  <td>$commentaire[1]</td>
                </tr>
              
               
              </table>
               
            </table>
            <div>";
            
            }

       ?>
    </main>
    <footer>
   <button><a class= "comm" href="commentaires.php">Ajout de commentaires</a></button> 
    </footer>


</body>;:

</html>