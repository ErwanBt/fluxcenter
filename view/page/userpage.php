<?php
 
    if(!empty($_POST)){
            
        // Validation de l'email
        if(!empty($_POST['email'])) {
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $errors['email'] = 'Votre email n\'est pas valide';
            else $newData['email'] = $_POST['email']; 
        }else $newData['email'] = $_SESSION['auth']['email'];

        // Validation du mot de passe
        if (!empty($_POST['password'])) $newData['password'] = sha1($_POST['password']);
        else{
            $req = $pdo -> prepare("select password FROM users WHERE id = :user");
            $req -> execute(array('' => $_SESSION["id"]));
            $data = $req->fetch(); 
            $newData['password'] = $data;
        }
        
        // Validation username
        if(!empty($_POST['username'])){
            if(!preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])) $errors['username'] = 'Votre pseudo n\'est pas valide (alphanumérique)';
            else $newData['username'] = $_POST['username'];
        }else $newData['username'] = $_SESSION['auth']['username'];
            
        if(!empty($newData) && empty($errors)){
            $req2 = $pdo->prepare("UPDATE users SET username=:username,email=:email,password=:password WHERE id = '".$_SESSION['auth']['id']."'");
            $req2->execute(array(
                'username' => $newData['username'],
                'email' => $newData['email'],
                'password' => $newData['password']
            ));
            $_SESSION['auth']['username'] = $newData['username'];
            $_SESSION['auth']['email'] = $newData['email'];
        }
    }
    
    
?>

<section class="userpage">
    <div>
        <h1>Votre compte</h1>
        <p>Vous pouvez modifier vos informations:</p>
    </div>
    <div>
        
        <form method="POST" action="" enctype="multipart/form-data">
           
            <label for="username">Nom d'utilisateur : <?php echo $_SESSION['auth']['username']; ?></label>
            <input type="text" name="username" id="username" placeholder="Nouveau pseudo"/>
            
            <label for="email">Adresse E-mail : <?php echo $_SESSION['auth']['email']; ?></label>
            <input type="text" name="email" id="email" placeholder="Nouvelle E-mail"/>
            
            <label for="password">Changer votre mot de passe : </label>
            <input type="password" name="password" id="password"/>
            
            <input class="" type="submit" id="validation" />
        </form>
    </div>
</section>
    