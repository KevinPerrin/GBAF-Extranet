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
if (isset($_POST['submit']))
{    
    $username = htmlspecialchars($_POST['username']);

    if (!empty($_POST['username']))
    {
        $req = $bdd->prepare('SELECT * FROM membres WHERE username = :username');
        $req->execute(array('username' => $username));
        $resultat = $req->fetch();

        if (!$resultat) 
        { 
            $erreur = "Mauvais UserName !";
        }
        else 
        { 
            $isAnswerCorrect = (($_POST['username'] == $resultat['username']));
            if ($isAnswerCorrect) 
            {
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['username'] = $resultat['username'];
            $_SESSION['nom']= $resultat['nom'];
            $_SESSION['prenom']= $resultat['prenom'];
            header('Location: GBAF Change mot de passe.php');
            }
        }
    }
    else
    {
        $erreur = "Veuillez écrire votre Username !";
    }       
}
?>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="css/style.css" />
        <title>GBAF Mot de passe</title>
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
                    <label for="username">UserName : </label>
                    <input type="text" id="username" name="username">
                    <input class="submit" type="submit" name="submit" value="Envoyer"/>
                </p>
            </form>
            <?php
            if (isset($erreur)) 
            {
                echo $erreur;
            }
            ?>
            <br>
            <a href="Accueil.php" class="lien-inscription">Retourner sur le site</a>
            <a href="Parametre-utilisateur.php" class="lien-inscription">Editer le profil</a>
        </div>
        <footer>
            <p>| Mentions légales | Contact |</p>
        </footer>
    </body>
</html>