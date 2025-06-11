<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="background"></div>
    <h1>Contactez-nous</h1>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="catalogue.php">Catalogue</a>
        <a href="add_game.php">Ajouter un jeu</a>
    </nav>
    <form method="POST" action="contact.php">
        <input type="text" name="name" placeholder="Votre nom" required>
        <input type="email" name="email" placeholder="Votre email" required>
        <textarea name="message" placeholder="Votre message" required></textarea>
        <button type="submit">Envoyer</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Vous pouvez ajouter ici la logique pour traiter le formulaire de contact
        echo "Merci de nous avoir contactés, nous reviendrons vers vous bientôt!";
    }
    ?>
</body>
</html>
