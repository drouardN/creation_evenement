<?php 
require("Router/Router.php");
require("controleurs/EvenementController.php");

$router = new Router;

// Define routes
$router->get('/index.php', 'EvenementController', 'afficher_evenements');
$router->get('/ajout_evenement', 'EvenementController', 'afficher_formulaire_nouvel_evenement');
$router->post('/ajout_evenement', 'EvenementController', 'ajouter_evenement');
$router->get('/modifier_evenement', 'EvenementController', 'afficher_formulaire_modification');
$router->post('/modifier_evenement', 'EvenementController', 'modifier_evenement');
$router->post('/supprimer_evenement', 'EvenementController', 'supprimer_evenement');

// Handle the current request
$router->resolve($_SERVER["REQUEST_URI"], $_SERVER["REQUEST_METHOD"]);
?>

<html>
<head>
<title>Font Awesome Icons</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="js/scripts.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="css/habillage.css">
<link href="css/bootstrap.min.css" rel="stylesheet" />

</head>
<body>