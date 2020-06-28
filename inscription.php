<?php

//envoyer le formulaire 
if(isset($_POST['submit']))
{   //variables+
    $username=htmlspecialchars(trim($_POST['login']));
    $password=htmlspecialchars(trim($_POST['password']));
    $repeatpassword=htmlspecialchars(trim($_POST['repeatpassword']));
    //verifier si les champs sont pas vide
    if(!empty($username) && !empty($password) && !empty($repeatpassword))
    {
        if ($password == $repeatpassword )
        {
            $bdd = mysqli_connect('localhost','root', '', 'livreor') or die ('erreur');
            $user_insert = "INSERT INTO utilisateurs(login, password) VALUES('$username', '$password');";
            $query = mysqli_query($bdd, $user_insert);
            die ("inscription terminé. <a href= 'connexion.php'> connectez vous </a>.");

        }else echo "mots de passe erroné";
       
        
    }else echo"veuillez saisir tout les champs";
}
?>
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
        include ('header.php');
    
        ?>


    </header>
    <h1>INSCRIPTION</h1>
    <div class="container">
        <form action="#" method="post">

            <label for="username">login :</label>
            <input type="text" id="name" name="login">


            <label for="pasword">password:</label>
            <input type="password" id="password" name="password">

            <label for="repeatpasword">confirm the password:</label>
            <input type="password" id="repeatpassword" name="repeatpassword">

            <div class="form-example">
                <input type="submit" name="submit" value="valider!">
            </div>
        </form>
    </div>
</body>

</html>