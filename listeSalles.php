<?php
$titre = 'Liste des salles';
include 'header.php';

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
            <th>Louée par</th>
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

    include 'connexion_BDD.php';


    $SQL = "SELECT a.nom nomAsso, s.nom nomSalle, s.numero, s.capacite, s.tarif, s.id FROM salles s
            LEFT JOIN location l ON s.id = l.id_salle
            LEFT JOIN association a ON a.id = l.id_asso
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
                            ' . $info->nomAsso . '
                        </td>
                    </tr>';
    }

    echo '</table>';
?>

<h4 align='center'>Cliquez sur une salle pour la louer</h4>
    
