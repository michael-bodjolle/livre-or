<?php

session_start();
if (isset($_POST['deconnexion'])) {
    session_destroy();
    header('location:connexion.php');
}
?>



<!-- si je suis connecté acceuil  inscription et connexion s'afiche -->
<?php
if (isset($_SESSION['login'])) {
    echo "<nav>
<a href='index.php'> accueil</a>
<a href='profil.php'>profil</a>
<a href='livre-or.php'> livre d'or</a>
<a href='commentaires.php'>Commentaires</a>
<form  action='profil.php' method='post'>
<div class='form-example'>
        <input  type='submit' name='deconnexion' value='Déconnexion'></input>
        </div>
        </form>
</nav>";
} else {
    echo "<nav><a href='index.php'> accueil</a> 
 <a href='inscription.php'>inscription</a>
 <a href='connexion.php'>connexion</a>
 </nav>";
}


?>