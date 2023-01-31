<section>
    <img src="public/images/panier.gif" alt="Panier" title="panier" />
    <?php
    foreach ($lesJeuxDuPanier as $unJeu) {
        $id = $unJeu['id'];
        $description = $unJeu['description'];
        $image = $unJeu['image'];
        $prix = $unJeu['prix'];
        $etat = $unJeu['etat'];
        ?>
    <div class="jeux_panier">
        <img src="public/images/jeux/<?php echo $image ?>" title=<?= $description ?> alt=image width=100 height=100 />
        <div>
            <p><?= $description ?></p>
            <p><?= "Etat : " . $etat ?> </p>
            <p><?= "Prix : " . $prix . " Euros" ?> </p>
            <a href=" index.php?uc=panier&jeu=<?php echo $id ?>&action=supprimerUnJeu"
                onclick="return confirm('Voulez-vous vraiment retirer ce jeu ?');">
                <img src="public/images/retirerpanier.png" TITLE="Retirer du panier">
            </a>
        </div>


    </div>
    <?php
    }
    ?>
    <br>
    <a href="index.php?uc=commander&action=passerCommande">
        <img src=" public/images/commander.jpg" title="Passer commande">
    </a>
</section>