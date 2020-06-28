<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="inscription.css">
    <title>profil</title>
</head>

<body>
    <header>
        <?php include("header.php"); ?>
    </header>

    <main>
        <?php
        $ssLogin = $_SESSION['login'];
        //SI SESSION EN COURS 
        if (isset($ssLogin)) {

            //CONNEXION BDD
            $bdd = mysqli_connect('localhost', 'root', '', 'livreor') or die('erreur');
            //CREATION REQUETE recuperation des infos utilisateur
            $request = "SELECT * FROM utilisateurs WHERE login ='$ssLogin'";
            //EXECUTION REQUETE
            $query = mysqli_query($bdd, $request);
            //RECUPERATION RESULTAT
            $recup = mysqli_fetch_assoc($query);
            //SI FORM VALIDE, LOGIN ET PASSWORD RENTRE
        }
        if (isset($_POST['submit'])) {
            //DEFINITION DES VARIABLES LIEES AUX INPUT
            $username = htmlspecialchars(trim($_POST['login']));
            $password = htmlspecialchars(trim($_POST['password']));
            $newpassword = htmlspecialchars(trim($_POST['newpassword']));

            //SI LOGIN ET PASSWORD SONT VIDES
            if ($password && $newpassword) {
                if ($password == $newpassword) {
                    //REQUETE NOUVEAU MOT DE PASSE 
                    $newpass = mysqli_query($bdd, "UPDATE utilisateurs SET password ='$password'");
                    if ($newpass){
                        echo "Le mot de passe à été changé";
                    }
                    
                }
            } //ET SI PASSWORD = MDP CHECK

            if (empty($username)) {
                echo "login incorrect";
            } else {
                //REQUETE NOUVEAU LOGIN
                $newlogin = mysqli_query($bdd, "UPDATE utilisateurs SET login ='$username'");
            }
        }
        ?>

        <div class="container">
            <form action="" method="post">

                <label for="password">login:</label>
                <input type="login" id="login" name="login">

                <label for="pasword">nouveau mot de passe:</label>
                <input type="password" id="password" name="password">

                <label for="repeatnewpasword">confirmez votre nouveau mot de passe:</label>
                <input type="password" id="newpassword" name="newpassword">

                <div class="form-example">
                    <input type="submit" name="submit" value="valider!">
                </div>
            </form>
        </div>
    </main>
</body>

</html>