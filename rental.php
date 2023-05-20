<?php
session_start();
include 'bd_access.php';
?>

<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    include "menu.php";
    ?>
    <br />
    <?php
    // Définit le fuseau horaire par défaut à utiliser.
    date_default_timezone_set('Europe/Paris');
    // On demande la date/heure
    $date = date('Y-m-d H:i:s');
    // On demande la liste des velo disponible a la location ou la fin est superieur a la date/heure actuelle
    $velodispo = $bdd->prepare('SELECT * FROM velo WHERE ID_velo NOT IN(SELECT ID_velo FROM location WHERE Fin > :date)');
    $velodispo->execute (array(
        'date' => $date
    ));
    if ( isset($_GET['error']) && $_GET['error'] == true) {
        echo "<div class=\"error\">Erreur lors de la réservation</div>";
    }
    ?>
<div class="velo-list">
                <?php
                // Pour chaque ligne de resultat SQL on l'affiche sous forme d'un tableau
                while ($row = $velodispo->fetch()) {
                ?>
    <div class="velo-item">
        <div class="velo-model"><?php echo $row['Modele']; ?></div>
        <div class="velo-price"><strong><?php echo $row['Tarif']; ?></strong>  <sup>eur</sup><br>heure</div>
        <div class="velo-image"><img src="<?php echo $row['Image']; ?>"></div>
        <div class="velo-reservation">
            <form action="book.php" method="post">
                <input type="number" id="duree" name="duree" value="1" size="2" min="1" max="5"> heure(s)
                <button name="id_velo" value="<?php echo $row['ID_velo']; ?>">Reserve</button>
            </form>
        </div>
    </div>
                <?php
                }
                ?>
    </div>
</body>
</html>
