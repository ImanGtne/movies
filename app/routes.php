<?php
/**
 * Created by PhpStorm.
 * User: imangatine
 * Date: 16/01/2017
 * Time: 12:19
 */
// definit route
// url, nom de la méthode
$routes = [
    ["/", "home", "MovieController"], // affiche la page d'accueil
    ["/movie", "showSingle","MovieController"], // affiche le détail d'un film
    ["/mentions", "mentionsLegales","DefaultController"], // afficher page mentions légales
    ["/faq", "faq","DefaultController"], // affiche page FAQ
    ["/inscription", "inscription","UserController"], // affiche page inscription
    ["/connexion", "connexion","UserController"], // va cherhcer fonction connexion vers /connexion
    ["/deconnexion", "deconnexion","UserController"], //   va cherhcer fonction deconnexion vers /deconnexion
    ["/addwatchlist", "addToWatchlist","WatchlistController"], // enregistre watchlist vers /addwatchlist
    ["/watchlist", "showWatchlist","WatchlistController"], // affiche page watchlist vers /watchlist
    ["/removewatchlist", "deleteToWatchlist","WatchlistController"], // enregistre watchlist vers /addwatchlist
];
