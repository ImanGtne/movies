<?php

$security = new \Grill\Model\Security\Security();
$userconnect = $security->getUser();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700">
    <link rel="stylesheet" href="<?= BASE_URL; ?>/css/style.css">
    <title></title>
</head>
<body>
<header>
    <div class="connexion">
        <div><?php
            if (!empty($userconnect)) { ?>

                <p><?php echo 'Bonjour ' . $userconnect->getUsername() . '!'; ?></p>
                <a href="deconnexion">Déconnexion</a>
            <?php } else { ?>
                <a href="inscription">Inscription</a>
                <a href="connexion">Connexion</a>
            <?php } ?>
        </div>
    </div>
    <?php include('menu.php'); ?></div>
</header>
<div class="container">
    <?php include($grill_page); ?></div>
</body>
</html>