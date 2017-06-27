<?php

try
{   //pour envoyer les info de la table SQL
    $bdd = new PDO('mysql:host=localhost;dbname=afpa-bay;charset=utf8', 'root', '000000');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $reponse = $bdd->query('SELECT * from film');
    
    //moteur de recherche
    if(isset($_POST['search'])AND !empty($_POST['search']))
    {
        $search = htmlspecialchars($_POST['search']);
        $reponse = $bdd->prepare("SELECT * FROM film WHERE LOWER(titre) LIKE '%' :r '%'"
                . " or LOWER(realisateur) LIKE '%' :r '%'"
                . " or LOWER(acteurs) LIKE '%' :r '%'"
                . " or LOWER(genres) LIKE '%' :r '%'"
                . " or LOWER(synopsis) LIKE '%' :r '%'");
        $reponse->bindParam(':r', $search);
        $reponse->execute();
    }
    //main de base php et html
    while ($donnees = $reponse->fetch())
    {
      // var_dump($donnees);
?>
<article class="article container">
    <div class="format container">
        <a href="<?php echo $donnees['trailer'];?>" target="_blank"><img src="<?php echo $donnees['image'];?>" class="image col-xs-12 col-sm-12 col-md-3 col-lg-3" ></a>
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
            <div><h2>Titre : <?php echo $donnees['titre'];?></h2></div>
            <div><h4>Réalisateur : <?php echo $donnees['realisateur'];?></h4></div>
            <div><h4>Acteurs : <?php echo $donnees['acteurs'];?></h4></div>
            <div><h4>Nationalité : <?php echo $donnees['nationalite'];?></h4></div>
            <div><h4>Genre : <?php echo $donnees['genres'];?></h4></div>
            <div><h4>Année : <?php echo $donnees['date_sortie'];?></h4></div>
        </div>
    </div>
    <div class="syno"><h3>Synopsis : </h3><p><?php echo $donnees['synopsis'];?></p></div>
</article>
<input type="button" id="le_bouton" value="Remonte" OnClick=window.location.href="filmshtml.php#">
<?php   
    }

}catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}
    
?>
   