<?php

$errors = new ErrorsHelper();

// Existe données
if(!empty($_POST)){
	
	// Validation de l'email
    if(!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $errors->setErrors('Votre email n\'est pas valide','email');
		
	//Vérification de l'existence de l'email
	else{
			
		// Requête email
		$req = $pdo->prepare('SELECT id FROM users WHERE email = :email');
		$req->execute(array('email' => $_POST["email"]));
		$user = $req->fetch();

		// Si même email
		if($user == false) $errors->setErrors('Cet email ne correspond à aucun utilisateur','email');

	}
	
	// Validation du mot de passe
	if (empty($_POST['password'])) $errors->setErrors('Votre mot de passe n\'est pas valide','password');
	
	if($errors->isValid()){
		
		// Vérification des identifiants
		$req = $pdo->prepare('SELECT id FROM users WHERE email = :email AND password = :password');
		$req->execute(array('email' => $_POST["email"], 'password' => sha1($_POST['password'])));
		$result = $req->fetch();
		
		if(!empty($result)){
			
			$req = $pdo->prepare('SELECT id, username, email FROM users WHERE id = :id');
			$req->execute(array('id' => $result['id']));
			$user = $req->fetch();
			
			$_SESSION['auth']['id'] = $user['id'];
			$_SESSION['auth']['username'] = $user['username'];
			$_SESSION['auth']['email'] = $user['email'];
			
			Flash::setFlash("Vous etes connecté");
			header('Status: 301 Moved Permanently', false, 301); 
			header('Location : dashboard');
    	    exit();
			
		}else $errors->setErrors('Mauvais identifiant  ou mot de passe !','email');
		
	}
	
}

?>

<div class="login-wrapper">

	<div class="login-left">
			
		<div class="login-form">
			
			<a href ="./"><img class="logo" src="<?php echo HtmlHelper::getImage("theme/logoReverse.png"); ?>" alt="imgLogo" /></a>
			
			<h3 class="logo-texte">Flux-Center</h3>
				
			<form method="post" action="">
					
				<div class="input">
						
					<input name="email" id="email" type="text" placeholder="Email" required>
				    <?php $errors->getErrors('email'); ?>
						
				</div>		
					
				<div class="input">
						
					<input name="password" id="password" type="password" placeholder="Mot de Passe">
				    <?php $errors->getErrors('password'); ?>
						
				</div>
				    
				
				<input type="submit" value="Connexion">
				 
			</form>
				
		</div>
			
	</div>
	
	<div class="login-right">
		
		<a href="./signup">Inscription</a>
		
			<div>
			
			<div class="fluxCenter">
			<h1 class="sign">Flux Center</h1>
			<p>« Changez votre vision de la veille »</p>
			
			</div>
			
			<img alt="dashboard" src="<?php echo HtmlHelper::getImage("theme/dashboard2.png"); ?>"/>
			
		</div>
		
	</div>
	
</div>
