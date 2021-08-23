<?php
session_start();

try
{
    $bdd = new PDO("mysql:host=localhost;dbname=espace_membres", 'root', 'root');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
        die("Erreur : ".$e->getMessage());
}
if (!isset($_SESSION['nom']) && !isset($_SESSION['prenom']) && !isset($_SESSION['id_user'])) 
{

    header('Location: GBAF Connexion.php');
    exit();
}
    if(isset($_GET['id']) AND NULL !=$_GET['id'])
    {
        $id_acteur = htmlspecialchars($_GET['id']);

        $req_acteur = $bdd->prepare("SELECT * FROM acteurs WHERE id = ?");
        $req_acteur->execute(array($_GET['id']));
        $resultat = $req_acteur->fetch(PDO::FETCH_ASSOC);
        $req_acteur->closeCursor();
    }
    else
    {
        header('Location: Accueil.php');
    }
        if(isset($_POST['submit_comm']) AND !empty($_POST['commentaire']))
        {
            
            $req_comm = $bdd->prepare('SELECT * FROM commentaires WHERE id_membre = ? AND id_acteur = ?');
            $req_comm->execute(array($_SESSION['id'], $id_acteur));
            $userComm = $req_comm->fetch();
            $req_comm->closeCursor();

            if (!$userComm)
            {
                $req_insert = $bdd->prepare('INSERT into commentaires (id_membre, id_acteur, date_commentaire, commentaire) VALUES (:id_membre, :id_acteur, NOW(), :commentaire)');
                $req_insert->execute(array('id_membre' => $_SESSION['id'],'id_acteur' => $resultat['id'], 'commentaire' => ($_POST['commentaire'])));
                $req_insert->closeCursor();
            }
            else
            {
                $erreur = 'Un seul commentaire par personne !';
            }
        }
   

?>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="css/style.css" />
        <title><?php echo $resultat['acteur'] ?> - GBAF</title>
    </head>

    <body class="full-height">
        <header>
            <div>
                <img src="img/logoGBAF.jpg" alt="logoGBAF">
            </div>
            <p>
            <?php echo $_SESSION['nom'].$_SESSION['prenom']; ?>
            <a href="Logout.php">Se déconnecter</a>
            <a href="Parametre-utilisateur.php">Paramètre utilisateur</a>
            </p>
        </header>
    <div class="photo_acteur">
        <img src="<?php echo $resultat['image_url'] ?>"  alt="Formation&co logo">
    </div>
    <div class="container">
        <div class="container_acteur">
            <?php echo $resultat['contenu'] ?>
        </div>
        <form method="POST">
            <h2>Commentaires</h2>
            <div class="commentaire">
                <textarea name="commentaire" placeholder="Votre commentaire..."></textarea><br />
                <input type="submit" value="Poster" name="submit_comm" />
            </div>
        </form>
        <?php
            if (isset($erreur)) 
            {
                echo $erreur;
            }
            ?>
    </div>
        <?php
            $req = $bdd->prepare('SELECT commentaires.id, commentaires.id_membre, membres.prenom, commentaires.commentaire, DATE_FORMAT(date_commentaire, \'%d/%m/%Y \') AS date_comment FROM commentaires INNER JOIN membres ON commentaires.id_membre = membres.id WHERE id_acteur = ? ORDER BY date_commentaire DESC');
            $req->execute(array($_GET['id']));
                
            while ($donnees = $req->fetch())
            {
               
            ?>
            
    <section class="section_commentaire">
        <div>
                            <div class="commentaires">
                    <div class="head_comment">
                        <div>
                            <p class="prenom"><?php echo $donnees['prenom']; ?></p>
                            <p class="date_commentaire">le <?php echo $donnees['date_comment']; ?></p>
                        </div>
                    </div>
                    <p class="comment"><?php echo $donnees['commentaire']; ?></p>
                </div>
        </div>
    </section>

                <?php
                }
                $req->closeCursor();
                ?>
    <footer>
        <p>| Mentions légales | Contact |</p>
    </footer>
</body>
</html>