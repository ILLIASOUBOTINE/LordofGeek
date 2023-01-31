<section>
    <?php foreach($commandes as $commande): ?>
    <!-- <?php var_dump($commande) ?> -->
    <ul>
        <li>Numero de commande: <?=$commande['id']?> </li>
        <li>Nom: <?=$commande['nomPrenom']?> </li>
        <li> Adress:
            <ul>
                <li>rue: <?=$commande['adresseRueClient']?> </li>
                <li>CP: <?=$commande['cpClient']?> </li>
                <li>ville: <?=$commande['villeClient']?> </li>
                <li>date de commande: <?=$commande['created_at']?> </li>
            </ul>
        <li> Exemplaires:


            <?php foreach($commande['exemplaires'] as $exemlair): ?>
            <ul class="border_ul">
                <li>Numero de exemlair: <?=$exemlair['id']?> </li>
                <li>Nom de jeu: <?=$exemlair['description']?> </li>
                <li>Prix: <?=$exemlair['prix']?> </li>

            </ul>
            <?php endforeach?>


        </li>


    </ul>
    <hr>
    <?php endforeach?>
</section>