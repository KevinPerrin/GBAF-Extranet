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
if (!isset($_SESSION['nom']) && !isset($_SESSION['prenom']) && !isset($_SESSION['id'])) 
{

    header('Location: GBAF Connexion.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link rel="stylesheet" href="css/style.css" />
        <title>Accueil - GBAF</title>
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
        <div class="container">
            <div class="accueil">
                <h1 class="titre">Qu'est ce que la GBAF ?</h1>
                <p>
                   Le Groupement Banque Assurance Français (GBAF) est une fédération
                   représentant les 6 grands groupes français :
                </p>
                <ul>
                    <li>BNP Paribas</li>
                    <li>BPCE</li>
                    <li>Crédit Agricole</li>
                    <li>Crédit Mutuel-CIC</li>
                    <li>Société Générale</li>
                    <li>La Banque Postale</li>
                </ul>
                <p>
                    Même s’il existe une forte concurrence entre ces entités, elles vont toutes travailler
                    de la même façon pour gérer près de 80 millions de comptes sur le territoire
                    national.
                    Le GBAF est le représentant de la profession bancaire et des assureurs sur tous
                    les axes de la réglementation financière française. Sa mission est de promouvoir
                    l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des
                    pouvoirs publics.
                </p>
                 <p>
                    Les produits et services bancaires sont nombreux et très variés. Afin de
                    renseigner au mieux les clients, les salariés des 340 agences des banques et
                    assurances en France (agents, chargés de clientèle, conseillers financiers, etc.)
                    recherchent sur Internet des informations portant sur des produits bancaires et
                    des financeurs, entre autres.
                    Aujourd’hui, il n’existe pas de base de données pour chercher ces informations de
                    manière fiable et rapide ou pour donner son avis sur les partenaires et acteurs du
                    secteur bancaire, tels que les associations ou les financeurs solidaires.
                    Pour remédier à cela, le GBAF souhaite proposer aux salariés des grands groupes
                    français un point d’entrée unique, répertoriant un grand nombre d’informations
                    sur les partenaires et acteurs du groupe ainsi que sur les produits et services
                    bancaires et financiers.
                    Chaque salarié pourra ainsi poster un commentaire et donner son avis.
                </p>
            </div>
            <div class="photo1">
                <img src="img/photo1.jpeg" alt="photo1">
            </div>
            <div>
                <h2 class="titre">Acteurs et partenaires</h2>
            </div>

            <div class="acteur">
                <div class="presentation_acteur">
                    <img class="logo_acteur" src="img/formation_co.png" alt="logo de l'acteur">
                    <div class="texte_acteur">
                        <h3 class="titre">Formation&co</h3>
                        <p>Formation&co est une association française présente sur tout le territoire.
                        Nous proposons (...)</p>
                    </div>
                </div>
                <a class="bouton" href="acteur.php?id=1">Lire la suite</a>
            </div>

            <div class="acteur">
                <div class="presentation_acteur">
                    <img class="logo_acteur" src="img/protectpeople.png" alt="logo de l'acteur">
                    <div class="texte_acteur">
                        <h3 class="titre">Protectpeople</h3>
                        <p>Protectpeople finance la solidarité nationale.
                        Nous appliquons (...)</p>
                    </div>
                </div>
                <a class="bouton" href="acteur.php?id=2">Lire la suite</a>
            </div>

            <div class="acteur">
                <div class="presentation_acteur">
                    <img class="logo_acteur" src="img/Dsa_france.png" alt="logo de l'acteur">
                    <div class="texte_acteur">
                        <h3 class="titre">DSA France</h3>
                        <p>DSA France accélère la croissance du territoire et s’engage avec les collectivités territoriales.
                        Nous accompagnons (...)
                        </p>
                    </div>
                </div>
                <a class="bouton" href="acteur.php?id=3">Lire la suite</a>
            </div>

            <div class="acteur">
                <div class="presentation_acteur">
                    <img class="logo_acteur" src="img/CDE.png" alt="logo de l'acteur">
                    <div class="texte_acteur">
                        <h3 class="titre">CDE</h3>
                        <p>La CDE (Chambre Des Entrepreneurs) accompagne les entreprises dans leurs démarches de formation. (...)</p>
                    </div>
                </div>
                <a class="bouton" href="acteur.php?id=4">Lire la suite</a>
            </div>
        </div>
        <footer>
            <p>| Mentions légales | Contact |</p>
        </footer>
    </body>
</html>