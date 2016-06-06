<div class="login-wrapper">

    
<?php 
    // Récupération des catégories
    $sql = "SELECT id, name FROM categories";
    $statement = $pdo->query($sql);
	$cate = $statement->fetchAll(PDO::FETCH_NUM);
	
	// Récupération de l'id du user
	$iduser = $_SESSION['auth']['id'];

    $errors = new ErrorsHelper();

    if(!empty($_POST)){

        if(count($_POST) >= 5){

            foreach ($_POST as $cate_id){
            
                    $req = "SELECT id FROM categoryUser WHERE category = ". $cate_id;
                    $req1 = $pdo->prepare($req);
                    $req1->execute();
                    $result= $req1->fetch();
                    
                    if(!($result)){
                        $req = $pdo->prepare("INSERT INTO categoryUser (user, category) VALUES (:user, :category)");
                        $req->execute(array('user' => $_SESSION['auth']['id'], 'category' => $cate_id));
                    }

                    header('Status: 301 Moved Permanently', false, 301); 
                    header('Location : signin');
                    exit();
     
            }
                
        }else {
            $errors->setErrors("Veuillez choisir au minimun 5 catégories","global");
        }

    }else{
        $errors->setErrors("Veuillez choisir au minimun 5 catégories","global");
    }



?>



<form action="" method="POST" class="">
    <?php $errors->getErrors("global"); ?>
    <h5>Choisisez au minimun 5 catégories de flux que vous souhaitez voir affichées :</h5>
        <div class="contient-fieldset">

<?php foreach($cate as $cat):?>
        <fieldset>

            <input type="checkbox" name="<?php echo $cat[0]; ?>" value="<?php echo $cat[0]; ?>">
                <a href="#">
                    <article>
                        <span>
                            <img src="<?php $srcImg= str_replace("é","e", str_replace(" ","_", strtolower($cat[1])));
                                echo HtmlHelper::getImage('categories'. DS .$srcImg); ?>.jpg" alt="<?php echo($cat[1]);?>" />
                            <p><?php echo($cat[1]);?></p>
                        </span>
                    </article>
                </a>
    
            </fieldset>
    
<?php
    endforeach;
?>
    </div>
    <input type="submit" value="Suivant" />
</form>

</div>


