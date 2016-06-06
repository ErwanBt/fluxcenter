	<div class="overlay">
		<article class="popupArt" id="popupArt">
			    <div id="player"></div>

			<!--Contenu article-->
			<a id="croixArt" href="#">&times;</a>
        	<h3 id="titreA"></h3>
        	<img id="imge" src="" alt=""/>
        	<p id="paragraphe"></p>
        	<footer id="foot"></footer>
        	
        </article>
    </div>
    
    <div class="colones">
    	
    <?php 
    
    	$req = $pdo->prepare('SELECT category FROM categoryUser WHERE user = :id');
		$req->execute(array('id' => $_SESSION['auth']['id']));
		$req = $req->fetchAll();
		
		foreach ($req as $colunm) {
			
			$req = $pdo->prepare('SELECT * FROM categories WHERE id = :id');
			$req->execute(array('id' => $colunm['category']));
			$req = $req->fetchAll();
			
			foreach ($req as $category): ?>
				
				<div class="colonne"> 
				
				
				<?php echo "<p>".$category['name']."</p>";
				
				$req = $pdo->prepare('SELECT * FROM flux WHERE category = :id');
				$req->execute(array('id' => $category['id']));
				$req = $req->fetchAll();	
				
				foreach ($req as $article): ?>
					 
                <article class="arti">
                		
                	 <?php 
                	 $youtubeId = $article['user']; ?>
                	 
                	 <div style="visibility:hidden;"><?php echo $youtubeId; ?></div>

					<img src="https://i.ytimg.com/vi/<?php echo $youtubeId; ?>/hqdefault.jpg" alt="">
                        
                        <footer>
							Cet vidéo a était trouvé sur youtube.com
                   		</footer>
                </article>
				
				<?php endforeach; ?>
                
        </div>
				
		<?php endforeach; } ?>
            
           
            
        </div>
	

<div id="popup1" class="overlayPlus">
	<div class="popup">
		<a id="croixPlus" href="#">&times;</a>
			<article>
        		<h3> 1- Ajoutez du flux !</h3>
        		<form class="search-container" method="post" action="">
        		<input type="text" id="search-bar" placeholder="URL Facebook ou Youtube" name="url">
        			
        		<h3> 2- Choisissez une catégorie</h3>
            	
	                <select id="categ" name="category" size="1">
	                <?php 
	    			// Récupérer les noms des categories dans la bdd
	
	    			//Etape 1 : se connecter à la bdd et la selectionner
		
	    			//Etape 2 : envoyer la requête sql
					$sql = "SELECT name FROM categories";
					$statement = $pdo->query($sql);
					
					//Etape 3 : afficher les données retournées
		   			
		   			//nom de la première categorie
		    		$ligne = $statement->fetch(PDO::FETCH_NUM);
	        		$i=1;
	        		while($ligne != false)
	        		{
	        			
					?>
					
					<?php var_dump($_POST);?>
					<option value=<?php echo $i; ?>>
					<?php echo($ligne[0]);?>
					</option>
					
	            	<?php
					//nom de la catégorie suivante
					$ligne = $statement->fetch(PDO::FETCH_NUM);
					$i=$i+1;
	        		}
					?>
						</select>
            	
        		<footer>
            		<div class="btn-bg bg-2">
	                	<div class="btn btn-2">
	                       <input id="boutonPlus" type="submit" value="Valider"/>
	                	</div>
       				</div>
        		</footer>
                </form>
        		
        	</article>
        	</div>
</div>

<?php
	$sql = "";
	
	//			Récupération des données du formulaire dans la Base de donn
	
    // Récupérer les donnérs du formulaire dans la bdd

    //Etape 1 : se connecter à la bdd et la selectionner
	
    //Etape 2 : envoyer la requête sql
    //Recupérer les données HTML dans des variables
    
    if(!empty($_POST)){
    	
    	$url=$_POST['url'];
    	$category=$_POST['category'];
    
    	//Vérifier l'url et le fractionner (FB ou YT)
    	if (preg_match('#^https?:\/\/www.facebook.com\/#', $url)==true) {
  		
    	$re = "/^(https?:\\/\\/)?(www\\.)?facebook\\.com\\/([^?]*).*$/"; 
		$str = $url; 
		$subst = "$3"; 
 
		$result = preg_replace($re, $subst, $str, 1);
		
		$req = $pdo->prepare('SELECT id FROM flux WHERE user = :user');
		$req->execute(array('user' => $result));
		$test = $req->fetch();
	
		if($test == null){
			//insertion des données dans la bdd
			$sql = "INSERT INTO flux (user, type, category) VALUES('".$result."', 'facebook', '".$category."');";
			$statement = $pdo->query($sql);
		}else{
			echo 'Votre url à déja été envoyé';
		}
	
	} 
	else 
		
		if (preg_match('/^https?:\\/\\/www.youtube.com\\/watch\\?v=(.*)$/', $url) ==true)
		{
		
		$re = "/^https?:\\/\\/www.youtube.com\\/watch\\/?\\?v=(.*)$/"; 
		$str = $url; 
		$subst = "$1"; 
 
		$result = preg_replace($re, $subst, $str, 1);
		
		$req = $pdo->prepare('SELECT id FROM flux WHERE user = :user');
		$req->execute(array('user' => $result));
		$test = $req->fetch();
	
		if($test == null){
			//insertion des données dans la bdd
			$sql = "INSERT INTO flux (user, type, category) VALUES('".$result."', 'youtube', '".$category."');";
			$statement = $pdo->query($sql);
		}else{
			echo 'Votre url à déja était envoyé';
		}
	
		}
    }
   	
	
?>

<a class="more" id="plus" href="#popup1">+</a>

