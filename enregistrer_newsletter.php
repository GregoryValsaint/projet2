<?php 
// afficher le Request $_GET/$_POST
//echo '<pre>'; print_r($_GET); echo '</pre>';
//echo '<pre>'; print_r($_POST); echo '</pre>';


//4. 
    $pdo = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','');
    // Préparer la requête SQL Select
    // Objectif: sélectionner tous les utilisateurs

    $sql2 = "SELECT * FROM typesnews";

    //var_dump($sql2);

    // Exécuter SQL et récupérer les données utilisateur
    $req2 = $pdo->query($sql2, PDO::FETCH_ASSOC );

    // Lire $req qui contient le résultat d'exécution SQL
    if ($req2){
        $recordset = $req2->fetchAll(); //tout lire
    }


//Manipuler les données reçues
if (isset($_POST['valider'])){

	$valide = false;
	$erreurs = array();

	//tests de validation
	if (isset($_POST['nom']) 
		&& !empty($_POST['nom'])){

	}
	else {
		$erreurs[] = 'Erreur: Nom obligatoire!';
    }
    
    if (isset($_POST['prenom']) 
		&& !empty($_POST['prenom'])){

	}
	else {
		$erreurs[] = 'Erreur: Prénom obligatoire!';
    }
    
    if (isset($_POST['email']) 
		&& !empty($_POST['email'])){

	}
	else {
		$erreurs[] = 'Erreur: Email obligatoire!';
	}

	if (isset($_POST['frequence']) 
		&& $_POST['frequence']>=0 ){

	}
	else {
		$erreurs[] = 'Erreur: Fréquence obligatoire!';
	}
	
	if (isset($_POST['typenews']) 
		&& is_array($_POST['typenews']) 
		&& count($_POST['typenews'])>0 ){

	}
	else {
		$erreurs[] = 'Erreur: Typenews obligatoire!';
	}

	//Fin des tests
	$valide = count($erreurs)<=0 ? true : false;

	if ($valide){
        echo 'OK: tout est bon!';
        
        //1. se connecter à la bdd
        $pdo = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','');

        //2. definir la requête SQL
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $frequence = $_POST['frequence'];
        $category = $_POST['category'];


        $sql = "INSERT INTO `newsletter`(`nom`, `cgv`, `ville`, `typenews`) 
        VALUES (
                '" . $nom . "',
                " . $prenom . ",
                '" . $email . "',
                '" . $frequence . "',
                '" . $frequence . "',
                )";

        //var_dump($sql);

        //3. Exécuter la requête 
        $req = $pdo->prepare($sql);
        if ($req ->execute() ) {
            echo $success[] = "newsletter enregistrée avec succès";
        } else {
            echo $erreurs[] = "Erreur: newsletter non enregistrée!";
        }

	}

}

?>