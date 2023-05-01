<html>
<head>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include 'bd_access.php';
session_start();
echo "Bonjour " . $_SESSION['username'];
echo "<br />";
// On demande la liste des velo disponible a la location
$velodispo = $bdd->prepare('SELECT * FROM velo WHERE ID_velo NOT IN(SELECT ID_velo FROM location)');
$velodispo->execute();
?>
<table>
<tr>
<td colspan="2">Velo disponible a la location</td>
</tr>
<tr>
<td>
<?php
// Pour chaque ligne de resultat SQL on l'affiche sous forme d'un tableau
while ($row = $velodispo->fetch()) {
echo "<table>";
echo   "<tbody>";
echo     "<tr>";
echo       "<td style=\"text-align: center; background-color: #e8e8e8;\">&nbsp;<span style=\"color: #1e2a64;\"><strong>" . $row['Modele'] . "</strong></span>";
echo       "</td>";
echo     "</tr>";
echo     "<tr>";
echo       "<td style=\"text-align: center; background-color: #efedee;\">
                <div class=\"circle\"><strong>" . $row['Tarif'] . "</strong>  <sup>eur</sup><br>heure</div>";
echo       "</td>";
echo     "</tr>";
echo     "<tr>";
echo       "<td style=\"text-align: center; background-color: #f5f5f5;\"><img src=\"" . $row['Image'] . "\">";
echo       "</td>";
echo     "</tr>";
echo     "<tr>";
echo       "<td style=\"text-align: center; background-color: #f5f5f5;\"><form action=\"reservation.php\" method=\"post\"><button name=\"foo\" value=\"upvote\">Reserver</button></form>";
echo       "</td>";
echo     "</tr>";
echo   "</tbody>";
echo "</table>";
echo    "</td><td>";
}
?>
</tr>
</table>
</body>
</html>
