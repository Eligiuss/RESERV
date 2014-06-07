<?php
    $titre='Modifier un cours';
    include('header.php');
    include('connexion_BDD.php');
    
    if(!isset($_SESSION["ID"])){
        header('Location: index.php');
    }
    
    $SQL = "SELECT s.nom nomSalle, s.numero, s.capacite, s.tarif, s.id, DATE_FORMAT(l.debut, '%d %M %Y') AS jour, DATE_FORMAT(l.debut, '%H:%i') AS debutLoc, DATE_FORMAT(l.fin, '%H:%i') AS finLoc FROM salles s
            LEFT JOIN location l ON s.id = l.id_asso
            WHERE s.id = '".$_GET["id"]."'
            ORDER BY s.numero ASC";
    $rs=$cnx->query($SQL);
    
    while($info=$rs->fetch_object()) {
        $jour = $info->jour;
        $nomSalle = $info->nomSalle;
        $numero = $info->numero;
        $capacite = $info->capacite;
        $tarif = $info->tarif;
        $debut = $info->debutLoc;
        $fin = $info->finLoc;
    }
?>


<script>
    
    
    $(function() {
        $('#date').datepicker({beforeShowDay: $.datepicker.noWeekends});
    });
</script>

<div class="nouveau">
    <div class="milieuPage">
        <h2 class="text-center">Louer une salle</h2>
        <hr/>
        <table align="center" style="font-size:18px;">
            <tr>
                <td style="text-align:right;"><b>Nom de la salle :&nbsp</b></td>
                <td><?php echo $nomSalle; ?></td>
            </tr>
            <tr>
                <td style="text-align:right;"><b>Numéro :&nbsp</b></td>
                <td><?php echo $numero; ?></td>
            </tr>
            <tr>
                <td style="text-align:right;"><b>Capacité :&nbsp</b></td>
                <td><?php echo $capacite.' personnes'; ?></td>
            </tr>
            <tr>
                <td style="text-align:right;"><b>Tarif à l'heure :&nbsp</b></td>
                <td><?php echo $tarif.'€'; ?></td>
            </tr>
        </table>
        <br/>
        <div class="form-group milieuPage">
            <label for="date">Jour de la location</label>
            <input type="text" class="form-control" id="date"  placeholder="jj/mm/aaaa" value="<?php echo date('d/m/Y'); ?>">
        </div>
        <div class="center-block milieuPage">
            <div class="row">
                <div class="col-xs-4" style="float:left; width:50%;">
                  <select id="heureDebut" class="form-control">
                      <option value="0">Heure de début</option>
                      <option value="8">08h00</option>
                      <option value="9">09h00</option>
                      <option value="10">10h00</option>
                      <option value="11">11h00</option>
                      <option value="12">12h00</option>
                      <option value="13">13h00</option>
                      <option value="14">14h00</option>
                      <option value="15">15h00</option>
                      <option value="16">16h00</option>
                      <option value="17">17h00</option>
                      <option value="18">18h00</option>
                      <option value="19">19h00</option>
                  </select>
                </div>
                <div class="col-xs-4" style="float:right; width:50%;">
                  <select id="heureFin" class="form-control">
                      <option value="0">Heure de fin</option>
                      <option value="9">09h00</option>
                      <option value="10">10h00</option>
                      <option value="11">11h00</option>
                      <option value="12">12h00</option>
                      <option value="13">13h00</option>
                      <option value="14">14h00</option>
                      <option value="15">15h00</option>
                      <option value="16">16h00</option>
                      <option value="17">17h00</option>
                      <option value="18">18h00</option>
                      <option value="19">19h00</option>
                      <option value="20">20h00</option>
                  </select>
                </div>
            </div>
            <br/>
            <input type="text" class="form-control" readonly id="total"  placeholder="Total à payer..."><br/>
            <input type="button" class="btn btn-primary btn-lg center-block" value="Louer la salle">
        </div>
    </div>
</div>

</body>
</html> 
    

