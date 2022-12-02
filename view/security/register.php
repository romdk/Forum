<form class="formulaire" action='index.php?ctrl=security&action=inscription' method='post'>
    <p>Inscription</p>
    <input class="champPseudo" type="text" name="pseudonyme" placeholder="Saisir un pseudonyme">
    <input class="champMail" type="email" name="mail" placeholder="Saisir une adresse email valide">
    <input class="champMdp" type="password" name="motDePasse" placeholder="Saisir un mot de passe">
    <input class="champMdp" type="password" name="motDePasseConfirm" placeholder="Confirmer mot de passe">
    <input class="btnInscription" type="submit" name="valider" value="S'inscrire">
    <a href="index.php?ctrl=security&action=pageConnexion">Déjà inscrit ?</a>
</form>