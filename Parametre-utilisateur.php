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

    if(isset($_POST['nvnom']) AND !empty($_POST['nvnom']))
    {
        $nvnom = htmlspecialchars($_POST['nvnom']);
        $insertnom = $bdd->prepare("UPDATE membres SET nom = ? WHERE id = ?");
        $insertnom->execute(array($nvnom, $_SESSION['id']));
        header('Location: Parametre-utilisateur.php?id='.$SESSION['id']);
    }

    if(isset($_POST['nvprenom']) AND !empty($_POST['nvprenom']))
    {
        $nvprenom = htmlspecialchars($_POST['nvprenom']);
        $insertprenom = $bdd->prepare("UPDATE membres SET prenom = ? WHERE id = ?");
        $insertprenom->execute(array($nvprenom, $_SESSION['id']));
        header('Location: Parametre-utilisateur.php?id='.$SESSION['id']);
    }

    if(isset($_POST['nvusername']) AND !empty($_POST['nvusername']))
    {
        $nvusername= htmlspecialchars($_POST['nvusername']);
        $insertusername = $bdd->prepare("UPDATE membres SET username = ? WHERE id = ?");
        $insertusername->execute(array($nvusername, $_SESSION['id']));
        header('Location: Parametre-utilisateur.php?id='.$SESSION['id']);
    }

    if(isset($_POST['nvpassword']) AND !empty($_POST['nvpassword']))
    {
        $nvpassword = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $insertpassword = $bdd->prepare("UPDATE membres SET password = ? WHERE id = ?");
        $insertpassword->execute(array($nvpassword, $_SESSION['id']));
        header('Location: Parametre-utilisateur.php?id='.$SESSION['id']);
    }

    if(isset($_POST['nvquestion']) AND !empty($_POST['nvquestion']))
    {
        $nvquestion = htmlspecialchars($_POST['nvquestion']);
        $insertquestion = $bdd->prepare("UPDATE membres SET question = ? WHERE id = ?");
        $insertquestion->execute(array($nvquestion, $_SESSION['id']));
        header('Location: Parametre-utilisateur.php?id='.$SESSION['id']);
    }

    if(isset($_POST['nvreponse']) AND !empty($_POST['nvreponse']))
    {
        $nvreponse= htmlspecialchars($_POST['nvreponse']);
        $insertreponse = $bdd->prepare("UPDATE membres SET reponse = ? WHERE id = ?");
        $insertreponse->execute(array($nvreponse, $_SESSION['id']));
        header('Location: Parametre-utilisateur.php?id='.$SESSION['id']);
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="css/style.css" />
        <title>Edition du profil</title>
    </head>

    <body class="full-height">
        <header>
            <div>
                <img src="img/logoGBAF.jpg" alt="GBAF">
            </div>
        </header>
        <div class="Connexion-inscription">
            <h1>Editer votre profil</h1>
            <form method="POST">
                <table>
                    <tr>
                        <td align="right">
                            <label for="nom">Nom</label>
                        </td>
                        <td>
                            <input type="text" id="nvnom" name="nvnom">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="prenom">Prénom</label>
                        </td>
                        <td>
                            <input type="text" id="nvprenom" name="nvprenom">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="Username">UserName</label>
                        </td>
                        <td>
                            <input type="text" id="nvusername" name="nvusername">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="password">Password</label>
                        </td>
                        <td>
                            <input type="text" id="nvpassword" name="nvpassword">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="question">Question secrête</label>
                        </td>
                        <td>
                            <input type="text" id="nvquestion" name="nvquestion">
                        </td>
                    </tr>
                    <tr>
                        <td align="right">
                            <label for="reponse">Réponse secrête</label>
                        </td>
                        <td>
                            <input type="text" id="nvreponse" name="nvreponse">
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="center">
                            <input type="submit" name="mettreajour" value="Mettre à jour le profil">
                        </td>
                    </tr>
                </table>
            </form>
            <br>
            <a href="Accueil.php" class="lien-inscription">Retourner sur le site</a>
        </div>
        <footer>
            <p>| Mentions légales | Contact |</p>
        </footer>
    </body>
</html>
<?php
}
else
{
    header("Location: GBAF Connexion.php");
}
?>