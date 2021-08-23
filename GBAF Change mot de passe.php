<?php
session_start();

try
{
    $bdd = new PDO("mysql:host=localhost;dbname=espace_membres", 'root', 'root');
}
catch(Exception $e)
{
        die("Erreur : ".$e->getMessage());
}
if (isset($_SESSION['id']))
{
    $requser = $bdd->prepare("SELECT * FROM membres WHERE id = ?");
    $requser->execute(array($_SESSION['id']));
    $user = $requser->fetch();
    
    if(isset($_POST['nvpassword']) AND !empty($_POST['nvpassword']))
    {
        $nvpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $insertpassword = $bdd->prepare("UPDATE membres SET password = ? WHERE id = ?");
        $insertpassword->execute(array($nvpassword, $_SESSION['id']));
        header('Location: GBAF Mot de passe.php?id='.$SESSION['id']);
    }
}
?>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="css/style.css" />
        <title>GBAF Change mot de passe</title>
    </head>

    <body class="full-height">
        <header>
            <div>
                <img src="img/logoGBAF.jpg" alt="GBAF">
            </div>
        </header>
        <div class="Connexion-inscription">
            <h1>Changer son mot de passe</h1>
            <form method="POST">
                <p>
                    <label for="nvpassword">Nouveau Password : </label>
                    <input type="password" id="nvpassword" name="nvpassword">
                    <input class="submit" type="submit" name="submit" value="Envoyer"/>
                </p>
            </form>
            <br>
            <a href="Accueil.php" class="lien-inscription">Retourner sur le site</a>
            <a href="Parametre-utilisateur.php" class="lien-inscription">Editer le profil</a>
        </div>
        <footer>
            <p>| Mentions légales | Contact |</p>
        </footer>
    </body>
</html>