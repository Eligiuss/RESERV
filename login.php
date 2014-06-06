<?php 
    if( (isset($_POST['email'])) && (isset($_POST['mdp'])) ) {
        $login = $_POST['email'];
        $mdp = $_POST['mdp'];
    } else {
        exit;
    }
    
    include 'connexion_BDD.php';
    
    $SQL = "SELECT * FROM association WHERE login= '".$login."' ";
    $rs=$cnx->query($SQL);
    
    while($info=$rs->fetch_object()) {
        if(($info->login == $login) && ($info->password == $mdp)) {
            session_start();
            $_SESSION['login'] = $_POST['email'];
            $_SESSION['password'] = $_POST['mdp'];
            $_SESSION['ID'] = $info->id;
            $_SESSION['nom']= $info->nom;
            echo 'ok';
        } else {
            echo 'non';
            exit;
        }
    }
?>