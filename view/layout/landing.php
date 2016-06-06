<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/4.1.1/normalize.css" />
<link href='https://fonts.googleapis.com/css?family=Sirin+Stencil' rel='stylesheet' type='text/css'>    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo HtmlHelper::getCSS("style"); ?>" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <meta charset="UTF-8" />
    <title>FluxCenter - Inscription</title>
    <meta name="keywords" content="FluxCenter, flux, veille, MMI" />
    <meta name="description" content="Bienvenue sur la page d'inscription de l'application FluxCenter" />
</head>
<body class="landing">
    
	<?php Flash::getFlash(); ?>

	<main class="<?php echo $pageName; ?> container">
        
        <?php 
        /**
        * Permet d'afficher le contenu
        */
        echo $getContent; 
        ?>
        
    </main>
    
</body>
</html>