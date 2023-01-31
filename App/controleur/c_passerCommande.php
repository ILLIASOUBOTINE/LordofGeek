<?php

include 'App/modele/M_Commande.php';
include 'App/modele/M_Exemplaire.php';
/**
 * Controleur pour les commandes
 * @author Loic LOG
 */
switch ($action) {
    case 'passerCommande' :
        $n = nbJeuxDuPanier();
        if ($n > 0) {
            $nom = '';
            $rue = '';
            $ville = '';
            $cp = '';
            $mail = '';
        } else {
            afficheMessage("Panier vide !!");
            $uc = '';
        }
        break;
    case 'confirmerCommande' :
        $nom = filter_input(INPUT_POST, 'nom');
        $rue = filter_input(INPUT_POST, 'rue');
        $ville = filter_input(INPUT_POST, 'ville');
        $cp = filter_input(INPUT_POST, 'cp');
        if (isset($_SESSION['client'])) {
            $mail = getClient()['email'];
            $clientId = getClient()['id'];
        }else {
            $mail = filter_input(INPUT_POST, 'mail');
            $clientId = null;
        }
        
        $errors = M_Commande::estValide($nom, $rue, $ville, $cp, $mail);
        if (count($errors) > 0) {
            // Si une erreur, on recommence
            afficheErreurs($errors);
        } else {
            $lesIdJeu = getLesIdJeuxDuPanier();
            M_Commande::creerCommande($nom, $rue, $cp, $ville, $mail, $lesIdJeu,$clientId);
            foreach($lesIdJeu as $id){
                M_Exemplaire::indisponibleJoue($id);
            }
            supprimerPanier();
            afficheMessage("Commande enregistrée");
            $uc = '';
        }
        break;
}