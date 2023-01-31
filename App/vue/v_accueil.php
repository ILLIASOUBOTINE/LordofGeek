<section>
    <h1>
        Lord Of Geek
    </h1>
    <h2>
        le prince des jeux sur internet
    </h2>
</section>

<section class="block">
    <?php
        foreach ($accueilJoux as $unJeu) {
            $id = $unJeu['id'];
            $description = $unJeu['description'];
            $prix = $unJeu['prix'];
            $image = $unJeu['image'];
            $etat = $unJeu['etat'];
            $categorie = $unJeu['categorie_id'];
            ?>
    <article>
        <img class="img_accueil" src="public/images/jeux/<?= $image ?>" alt="Image de <?= $description; ?>" />
        <div>
            <p><?= $description ?></p>
            <p><?= "Etat : " . $etat ?> </p>
            <p><?= "Prix : " . $prix . " Euros" ?> </p>

            <a href="index.php?uc=visite&categorie=<?= $categorie  ?>&jeu=<?= $id ?>&action=ajouterAuPanier">
                <img src="public/images/mettrepanier.png" title="Ajouter au panier" class="add" />
            </a>
        </div>


    </article>
    <?php
        }
        ?>
</section>