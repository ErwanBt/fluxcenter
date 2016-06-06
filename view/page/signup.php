<?php 

	$errors = new ErrorsHelper();

    // Existe données
    if(!empty($_POST)){
        
        // Validation username
		if(!empty($_POST['username']) && !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])) $errors->setErrors('Votre pseudo n\'est pas valide (alphanumérique)','username');
		
		// Vérification de l'existence de l'utilisateur
		else{
			
			// Requête username
			$req = $pdo->prepare('SELECT id FROM users WHERE username = :username');
			$req->execute(array('username' => $_POST['username']));
			$user = $req->fetch(); 
	
			// Si même username
			if($user) $errors->setErrors('Ce pseudo est déja pris','username');
		}
	
        // Validation de l'email
        if(!empty($_POST['email']) && !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $errors->setErrors('Votre email n\'est pas valide','email');
        
		//Vérification de l'existence de l'email
		else{
			
			// Requête email
			$req = $pdo->prepare('SELECT id FROM users WHERE email = :email');
			$req->execute(array('email' => $_POST['email']));
			$user = $req->fetch();
			
			//Si même email
			if($user)  $errors->setErrors('Cet email est déja utilisé pour un autre compte','email');
		}
		
		// Validation du mot de passe
		if (empty($_POST['password'])) $errors->setErrors('Votre mot de passe n\'est pas valide','password');
		else{
			if($_POST['password'] != $_POST['password2']) $errors->setErrors('Votre mot de passe n\'est pas identique à la confirmation','password');
		};
	    
	    if($errors->isValid()){
			// Inscription de l'utilisateur
			$req = $pdo->prepare("INSERT INTO users SET username = :username, password = :password, email = :email");	
			$password = sha1($_POST['password']);
			$req->execute(array('username' => $_POST['username'], 'password' => $password, 'email' => $_POST['email']));
			
			$req = $pdo->prepare('SELECT * FROM users WHERE username = :username');
			$req->execute(array('username' => $_POST['username']));
			$user = $req->fetch(); 

			$_SESSION['auth']['id'] = $user['id'];
			$_SESSION['auth']['username'] = $user['username'];
			$_SESSION['auth']['email'] = $user['email'];
			
    		Flash::setFlash("Notre compte a bien été créé");
			header('Status: 301 Moved Permanently', false, 301);   
		    header('Location : preference');
		   	exit();
		   	
    	 }
   	}
?>

<div class="login-wrapper">

	<div class="login-left">
			
		<div class="login-form">
			
			<a href ="./"><img class="logo" src="<?php echo HtmlHelper::getImage("theme/logoReverse.png"); ?>" alt="imgLogo" /></a>
			
			<h3 class="logo-texte">Flux-Center</h3>
			
			<form method="POST" action="">
			
				<div class="input">
						
					<input name="username"  type="text" placeholder="Nom d'utilisateur" required>
					<?php $errors->getErrors('username'); ?>
					
				</div>
					
				<div class="input">
						
					<input name="email" type="text" placeholder="Email" required>
					<?php $errors->getErrors('email'); ?>
					 	
				</div>
					 
				<div class="input">
				       	
				   	<input name="password" type="password" placeholder="Mot de Passe" required>
				    <?php $errors->getErrors('password'); ?>
				    
				</div>
				    
				<div class="input">
				        
					<input name="password2" type="password" placeholder="Confirmer le Mot de Passe" required>
					<?php $errors->getErrors('password2'); ?>
					
				</div>
				    
				<input type="submit" value="Suivant">
				       
			</form>
				
		</div>
		
	</div>
	
	<div class="login-right">
		
		<a href="./signin">Connexion</a>
		
		<div>
			
			<h1 class="sign">Flux Center</h1>
			
			<p>Changez votre vision de la veille</p>
			
		</div>
		
	</div>
	
</div>
	
		

    




