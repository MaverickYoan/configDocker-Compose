<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Catalogue de jeux vidéo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Catalogue de jeux vidéo</h1>
    <nav>
        <a href="index.php">Accueil</a>
        <a href="add_game.php">Ajouter un jeu</a>
        <a href="contact.php">Contact</a>
    </nav>
    <h2>Liste des jeux</h2>
    <ul>
        <?php
        $stmt = $pdo->query("SELECT * FROM games");
        while ($game = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo '<li>' . htmlspecialchars($game['title']) . ' - ' . htmlspecialchars($game['genre']) . ' (' . htmlspecialchars($game['release_date']) . ')</li>';
        }
        ?>
    </ul>
</body>
</html>
 
