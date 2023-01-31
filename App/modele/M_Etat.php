<?php

/**
 * Les jeux sont rangés par catégorie
 *
 * @author Loic LOG
 */
class M_Etat {

    /**
     * Retourne un etat par id 
     *
     * @return un etat
     */
    public static function trouveEtatParId($id) {
        $req = "SELECT * FROM etat where id = ?";
        $options = [$id];
        $res = AccesDonnees::queryProteger($req, $options);
        
        $etat = $res->fetch();
        var_dump($etat);
        return $etat;
    }

}