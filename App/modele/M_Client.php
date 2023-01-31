<?php

/**
 * Les jeux sont rangés par catégorie
 *
 * @author Loic LOG
 */
class M_Client {

    /**
     * Retourne un etat par id 
     *
     * @return un etat
     */
    public static function trouveClientParId($id) {
        $req = "SELECT * FROM client where id = ?";
        $option = [$id];
        $res = AccesDonnees::queryProteger($req, $option);
        
        $client = $res->fetch(PDO::FETCH_ASSOC);
        // var_dump($etat);
        return $client;
    }

     /**
     * Retourne un etat par id 
     *
     * @return un etat
     */
    public static function creerClient($nom,$email,$password) {
        $req = "insert into client(nom,email,password) values (:nom,:email,:password)";
        $options = ['nom'=>$nom,'email'=>$email,'password'=>$password];
        $res = AccesDonnees::queryProtegerAssositiv($req, $options);
        //  var_dump($res);
    }

     /**
     *
     */
    public static function clientExist($email) {
        $req = "SELECT count(*) FROM client where client.email = :email";
        $options = ['email'=>$email];
        $res = AccesDonnees::queryProtegerAssositiv($req, $options);
       
        $exist = $res->fetch();
        // print_r($exist[0]);
        return $exist[0];
    }

    /**
     * 
     */
    public static function authClient( $email, $password) {
        $req = "SELECT * FROM client where client.email = :email and client.password = :password";
        $options = ['email'=>$email,'password'=>$password];
        // var_dump($mail);
        $res = AccesDonnees::queryProtegerAssositiv($req, $options);
        
        $client = $res->fetch(PDO::FETCH_ASSOC);
    //    var_dump($client);
        return  $client;
    }

    /**
     * Retourne vrai si pas d'erreur
     * Remplie le tableau d'erreur s'il y a
     *
     * @param $nom : chaîne
     * @param $rue : chaîne
     * @param $ville : chaîne
     * @param $cp : chaîne
     * @param $mail : chaîne
     * @return : array
     */
    public static function estValide($nom,$password,$mail) {
        $erreurs = [];
        if ($nom == "") {
            $erreurs[] = "Il faut saisir le champ nom";
        }
        if ($password == "") {
            $erreurs[] = "Il faut saisir le champ Code ";
        }
        if ($mail == "") {
            $erreurs[] = "Il faut saisir le champ mail";
        }elseif (!estUnMail($mail)) {
            $erreurs[] = "erreur de mail";
        }elseif(M_Client::clientExist($mail)) {
            // var_dump(M_Client::clientExist($mail));
            $erreurs[] = "mail exist";
        }
        
        return $erreurs;
    }

    public static function estValideAuth($password,$mail) {
        $erreurs = [];
       
        if ($password == "") {
            $erreurs[] = "Il faut saisir le champ Code ";
        }
        if ($mail == "") {
            $erreurs[] = "Il faut saisir le champ mail";
        }elseif (!estUnMail($mail)) {
            $erreurs[] = "erreur de mail";
        }elseif(!(M_Client::authClient($mail,$password))) {
            // var_dump(M_Client::clientExist($mail));
            $erreurs[] = "mail ou mot de passe inccorect";
        }
        return $erreurs;
    }

}