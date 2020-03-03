<form name="form1" action="enregistrer_newsletter.php" method="post">
    <label for="nom">Nom</label>
	<input type="text" id="nom" name="nom" value=""/>
    <br/>
	<br/>
    <label for="prenom">Prénom</label>
	<input type="text" id="prenom" name="prenom" value=""/>
	<br/>
    <br/>
    <label for="email">Email</label>
	<input type="email" id="email" name="email" value=""/>
	<br/>
    <br/>
    <label for="category">Choix de la catégorie</label>
	<select id="category" name="category" value="">
		<option value="0"></option>
		<option value="1">Tennis</option>
		<option value="2">Football</option>
        <option value="3">Dance</option>
		<option value="4">Basket</option>
	</select>
	<br/>
    <br/>

    <label for="frequence">Fréquence :</label>
    <br/>
    <input type="radio" id="annuelle" name="frequence" value="1" />
    <label for="category">Annuelle</label>
	<input type="radio" id="trimestrielle" name="frequence" value="0" />
    <label for="category">Trimestrielle</label>
    <input type="radio" id="mensuelle" name="frequence" value="0" />
    <label for="category">Mensuelle</label>
	<br/>
    <br/>
    <div id="checkbox">
    <?php 
        if (isset($recordset) 
        && is_array($recordset) )
        foreach ($recordset as $row) {
            echo '<input type="checkbox" name="typenews[]" value="'.$row['id'].'"/>'.$row['nomnews'].'<br/>' ;
        }
    ?>
    </div>
	<br/>
    <br/>
	<input type="submit" id="valider" name="valider" value="Valider"/>

	<div id="erreur">
        <?php 
            //affiche et concataine les erreurs au fur et à mesure 
			if (isset($erreurs) 
				&& is_array($erreurs) )
			foreach ($erreurs as $err) {
				echo '<li>'.$err.'</li>';
			}
		?>
	</div>
    <div id="success">
        <?php 
            //affiche et concataine les erreurs au fur et à mesure 
			if (isset($success) 
				&& is_array($success) )
			foreach ($success as $msg) {
				echo '<li>'.$msg.'</li>';
			}
		?>
	</div>
    <style>
        #success{
            color: green;
        }
        #erreur{
            color: red;
        }
    </style>

</form>