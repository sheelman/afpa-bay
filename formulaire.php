<form method='post' class="formulaire1">
    <div class="container cont1">
        <input class="search-query col-xs-12 col-sm-12 col-md-3 col-lg-3 img" type="text" placeholder="Insérer le lien de l'image" name='image'>
        <input class="search-query col-xs-12 col-sm-12 col-md-3 col-lg-3 tra" type="text" placeholder="Insérer le lien du trailer" name='trailer'>
        <input class="search-query col-xs-12 col-sm-12 col-md-3 col-lg-3 tit" type="text" placeholder="Nom du film" name='titre'>
        <input class="search-query col-xs-12 col-sm-12 col-md-3 col-lg-3 rea" type="text" placeholder="Inscrire le Nom du réalisateur" name='realisateur'>
    </div>   
        <textarea class="search-query col-xs-12 col-sm-12 col-md-12 col-lg-12 act" placeholder="Inscrire le Nom des acteurs" name='acteurs'></textarea> 
        <input class="search-query col-xs-12 col-sm-12 col-md-4 col-lg-4 nat" type="text" placeholder="Pays d'origine" name='nationalite'>
        <input class="search-query col-xs-12 col-sm-12 col-md-4 col-lg-4 gen" type="text" placeholder="Genre" name='genres'>
        <input class="search-query col-xs-12 col-sm-12 col-md-4 col-lg-4 dat" type="number" placeholder="Année" name='date_sortie'>
        <textarea class="search-query col-xs-12 col-sm-12 col-md-12 col-lg-12 syn" placeholder="Synopsis" name='synopsis'></textarea> 
        <button type="submit" class="boutton1">Envoyer</button>
</form> 
    
   
<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=afpa-bay;charset=utf8', 'root', '000000');
    
    
    $image = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING);
    $trailer = filter_input(INPUT_POST, 'trailer', FILTER_SANITIZE_STRING);
    $titre = filter_input(INPUT_POST, 'titre', FILTER_SANITIZE_STRING);
    $realisateur = filter_input(INPUT_POST, 'realisateur', FILTER_SANITIZE_STRING);
    $acteurs = filter_input(INPUT_POST, 'acteurs', FILTER_SANITIZE_STRING);
    $nationalite = filter_input(INPUT_POST, 'nationalite', FILTER_SANITIZE_STRING);
    $genres = filter_input(INPUT_POST, 'genres', FILTER_SANITIZE_STRING);
    $date_sortie = filter_input(INPUT_POST, 'date_sortie', FILTER_SANITIZE_STRING);
    $synopsis = filter_input(INPUT_POST, 'synopsis', FILTER_SANITIZE_STRING);
 
    if ($titre && $realisateur && $acteurs ){
         $stmt = $bdd->prepare('
             INSERT INTO film ( image, trailer, titre, realisateur, acteurs, nationalite, genres, date_sortie, synopsis)
                 VALUES ( :image, :trailer, :titre, :realisateur, :acteurs, :nationalite, :genres, :date_sortie, :synopsis)');
         $stmt->bindValue(':image', $image, PDO::PARAM_STR);
         $stmt->bindValue(':trailer', $trailer, PDO::PARAM_STR);
         $stmt->bindValue(':titre', $titre, PDO::PARAM_STR);
         $stmt->bindValue(':realisateur', $realisateur, PDO::PARAM_STR);
         $stmt->bindValue(':acteurs', $acteurs, PDO::PARAM_STR);
         $stmt->bindValue(':nationalite', $nationalite, PDO::PARAM_STR);
         $stmt->bindValue(':genres', $genres, PDO::PARAM_STR);  
         $stmt->bindValue(':date_sortie', $date_sortie, PDO::PARAM_STR);
         $stmt->bindValue(':synopsis', $synopsis, PDO::PARAM_STR);
         
         $res = $stmt->execute();
         if ($res){
             //tout va bien
             echo 'cool!, film ajouté à la liste <a href="filmshtml.php">retour à la liste</a>';
         }else{
             echo '<p class="alert">ptit soucis ici!</p>';
             print_r($bdd->errorInfo());
         }
         //$pdo->lastInsertId();
    }else{ //ya un pb, tous les champs ne sont pas renseignés
        
        echo '<p class="alert">tous les champs sont obligatoires</p>';
        
    }
    
   
    
    
}catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

?> 

