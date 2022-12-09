<form class="login formulaire" action='index.php?ctrl=security&action=connexion' method='post'>
    <p>Connexion</p>
    <input class="champPseudo" type="text" name="pseudonyme" placeholder="Saisir votre pseudonyme">
    <input class="champMdp" type="password" name="motDePasse" placeholder="Saisir votre mot de passe">
    <input class="btnConnexion" type="submit" name="validerConnexion" value="Connexion">
    <a href="index.php?ctrl=security&action=pageInscription">Pas encore inscrit ?</a>
</form>