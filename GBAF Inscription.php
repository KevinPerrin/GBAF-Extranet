<?php

try
{
    $bdd = new PDO("mysql:host=localhost;dbname=espace_membres", 'root', 'root');
}
catch(Exception $e)
{
        die("Erreur : ".$e->getMessage());
}
if (isset($_POST['forminscription']))
{
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $username = htmlspecialchars($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $repeated_password = ($_POST['repeated_password']);
    $question = htmlspecialchars($_POST['question']);
    $reponse = htmlspecialchars($_POST['reponse']);

    if (!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['username']) AND !empty($_POST['password']) AND !empty($_POST['repeated_password']) AND !empty($_POST['question']) AND !empty($_POST['reponse']))
    {
        $nomlength = strlen($nom);
        $prenomlength = strlen($prenom);
        $usernamelength = strlen($username);
        $questionlength = strlen($question);
        $reponselength = strlen($reponse);
        if (($nomlength <= 255) AND ($prenomlength <= 255) AND ($usernamelength <= 255) AND ($questionlength <= 255) AND ($reponselength <= 255))
        {
            if ($_POST['password'] == $repeated_password)
            {
                $req=$bdd->prepare("INSERT INTO membres (nom, prenom, username, password, question, reponse) VALUES (?,?,?,?,?,?)");
                $req->execute(array($_POST['nom'],$_POST['prenom'],$_POST['username'],$password, $_POST['question'],$_POST['reponse']));
            }
            else
            {
                $erreur = "Votre password n'est pas identique !";
            }
        }
        else
        {
            $erreur = "Un des champs dépasse 255 caractères !";
        }
    }
    else
    {
        $erreur = "Veuillez remplir tous les champs !";
    }
}

?>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="css/style.css" />
        <title>GBAF Inscription</title>
    </head>

    <body class="full-height">
        <header>
            <div>
                <img src="img/logoGBAF.jpg" alt="GBAF">
            </div>
        </header>
        <div class="Connexion-inscription">
            <h1>Inscription</h1>
            <form method="POST">
                <table>
                    <tr>
                        <td align="right">
                            <label for="nom">Nom</label>
                        </td>
                        <td>
                            <input type="text" id="nom" name="nom" value="<?php if(isset($nom)) { echo $nom; } ?>">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="prenom">Prénom</label>
                        </td>
                        <td>
                            <input type="text" id="prenom" name="prenom" value="<?php if(isset($prenom)) { echo $prenom; } ?>">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="Username">UserName</label>
                        </td>
                        <td>
                            <input type="text" id="username" name="username" value="<?php if(isset($username)) { echo $username; } ?>">
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
                        <td align="right">
                            <label for="repeated_password">Répéter le mot de passe</label>
                        </td>
                        <td>
                            <input type="password" id="repeated_password" name="repeated_password">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="question">Question secrête</label>
                        </td>
                        <td>
                            <input type="text" id="question" name="question" value="<?php if(isset($question)) { echo $question; } ?>">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="reponse">Réponse secrête</label>
                        </td>
                        <td>
                            <input type="text" id="reponse" name="reponse" value="<?php if(isset($reponse)) { echo $reponse; } ?>">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="center">
                            <input type="submit" name="forminscription" value="Je m'inscris">
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
            <br>
            <p>Déjà inscrit ? <a href="GBAF Connexion.php" class="lien-inscription">Se connecter</a></p>
        </div>
        <footer>
            <p>| Mentions légales | Contact |</p>
        </footer>
    </body>
</html>