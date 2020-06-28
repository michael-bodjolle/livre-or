<?php

//envoyer le formulaire 
if(isset($_POST['submit']))
{   //variables
    $username=htmlspecialchars(trim($_POST['login']));
    $password=htmlspecialchars(trim($_POST['password']));
    if($username&&$password)
    {
        
             $bdd=mysqli_connect('localhost','root', '',"livreor");
             $log = mysqli_query($bdd, 'SELECT * FROM utilisateurs WHERE login ="'.$username.'" && password="'.$password.'"');
             $rows=mysqli_num_rows($log);
             if($rows==1){
                 session_start();
                 $_SESSION['login'] = $username;
                 header('location: profil.php');

             }else echo "nom d'utilisateur ou mot de passe incorrect";


    }else echo"veuillez saisir tout saisir les champs";


}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="inscription.css">
    <title>Connexion</title>
</head>

<body>
<header>
<?php 
        include("header.php");
        ?>
        


    </header>
<main>
    <h1>CONNEXION</h1>
    <div class="container">
        <form action="#" method="post">

            <label for="name">login :</label>
            <input type="text" id="login" name="login">


            <label for="pasword">password:</label>
            <input type="password" id="password" name="password">
            <div class="form-example">
                <input type="submit" name="submit" value="valider!">
            </div>
        </form>

</main>
</body>

</html>