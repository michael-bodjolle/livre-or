<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="inscription.css">
    <title>commentaire</title>
</head>

<body>
    <header>
        <?php
        include("header.php");
        ?>
        <?php
        //SI SESSION EN COURS 
        if (isset($_SESSION['login'])) {
            $ssLogin = $_SESSION['login'];
            $requete = "SELECT * FROM utilisateurs WHERE login = '".$ssLogin."'";
            $bdd = mysqli_connect('localhost', 'root', '', 'livreor') or die('erreur');
            $query = mysqli_query($bdd, $requete);
            $infoUser = mysqli_fetch_assoc($query);
            if (isset($_POST['submit'])) {

                if (isset($_POST['commentaires'])) {
                    $coment = $_POST['commentaires'];
                    $iduser = (int)$infoUser["id"];
                    $request = "INSERT INTO commentaires (`commentaire`, `id_utilisateur`, `date`) VALUES ('" . $coment . "','" . $iduser . "', CURTIME() )";
                    $query = mysqli_query($bdd, $request);
                    header('location: commentaires.php');
                }
                else echo "votre commentaire a été posté";   
            } 
        }


        ?>


    </header>
    <main>

        <h1>COMMENTAIRES</h1>
        <div class="container">
            <form action="#" method="post">
                <div>
                    <label for="msg">Message:</label>
                    <textarea name="commentaires"></textarea>

                    <div class="form-example">
                        <input type="submit" name="submit" value="valider">
                    </div>
            </form>
        </div>

    </main>
</body>

</html>