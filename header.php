<?php
    
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!--<link rel="stylesheet" href="css/datepicker.css"/>-->
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" href="css/style.css"/>
        <link rel="icon" type="image/png" href="cte.png" />
        <script src="js/jquery-1.10.2.js"></script>
        <script src="js/script.js"></script>
        <title><?php echo $titre; ?></title>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <span class="navbar-brand" id="title">RESERV - Réservation de salles</span>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <!-- Collect the nav links, forms, and other content for toggling -->
                <?php
                    if($titre !== 'Connexion') {
                        session_start();
                        echo '<span id="connecteEnTantQue" class="navbar-text">Connecté en temps que : ' . $_SESSION['nom'].'</span>';
                        echo '<input type="button" class="btn btn-danger" id="logout" value="Déconnexion" onclick="location.href=\'logout.php\'" />';
                    }
                ?>
             </ul>
        </nav>
<?php
    if ($titre == 'Connexion') {
        echo '&nbspVous n\'êtes pas connecté.'; 
    } else {
?>

    <div class="bande-gauche">
        <div class="menu-gauche" >
            <ul class="nav nav-pills nav-stacked">
                <li <?php if (($_SERVER['PHP_SELF'] == "/RESERV/listeSalles.php") || ($_SERVER['PHP_SELF'] == "/RESERV/louerSalle.php")) echo "class='active'"; ?>><a href="listeSalles.php">Louer une salle</a></li>
                <li <?php if ($_SERVER['PHP_SELF'] == "/RESERV/location.php") echo "class='active'"; ?>><a href="location.php">Mes locations</a></li>
            </ul>
        </div>
    </div>
<?php
}?>