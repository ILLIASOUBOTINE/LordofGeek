<?php
  
  // require 'App/modele/M_Commande.php';
 
  // if (isset($_SESSION['client'])) {
  //   // var_dump($_SESSION);
  //   echo '<br> Hello '. getClient()['nom'];
  //   echo '<br><a href="index.php?uc=compte&action=logout">logout</a><br>';
  //   // print_r(M_Commande::getCommandeParClient($_SESSION['client']['id']));
  //   $commandes = $_SESSION['commandes'];
  //   require 'App/vue/v_commande_client.php';
  
  // }else {
  //   // switch ($action) {
  //   //   case 'authentification':
  //   //     require './App/vue/v_authentification.php';
  //   //   break;
  //   //   case 'confirmeRegistration':
  //   //     require './App/vue/v_registration.php';
  //   //   break;
  //   //   default:
  //   //     require './App/vue/v_registration.php';
  //   //     require './App/vue/v_authentification.php';
  //   //   break;
  //   // }
  
  // }


  
    switch ($action) {
      case 'authentification':
        require './App/vue/v_authentification.php';
      break;
      case 'confirmeRegistration':
        require './App/vue/v_registration.php';
      break;
      case 'mesCommandes':
        echo '<br> Hello '. getClient()['nom'];
        echo '<br><a href="index.php?uc=compte&action=logout">logout</a><br>';
        require 'App/vue/v_commande_client.php';
      break;
      default:
        require './App/vue/v_registration.php';
        require './App/vue/v_authentification.php';
      break;
    }  
   
  
  
 