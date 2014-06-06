<?php
    $titre = 'Connexion';
    include 'header.php';
?>
<html>
   
    <body>
        <div class="center-block form-start" >
            <form class="form-horizontal" role="form">
                <h2 class="titre-start">Connexion</h2>
                </br>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-2 control-label">Login</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="inputEmail3" placeholder="Login">
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Mot de passe</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="inputPassword3" placeholder="Mot de passe">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="button" class="btn btn-primary" onclick="login()" value="Connexion">
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>
