<?php

/**
 * Requetes sur les exemplaires  de jeux videos
 *
 * @author Loic LOG
 */
class M_Exemplaire {

    /**
     * Retourne sous forme d'un tableau associatif tous les jeux de la
     * catégorie passée en argument
     *
     * @param $idCategorie
     * @return un tableau associatif
     */
    public static function trouveLesJeuxDeCategorie($idCategorie) {
        // $req = "SELECT * FROM exemplaires WHERE categorie_id = '$idCategorie'";
        // $res = AccesDonnees::query($req);
        $req = "SELECT exemplaires.*, etat.nom as etat FROM `exemplaires` join etat on exemplaires.etat_id = etat.id WHERE categorie_id = ? and exemplaires.vendu = 0";
        $options = [$idCategorie];
        $res = AccesDonnees::queryProteger($req, $options);
        
        $lesLignes = $res->fetchAll();
        return $lesLignes;
    }

    /**
     * Retourne les jeux concernés par le tableau des idProduits passée en argument
     *
     * @param $desIdJeux tableau d'idProduits
     * @return un tableau associatif
     */
    public static function trouveLesJeuxDuTableau($desIdJeux) {
        $nbProduits = count($desIdJeux);
        $lesProduits = array();
        if ($nbProduits != 0) {
            foreach ($desIdJeux as $unIdProduit) {
                // $req = "SELECT * FROM exemplaires WHERE id = '$unIdProduit'";
                // $res = AccesDonnees::query($req);
                $req = "SELECT exemplaires.*, etat.nom as etat FROM `exemplaires` join etat on exemplaires.etat_id = etat.id WHERE exemplaires.id = ? and exemplaires.vendu = 0";
                $options = [$unIdProduit];
                $res = AccesDonnees::queryProteger($req, $options);
                $unProduit = $res->fetch();
                $lesProduits[] = $unProduit;
            }
        }
        return $lesProduits;
    }


      /**
     * Retourne sous forme d'un tableau associatif tous les jeux
     * 
     * 
     * @return un tableau associatif
     */
    public static function trouveToutesJoue() {
      
        $req = "SELECT exemplaires.*, etat.nom as etat FROM `exemplaires` join etat on exemplaires.etat_id = etat.id and exemplaires.vendu = 0";
        
        $res = AccesDonnees::queryProteger($req);
        
       return $res->fetchAll();
         
    }

       /**
     * Retourne sous forme d'un tableau associatif tous les jeux
     * 
     * 
     * @return un tableau associatif
     */
    public static function trouveDerniersJoue(int $num) {
      
        $req = "SELECT exemplaires.*, etat.nom as etat 
        FROM exemplaires join etat on exemplaires.etat_id = etat.id where exemplaires.vendu = 0
        ORDER BY exemplaires.id DESC LIMIT :num";
        // $options = [$num];
        $res = AccesDonnees::getPdo()->prepare($req);
        $res->bindValue(':num',$num, PDO::PARAM_INT);
        $res->execute();
        // $options = ['num' => $num];
       
        // $res = AccesDonnees::queryProteger($req,$options);
        // $res = AccesDonnees::queryProtegerAssositiv($req, $options);
       return $res->fetchAll();
         
    }


        /**
     * Retourne sous forme d'un tableau associatif tous les jeux
     * 
     * 
     * @return un tableau associatif
     */
    public static function indisponibleJoue($id) {
      
        $req = "Update exemplaires set `vendu`= 1 where id = :id";
        $params = ['id'=>$id];
        $res = AccesDonnees::queryProtegerAssositiv($req,$params);
        
      
         
    }

}