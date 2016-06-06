<!DOCTYPE html>
<html lang="fr">
	<head>
		<link rel="stylesheet" type="text/css" href="<?php echo HtmlHelper::getCSS("style"); ?>" />
		<link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/4.1.1/normalize.css" />
		<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
		<meta charset="UTF-8" />
		<title>FluxCenter - <?php echo $pageName; ?></title>
		<meta name="keywords" content="FluxCenter, flux, veille, MMI" />
		<meta name="description" content="Bienvenue sur la page d'inscription de l'application FluxCenter" />
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	</head>
	<body>

	<header>
		
	 	<div class="menu">

            <a href="<?php echo HtmlHelper::getPage(' '); ?>">
                <img alt="logo" class="logoMenu" src="<?php echo HtmlHelper::getImage('theme/logo.png'); ?>" />
            </a>
            
            <p class="btn-menu-titre">Flux Center</p>
            <a class="btn-menu" href="<?php echo HtmlHelper::getPage('userpage'); ?>"><?php echo $_SESSION['auth']['username']; ?></a>
            <a class="btn-menu" href="<?php echo HtmlHelper::getPage('logout'); ?>">Déconnection</a>

        </div>
        
	</header>
	
	<?php Flash::getFlash(); ?>

	<main class="<?php echo $pageName; ?> container dashboard">
        
        <?php 
        /**
        * Permet d'afficher le contenu
        */
        echo $getContent; 
        ?>
        
    </main>
    
    <script type="text/javascript" src="<?php echo HtmlHelper::getJs('app'); ?>"></script>
</body>
</html>