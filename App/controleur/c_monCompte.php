<?php
include 'App/modele/M_Client.php';
include 'App/modele/M_commande.php';


 
//! TODO


/**
 * Controleur pour les commandes
 * @author Loic LOG
 */

 if ($action == 'logout') {
    supprimerClient();
    supprimerCommandeClient();
    header('Location: index.php?uc=compte');
    exit();
 }else if (isset($_SESSION['client'])) {
   
    $newCommande = getCommandesClient();
    initCommandeClient($newCommande);
    $action = 'mesCommandes';
}else {
    switch ($action) {
        case 'confirmeRegistration' :
            $nom = filter_input(INPUT_POST, 'nom_reg');
            $email = filter_input(INPUT_POST, 'mail_reg');
            $password = filter_input(INPUT_POST, 'password_reg');
        
            $errors = M_Client::estValide($nom,$password,$email);
            
            if (count($errors) > 0) {
                // Si une erreur, on recommence
                afficheErreurs($errors);
            } else {
                // if (!M_Client::clientExist($email)) {
                    M_Client::creerClient($nom,$email,$password);
                    afficheMessage("Client enregistrée");
                    header('Location: index.php?uc=compte&action=authentification');
                    
                    exit();
                // }else {
                //     afficheErreurs(['le client avec cet mail deja exist']);
                // }
               
            }
        break;
        case 'authentification' :
            $email = filter_input(INPUT_POST, 'mail_auth');
            $password = filter_input(INPUT_POST, 'password_auth');
        
            $errors = M_Client::estValideAuth($password,$email);
        
            if (count($errors) > 0) {
                // Si une erreur, on recommence
                afficheErreurs($errors);
            } else {
                initClient(M_Client::authClient($email,$password));
                afficheMessage("Client enregistrée");
                header('Location: index.php?uc=compte&action=mesCommandes');
                exit();
            }
        break;
     
    }       
        
   
}

if (isset($_SESSION['client'])) {
    $commandes = $_SESSION['commandes'];
}