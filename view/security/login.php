<div><?php if(isset($_SESSION['message'])){ echo $_SESSION['message'];}?></div>

<form class="formulaire" action='index.php?ctrl=security&action=connexion' method='post'>
    <p>Connexion</p>
    <input class="champPseudo" type="text" name="pseudonyme" placeholder="Saisir votre pseudonyme">
    <input class="champMdp" type="password" name="motDePasse" placeholder="Saisir votre mot de passe">
    <input class="btnConnexion" type="submit" name="valider" value="Connexion">
    <a href="index.php?ctrl=security&action=inscription">Pas encore inscrit ?</a>
</form>