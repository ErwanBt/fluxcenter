<!-- Script de déconnexion -->

<?php

    unset($_SESSION['auth']);
	Flash::setFlash("Vous êtes déconnecté");
	header('Status: 301 Moved Permanently', false, 301); 
    header('Location : signin');
    exit();

?>