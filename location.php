<?php
$titre = 'Mes locations';
include 'header.php';
include 'connexion_BDD.php';

if (!isset($_SESSION["ID"])) {
    header('Location: index.php');
}
?>


<table class="table table-hover table-condensed tableListe table-bordered">
    <thead>    
        <tr class="warning">
            <th>Nom de la salle</th>
            <th>N°</th>
            <th>Capacité</th>
            <th>Tarif à l'heure</th>
            <th>Jour de location</th>
            <th>Heure de début</th>
            <th>Heure de fin</th>
        </tr>
    </thead>

<?php

    function truncate($value, $length) {
        if (strlen($value) > $length) {
            $value = substr($value, 0, $length);
            $n = 0;
            while (substr($value, -1) != chr(32)) {
                $n++;
                $value = substr($value, 0, $length - $n);
            }
            $value = $value . " ...";
        }
        return $value;
    }
    
    $SQL = "SELECT s.nom nomSalle, s.numero, s.capacite, s.tarif, s.id, DATE_FORMAT(l.debut, '%d %M %Y') AS jour, DATE_FORMAT(l.debut, '%H:%i') AS debutLoc, DATE_FORMAT(l.fin, '%H:%i') AS finLoc FROM location l
            INNER JOIN salles s ON s.id = l.id_asso
            WHERE l.id_asso = '".$_SESSION["ID"]."'
            ORDER BY s.numero ASC";

    $rs = $cnx->query($SQL);

    while ($info = $rs->fetch_object()) {

        echo '  <tr onclick="window.location=\'louerSalle.php?id=' . $info->id . '\'">
                        <td>
                            ' . $info->nomSalle . '
                        </td>
                        <td>
                            ' . $info->numero. '
                        </td>
                        <td>
                            ' . $info->capacite . '
                        </td>
                        <td>
                            ' . $info->tarif . '
                        </td>
                        <td>
                            ' . $info->jour . '
                        </td>
                        <td>
                            ' . $info->debutLoc . '
                        </td>
                        <td>
                            ' . $info->finLoc . '
                        </td>
                    </tr>';
    }

    echo '</table>';
?>
    
