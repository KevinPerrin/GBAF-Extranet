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
if (isset($_POST['formconnexion']))
{
    $username = htmlspecialchars($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $repeated_password = ($_POST['password']);

    $requser = $bdd->prepare("SELECT * FROM membres WHERE username = ?");
    $requser->execute(array($username));
    $resultat = $requser->fetch();
    
    
    if (!$resultat)
    {
        $erreur = "Mauvais identifiant(s) !";
    }
    else
    {
        $isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);
        if ($isPasswordCorrect)
        {
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['nom'] = $resultat['nom'];
            $_SESSION['prenom'] = $resultat['prenom'];
            $_SESSION['username'] = $resultat['username'];
            header("Location: Accueil.php");
        }
        else
        {
            $erreur = "Mauvais identifiant(s) !";
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="css/style.css" />
        <title>GBAF Connexion</title>
    </head>

    <body class="full-height">
        <header>
            <div>
                <img src="img/logoGBAF.jpg" alt="GBAF">
            </div>
        </header>
        <div class="Connexion-inscription">
            <h1>Connexion</h1>
            <form method="POST">
                <table>
                    <tr>
                        <td align="right">
                            <label for="Username">UserName</label>
                        </td>
                        <td>
                            <input type="text" id="username" name="username">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="password">Password</label>
                        </td>
                        <td>
                            <input type="password" id="password" name="password">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="center">
                            <button type="submit" name="formconnexion">Se connecter</button>
                        </td>
                    </tr>
                </table>
            </form>
            <?php
            if (isset($erreur)) 
            {
                echo $erreur;
            }
            ?>
            <br><br>
            <a href="GBAF Inscription.php" class="lien-inscription">S'inscrire</a>
            <a href="GBAF Mot de passe.php" class="lien-inscription">Mot de passe oublié ?</a>
        </div>
        <footer>
            <p>| Mentions légales | Contact |</p>
        </footer>
    </body>
</html>