<?php

/**
 * Les jeux sont rangés par catégorie
 *
 * @author Loic LOG
 */
class M_Categorie {

    /**
     * Retourne toutes les catégories sous forme d'un tableau associatif
     *
     * @return le tableau associatif des catégories
     */
    public static function trouveLesCategories() {
        $req = "SELECT * FROM categories";
        // $res = AccesDonnees::query($req);
        $res = AccesDonnees::queryProteger($req);
        // var_dump($res);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }

    
    /**
     * Retourne toutes les catégories sous forme d'un tableau associatif
     *
     * @return le tableau associatif des catégories
     */
    public static function trouveLesCategoriesNotNull() {
        $req = "SELECT DISTINCT categories.* FROM categories JOIN exemplaires ON exemplaires.categorie_id = categories.id and exemplaires.vendu = 0";
        // $res = AccesDonnees::query($req);
        $res = AccesDonnees::queryProteger($req);
        // var_dump($res);
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }

}